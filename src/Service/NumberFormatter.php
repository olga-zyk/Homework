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
      $absoluteNumber = abs($number);
      $formattedNumber = '';

      if (999500 <= $absoluteNumber) {
        $formattedNumber = sprintf("%.2fM", (round($number, -4) / 1000000));
      } else if (99950 <= $absoluteNumber && $absoluteNumber < 999500) {
        $formattedNumber = sprintf("%3dK", (round($number, -3)) / 1000);
      } else if ($absoluteNumber == 999.9999 || ($absoluteNumber >= 1000 && $absoluteNumber < 99950)) {
        $formattedNumber = number_format((round($number, 0)), 0, '', ' ');
      } else if ($absoluteNumber < 1000) {
        $formattedNumber = number_format(strval($number), 2, '.', '.');
      }

      return $formattedNumber;
    }

  }