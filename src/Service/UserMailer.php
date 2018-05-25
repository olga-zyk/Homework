<?php

namespace App\Service;

use App\Entity\User;

/**
 * Class UserMailer
 * @package App\Service
 */
class UserMailer
{
    /**
     * @var Mailer
     */
    private $mailer;

  /**
   * @var HappyNumberGenerator
   */
  private $happyNumberGenerator;

  /**
   * UserMailer constructor.
   * @param Mailer $mailer
   * @param HappyNumberGenerator $happyNumberGenerator
   */
  public function __construct(Mailer $mailer, HappyNumberGenerator $happyNumberGenerator)
    {
        $this->mailer = $mailer;
        $this->happyNumberGenerator = $happyNumberGenerator;
    }

  /**
   * @param User $user
   */
  public function sendHello(User $user)
    {
        $body = sprintf('Hello %s, ', $user->getName());
        $body = $body . 'your happy number is ' . $this->happyNumberGenerator->generate();

        $this->mailer->send($user->getEmail(), $body);
    }

}
