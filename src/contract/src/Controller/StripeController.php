<?php

namespace App\Controller;

use App\Common\Repository\UserRepository;
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
     * @return Response
     *
     * @Route("/stripe", name="stripe_event_receive", methods={"POST"})
     */
    public function stripeEventReceive(ContainerInterface $container, UserRepository $userRepository): Response
    {
        $payload = @file_get_contents('php://input');
        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? null;
        $secret = $container->getParameter('stripe_secret');

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

        if (!$responseObject || !$responseObject->client_reference_id || $responseObject->currency !== 'usd' || $responseObject->amount_total < 5000) {
            return new JsonResponse(['status' => 'Wrong answer data'], 400);
        }

        /** @var User $user */
        $user = $userRepository->find(id: $responseObject->client_reference_id);

        if (null === $user) {
            return new JsonResponse(['status' => 'User not found'], 400);
        }

        $user->setPaidCommission(true);
        $userRepository->flush();

        return new JsonResponse(['status' => 'OK']);
    }
}
