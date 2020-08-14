<?php
use PHPUnit\Framework\TestCase;
use App\StringCalculator;

final class StringCalculatorTest extends TestCase
{
    public function test_return_zero_when_empty_string() 
    {   
        $numberString = "";
        $return = StringCalculator::calculate($numberString);

        $this->assertSame($return, 0);
    }

    public function test_return_four_when_one_stringNumber_given()
    {
        $case4 = StringCalculator::calculate("4");
        $case10 = StringCalculator::calculate("10");
        $case4500 = StringCalculator::calculate("4500");

        $this->assertSame($case4, 4);
        $this->assertSame($case10, 10);
        $this->assertSame($case4500, 4500);
    }

    public function test_return_sum_when_two_numbers_given()
    {
        $numberString = "2, 5";
        $return = StringCalculator::calculate($numberString);

        $this->assertSame($return, 7);
    }

    public function test_return_sum_when_n_numbers_given()
    {
        $return = StringCalculator::calculate("2, 9, 12");
        $return1 = StringCalculator::calculate("1, 1, 1, 9, 22");
        $return2 = StringCalculator::calculate("1, 2, 3, 4,, 6, 7, 8, 9, 21, 11");

        $this->assertSame($return, 23);
        $this->assertSame($return1, 34);
        $this->assertSame($return2, 72);
    }

    //additional use cases
    

   


}