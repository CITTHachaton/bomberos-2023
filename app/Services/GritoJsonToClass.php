<?php

namespace App\Services;

class GritoJsonToClass
{


  static function getConvert($money, $decimal = 0) {
    return number_format($money, $decimal, ',', '.');
  }
}
