<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\HappyNumberGenerator;
use App\Service\Mailer;
use App\Service\UserMailer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class UserMailerTest
 * @package App\Tests\Service
 */
class UserMailerTest extends TestCase
{

  /**
   * @throws \ReflectionException
   */
  public function testSendHello()
  {
    $user = new User();
    $user->setName('Vardenis');
    $user->setEmail('me@example.com');

    /**
     * @var Mailer|MockObject $mailerMock
     */
    $mailerMock = $this->createMock(Mailer::class);
    $mailerMock->expects($this->once())
      ->method('send')
      ->with('me@example.com', 'Hello Vardenis, your happy number is 42');

    /**
     * @var HappyNumberGenerator|MockObject $happyNumberGeneratorMock
     */
    $happyNumberGeneratorMock = $this->createMock(HappyNumberGenerator::class);
    $happyNumberGeneratorMock->expects($this->once())
      ->method('generate')
      ->willReturn(42);

    $userMailer = new UserMailer($mailerMock, $happyNumberGeneratorMock);
    $userMailer->sendHello($user);
  }


}