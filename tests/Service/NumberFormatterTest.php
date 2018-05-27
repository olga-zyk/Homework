<?php

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
  /**
   * @return array
   */
  public function getData()
  {
    return [
      ['2.84M', '2835779'],
      ['535K', '535216'],
      ['27 534', '27533.78'],
      ['533.10', '533.1']
    ];
  }

  /**
   * @param $expected
   * @param $number
   * @dataProvider getData
   */
  public function testNumberFormatter($expected, $number)
  {
    $numberFormatter = new NumberFormatter();
    $result = $numberFormatter->formatNumber($number);
    $this->assertEquals($expected, $result);

  }


}