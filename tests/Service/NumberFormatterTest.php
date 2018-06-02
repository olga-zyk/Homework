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
          ['1.00M', 999500],
          ['-1.00M', -999500],
          ['2.84M', 2835779],
          ['-10.26M', -10255779],

          ['100K', 99950],
          ['124K', 123654.89],
          ['-124K', -123654.89],
          ['535K', 535216],

          ['1 000', 999.9999],
          ['-1 000', -999.9999],
          ['8 024', 8023.91905],
          ['-8 024', -8023.91905],
          ['27 534', 27533.78],

          ['533.10', 533.1],
          ['66.67', 66.6666],
          ['999.99', 999.99],
          ['-999.99', -999.99],

          ['12', 12.00],
          ['-12', -12.00],
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