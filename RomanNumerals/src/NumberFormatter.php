<?php
namespace App;


final class NumberFormatter 
{   
    protected static $keyNumbers = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );
    
    public static function romanize(int $number) :string
    {   
        $romanizedNumber = '';

        foreach(self::$keyNumbers as $roman => $decimal)
        {
            while($number >= $decimal)
            {
                $romanizedNumber .= $roman;
                $number -= $decimal;
            }
        }
        return $romanizedNumber;
    }
}


