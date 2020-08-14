<?php
use PHPUnit\Framework\TestCase;
use App\PrimeFactors;

/*
 Un numero primo solos es divisible entre sí mismo y entre 1.
 * El 0 no se considera ni primo ni compuesto.
 * Estos son los numeros primeros del 1 al 1000: 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491, 499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641, 643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787, 797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941, 947, 953, 967, 971, 977, 983, 991 y 997
*/

final class PrimeFactorsTest extends TestCase
{       
    public function test_1_returns_empty_array()
    {
        $primeFactor = PrimeFactors::calculate(1);
        $this->assertIsArray($primeFactor);
        $this->assertTrue(empty($primeFactor));
    }

    public function test_return_the_number_when_a_prime_number_given()
    {
        $this->assertSame([2], PrimeFactors::calculate(2));
        $this->assertSame([3], PrimeFactors::calculate(3));
        $this->assertSame([5], PrimeFactors::calculate(5));
        $this->assertSame([7], PrimeFactors::calculate(7));
       
    }

    public function test_returns_the_prime_factors_when_a_composite_number_given()
    {
        $this->assertSame([2, 2], PrimeFactors::calculate(4));
        $this->assertSame([2, 3], PrimeFactors::calculate(6));
        $this->assertSame([2, 2, 2], PrimeFactors::calculate(8));
        $this->assertSame([2, 5], PrimeFactors::calculate(10));
        $this->assertSame([3, 3], PrimeFactors::calculate(9));
        
        //$this->assertSame([2, 2, 4], PrimeFactors::calculate(12));
        //$this->assertSame([2, 2, 2, 2], PrimeFactors::calculate(16));
    }
}