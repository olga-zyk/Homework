<?php

  namespace App\Service;
  
  /**
   * Class NumberFormatter
   * @package App\Service
   */
  class NumberFormatter
  {
    /**
     * @param float $number
     * @return string
     */
    public function formatNumber(float $number): string
    {
      $formattedNumber = '';

      if (999500 <= $number) {
        $formattedNumber = sprintf("%4.2f", number_format((round(abs($number), -4)), 0, '.', '.')) . 'M';
      } else if (99950 <= $number && $number < 999500) {
        $formattedNumber = sprintf("%3d", number_format((round(abs($number), -3)), 0, '.', '.')) . 'K';
      } else if ($number >= 1000 && $number < 99950) {
        $formattedNumber = str_replace(".", " ", number_format((round(abs($number), 0)), 0, '.', '.'));
      } else if ($number < 1000) {
        $formattedNumber = number_format(strval(abs($number)), 2, '.', '.');
      }

      return $formattedNumber;
    }

  }