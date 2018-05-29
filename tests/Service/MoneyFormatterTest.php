<?php

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use App\Service\MoneyFormatter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class MoneyFormatterTest
 * @package App\Tests\Service
 */
class MoneyFormatterTest extends TestCase
{

  /**
   * @throws \ReflectionException
   */
  public function testFormatEur()
  {
    /**
     * @var NumberFormatter|MockObject $numberFormatterMock
     */
    $numberFormatterMock = $this->createMock(NumberFormatter::class);
    $numberFormatterMock->expects($this->once())
      ->method('formatNumber')
      ->willReturn('2.84M');

    $moneyFormatter = new MoneyFormatter($numberFormatterMock);
    $this->assertEquals(
      '2.84M €',
      $moneyFormatter->formatEur(2835779)
    );
  }

  /**
   * @throws \ReflectionException
   */
  public function testFormatUsd()
  {
    $numberFormatterMock = $this->createMock(NumberFormatter::class);
    $numberFormatterMock->expects($this->once())
      ->method('formatNumber')
      ->willReturn('2.84M');


    /**
     * @var NumberFormatter|MockObject $numberFormatterMock
     */
    $moneyFormatter = new MoneyFormatter($numberFormatterMock);
    $this->assertEquals(
      '$2.84M',
      $moneyFormatter->formatUsd(2835779)
    );
  }

}