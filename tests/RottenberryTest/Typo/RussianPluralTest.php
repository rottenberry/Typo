<?php

require('local/vendor/autoload.php');

use \Rottenberry\Typo\RussianPlural;
use \PHPUnit\Framework\TestCase;

class RussianPluralTest extends TestCase
{
  public function testCreate()
  {
    $carPlural = RussianPlural::create(["машина", "машины", "машин"]);
    $this->assertEquals(
      method_exists($carPlural, 'pluralize'),
      true,
      "The object does not have pluralize() method."
      );
  }

  public function testPluralize()
  {
    $daysPlural = RussianPlural::create(["день", "дня", "дней"]);
    $testCases = [
      ['day' => 1, 'number' => 'день'],
      ['day' => 3, 'number' => 'дня'],
      ['day' => 5, 'number' => 'дней'],
      ['day' => 1002, 'number' => 'дня'],
      ['day' => 51, 'number' => 'день'],
      ['day' => 100, 'number' => 'дней'],
      ['day' => 33, 'number' => 'дня'],
      ['day' => 90, 'number' => 'дней'],
    ];
    foreach ($testCases as $testCase) {
      $this->assertEquals(
        $daysPlural->pluralize($testCase['day']), 
        $testCase['number']
      );
    }
  }
}

