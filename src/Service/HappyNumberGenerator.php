<?php

namespace App\Service;

class HappyNumberGenerator
{
    public function generate()
    {
      try {
        return random_int(1, 99);
      } catch (\Exception $e) {
      }
    }
}
