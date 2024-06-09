<?php
namespace App\src;
class Calculator
{
    const PRECISION = 10;
    public function addition(int|float $a, int|float $b): int|float
    {
        return round($a + $b, self::PRECISION);
    }

    public function difference(int|float $a, int|float $b): int|float
    {
        return round($a - $b, self::PRECISION);
    }

    public function multiplication(int|float $a, int|float $b): int|float
    {
        return round($a * $b, self::PRECISION);
    }

    public function division(int|float $a, int|float $b): int|float
    {
        if ($b === 0) {
            throw new \Exception("Can't divide by zero");
        }

        return round($a / $b, self::PRECISION);
    }
}
