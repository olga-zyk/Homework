<?php

namespace App\Service;

class DativeConverter
{
  public function convert($name)
  {
    // kastyTIS
    if (mb_substr($name, -3) === 'tis') {
      return mb_substr($name, 0, -3) . 'čiui';
    }

    // jurgIS
    if (mb_substr($name, -2) === 'is') {
      return mb_substr($name, 0, -2) . 'iui';
    }

    // pauliUS
    if (mb_substr($name, -2) === 'us') {
      return mb_substr($name, 0, -2) . 'ui';
    }

    // Oleg
    return $name;

  }
}