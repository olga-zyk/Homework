<?php

namespace App\Service;

/**
 * Class MoneyFormatter
 * @package App\Service
 */
class MoneyFormatter
{
  /**
   * @var NumberFormatter
   */
  private $numberFormatter;

  /**
   * MoneyFormatter constructor.
   * @param \App\Service\NumberFormatter $numberFormatter
   */
  public function __construct(NumberFormatter $numberFormatter)
  {
    $this->numberFormatter = $numberFormatter;
  }

  /**
   * @param $number
   * @return string
   */
  public function formatEur(float $number): string
  {
    $formattedMoneyEur = $this->numberFormatter->formatNumber($number);
    return $formattedMoneyEur . '' . ' €';
  }

  /**
   * @param $number
   * @return string
   */
  public function formatUsd(float $number): string
  {
    $formattedMoneyUsd = $this->numberFormatter->formatNumber($number);
    return '$' . $formattedMoneyUsd;
  }

}