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
      ['Oleg', 'Oleg'],
      ['Jurgis', 'Jurgiui'],
      ['Kastytis', 'Kastyčiui'],
      ['Paulius', 'Pauliui']
    ];

  }

  /**
   * @param $name
   * @param $expected
   */
  public function testConvertData($expected, $name)
  {
    $converter = new DativeConverter();
    $result = $converter->convert($name);
    $this->assertEquals($expected, $result);
  }

//  public function testConvertOleg()
//  {
//
//    $converter = new DativeConverter();
//    $value = $converter->convert('Oleg');
//    $this->assertEquals('Oleg', $value);
//
//  }
//
//  public function testConvertKastytis()
//  {
//
//    $converter = new DativeConverter();
//    $value = $converter->convert('Kastytis');
//    $this->assertEquals('Kastyčiui', $value);
//  }
//
//  public function testConvertJurgis()
//  {
//
//    $converter = new DativeConverter();
//    $value = $converter->convert('Jurgis');
//    $this->assertEquals('Jurgiui', $value);
//
//  }

}