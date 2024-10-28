<?php

namespace App\Services;

class DiscountService {
    public static function calculate($price, $discount) {
        return ($price * $discount) / 100;
    }
}