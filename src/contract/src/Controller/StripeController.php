<?php

namespace App\Controller;

use App\Common\Repository\ReferralNftRepository;
use App\Common\Repository\UserRepository;
use App\Entity\ReferralNft;
use App\Entity\User;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use UnexpectedValueException;

/**
 * Class MintController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class StripeController extends SymfonyAbstractController
{
    /**
     * @param ContainerInterface $container
     * @param UserRepository $userRepository
     * @param ReferralNftRepository $referralNftRepository
     * @return Response
     *
     * @Route("/stripe", name="stripe_event_receive", methods={"POST"})
     */
    public function stripeEventReceive(ContainerInterface $container, UserRepository $userRepository, ReferralNftRepository $referralNftRepository): Response
    {
        $payload = @file_get_contents('php://input');
        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? null;
        $secret = $container->getParameter('stripe_webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (UnexpectedValueException $e) {
            return new JsonResponse(['status' => 'Invalid payload'], 400);
        } catch (SignatureVerificationException $e) {
            return new JsonResponse(['status' => 'Invalid signature'], 400);
        }

        if ($event->type !== 'checkout.session.completed') {
            return new JsonResponse(['status' => 'Received not supported event type: ' . $event->type], 400);
        }

        $responseObject = $event->data->object ?? null;

        if (!$responseObject?->metadata?->userId) {
            return new JsonResponse(['status' => 'Wrong answer data, no userId'], 400);
        }

        if (!$responseObject?->metadata?->refCode) {
            return new JsonResponse(['status' => 'Wrong answer data, no refCode'], 400);
        }

        if (!$responseObject?->id) {
            return new JsonResponse(['status' => 'Wrong answer data, no order id'], 400);
        }

        if ($responseObject?->currency !== 'usd') {
            return new JsonResponse(['status' => 'Wrong answer data, wrong currency'], 400);
        }

        if ($responseObject?->amount_total < 5000) {
            return new JsonResponse(['status' => 'Wrong answer data, to low amount'], 400);
        }

        /** @var User $user */
        $user = $userRepository->find(id: $responseObject->metadata->userId);

        if (null === $user) {
            return new JsonResponse(['status' => 'User not found'], 400);
        }

        $referralNft = new ReferralNft();
        $referralNft->setOwner($user);
        $referralNft->setRefCode($responseObject->metadata->refCode);
        //$referralNft->setHash($data['rNftHash']);
        $referralNft->setSpecial(true);
        $referralNft->setOrderId($responseObject->id);

        $referralNftRepository->save($referralNft);

        return new JsonResponse(['status' => 'OK']);
    }
}
