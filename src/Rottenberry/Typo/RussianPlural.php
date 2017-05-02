<?php

namespace Rottenberry\Typo;

class RussianPlural
{
  private $words;

  private function __construct()
  {

  }

  public static function create($words)
  {
    if (count($words) !== 3) {
      throw new \Exception("The words list has less or more than 3 elements");
    }
    $plural = new static();
    $plural->words = $words;
    return $plural;
  }

  public function pluralize($number)
  {
    $number = abs(intval($number));
    $remainder10 = $number % 10;
    $remainder100 = $number % 100;
    $word1 = $this->words[0];
    $word3 = $this->words[1];
    $word9 = $this->words[2];

    $word = $word9;
    if ($remainder100 < 10 || $remainder100 > 20) {
      if ($remainder10 === 1) $word = $word1;
      if ($remainder10 > 1 && $remainder10 < 5) $word = $word3;
    }
    return $word;
  }
}

