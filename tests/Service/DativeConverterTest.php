<?php

namespace App\Tests\Service;

use App\Service\DativeConverter;
use PHPUnit\Framework\TestCase;

/**
 * Class DativeConverterTest
 * @package App\Tests\Service
 */
class DativeConverterTest extends TestCase
{

  /**
   * @return array
   */
  public function getConvertData()
  {
    return [
      ['Kastyčiui', 'Kastytis'],
      ['Jurgiui', 'Jurgis'],
      ['Pauliui', 'Paulius'],
      ['Oleg', 'Oleg']
    ];

  }

  /**
   * @param $name
   * @param $expected
   * @dataProvider getConvertData
   */
  public function testConvertData($expected, $name)
  {
    $converter = new DativeConverter();
    $result = $converter->convert($name);
    $this->assertEquals($expected, $result);
  }

}