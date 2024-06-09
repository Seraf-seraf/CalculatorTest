<?php

namespace App\tests;

use App\src\Calculator;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @covers \App\src\Calculator::addition
     * @dataProvider additionProvider
     */
    public function testAddition($a, $b, $expectedResult)
    {
        $actualResult = $this->calculator->addition($a, $b);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public static function additionProvider()
    {
        return [
            '1.5 + 1.1' => [1.5, 1.1, 2.6],
            '-5 + -6' => [-5, -6, -11],
            '-1 + 9999999' => [-1, 9999999, 9999998]
        ];
    }


    /**
     * @covers \App\src\Calculator::difference
     * @dataProvider differenceProvider
     */
    public function testDifference($a, $b, $expectedResult)
    {
        $actualResult = $this->calculator->difference($a, $b);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public static function differenceProvider()
    {
        return [
            '-5 - (-5)' => [-5, -5, 0],
            '0.10 - 0.01' => [0.1, 0.01, 0.09],
            '223 - 123' => [223, 123, 100]
        ];
    }

    /**
     * @covers \App\src\Calculator::multiplication
     * @dataProvider multiplicationProvider
     */
    public function testMultiplication($a, $b, $expectedResult)
    {
        $actualResult = $this->calculator->multiplication($a, $b);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public static function multiplicationProvider()
    {
        return [
            '2 * 2' => [2, 2, 4],
            '5 * (-1)' => [5, -1, -5],
            '9999 * 0.1' => [9999, 0.1, 999.9]
        ];
    }

    /**
     * @covers \App\src\Calculator::division
     * @dataProvider divisionProvider
     */
    public function testDivision($a, $b, $expectedResult)
    {
        $actualResult = $this->calculator->division($a, $b);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public static function divisionProvider()
    {
        return [
            '9999 / 7' => [9999, 7, 1428.4285714286],
            '1 / 5' => [1, 5, 0.2],
            '10 / (-2)' => [10, -2, -5]
        ];
    }

    /**
     * @covers \App\src\Calculator::division
     */
    public function testDivisionByZero()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Can't divide by zero");
        (new Calculator())->division(1, 0);
    }

    /**
     * @covers \App\src\Calculator
     */
    public function testType()
    {
        $this->expectException(\TypeError::class);
        $this->calculator->addition('g', 1);
        $this->calculator->division(2, 'ffe');
        $this->calculator->difference(2, 'ffe');
        $this->calculator->multiplication('12ef', 'ffe');
    }
}