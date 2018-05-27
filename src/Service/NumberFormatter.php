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
    public function formatNumber(float $number)
    {

      $numberFormat = '';

      if (999500 <= $number) {
        $numberFormat = sprintf("%4.2f", number_format((round($number, -4)), 0, '.', '.')) . 'M';
      } else if (99950 <= $number && $number < 999500) {
        $numberFormat = sprintf("%3d", number_format((round($number, -3)), 0, '.', '.')) . 'K';
      } else if ($number >= 1000 && $number < 99950) {
        $numberFormat = str_replace(".", " ", number_format((round($number, 0)), 0, '.', '.'));
      } else if ($number < 1000) {
        $numberFormat = number_format(strval($number), 2, '.', '.');
      }

      return $numberFormat;

    }

  }