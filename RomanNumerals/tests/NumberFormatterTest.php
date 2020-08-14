<?php
use PHPUnit\Framework\TestCase;
use App\NumberFormatter;

final class NumberFormatterTest extends TestCase
{   
    private static function check(int $decimal, string $roman) :void
    {
        self::assertSame($roman, NumberFormatter::romanize($decimal));
    }

    public function test_returns_I_when_1_given()
    {
        $this->assertSame(NumberFormatter::romanize(1), 'I');
        $this->assertSame(NumberFormatter::romanize(2), 'II');
        $this->assertSame(NumberFormatter::romanize(3), 'III');
    }
    //skip 4 = IV --> exception

    public function test_returns_V_when_5_given()
    {
        $this->assertSame(NumberFormatter::romanize(5), 'V');
    }

    public function test_concatenates_I_after_V_for_each_extra_number()
    {
        $this->assertSame(NumberFormatter::romanize(6), 'VI');
        $this->assertSame(NumberFormatter::romanize(7), 'VII');
        $this->assertSame(NumberFormatter::romanize(8), 'VIII');
    }

    public function test_returns_X_when_10_given()
    {
        $this->assertSame(NumberFormatter::romanize(10), 'X');
    }

    public function test_concatenates_Vs_and_Is_after_X()
    {
        $this->assertSame(NumberFormatter::romanize(13), 'XIII');
        $this->assertSame(NumberFormatter::romanize(15), 'XV');
        $this->assertSame(NumberFormatter::romanize(16), 'XVI');
        $this->assertSame(NumberFormatter::romanize(18), 'XVIII');
    }

    //skip 9 = IX --> exception;

    public function test_returns_combinations_of_multiple_Xs_with_Vs_and_Is()
    {
        $this->assertSame(NumberFormatter::romanize(20), 'XX');
        $this->assertSame(NumberFormatter::romanize(30), 'XXX');
        $this->assertSame(NumberFormatter::romanize(25), 'XXV');
        $this->assertSame(NumberFormatter::romanize(28), 'XXVIII');
        $this->assertSame(NumberFormatter::romanize(37), 'XXXVII');
    }
    
    //Let's handle exceptions
    public function test_returns_correct_number_in_exceptional_cases()
    {
        self::check(4, 'IV');
        self::check(9, 'IX');
        self::check(40, 'XL');
        self::check(90, 'XC');
        self::check(400, 'CD');
        self::check(900, 'CM');     
    }

    public function test_several_random_numbers()
    {
        self::check(1000, 'M');
        self::check(999, 'CMXCIX');
        self::check(219, 'CCXIX');
        self::check(714, 'DCCXIV');
        self::check(149, 'CXLIX');
        self::check(419, 'CDXIX');
        self::check(89, 'LXXXIX');
        self::check(49, 'XLIX');
    }

}