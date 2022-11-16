<?php
namespace App\Common\Service;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class PasswordChangeManager
 */
class PasswordChangeManager
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    /**
     * @var SessionInterface
     */
    private SessionInterface $session;

    /**
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * @param EntityManagerInterface $entityManager
     * @param SessionInterface $session
     * @param TranslatorInterface $translator
     */
    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session, TranslatorInterface $translator)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
        $this->translator = $translator;
    }

    /**
     * @param UserInterface|User $user
     */
    public function checkPasswordChange(UserInterface $user)
    {
        $passwordChangeInterval = 360;
        $lastPasswordChange = $user->getLastPasswordChange();

        if (null === $lastPasswordChange) {
            $this->forcePasswordChange();
        } else {
            $daysSinceLastPasswordChange = $lastPasswordChange->diff(new DateTime());
            $interval = $daysSinceLastPasswordChange->days;
            $daysLeft = $passwordChangeInterval - $interval;

            if ($daysLeft < 0) {
                $this->forcePasswordChange();
                return;
            } elseif ($daysLeft <= 5) {
                $toPassChange = $daysLeft;
                $this->promptForPasswordChange($toPassChange);
            }
            if ($this->session->has('forcePasswordChange')) {
                $this->session->remove('forcePasswordChange');
            }
        }
    }

    /**
     * Forces user to change password
     */
    public function forcePasswordChange()
    {
        $this->session->set('forcePasswordChange', $this->translator->trans('security.password_must_be_changed'));
    }

    /**
     * Reminds of password change in $interval day(s)
     * 
     * @param int $interval
     */
    public function promptForPasswordChange(int $interval)
    {
        $this->session->getFlashBag()->add('warning', $this->translator->transChoice('security.password_should_be_changed', $interval));
    }
}
