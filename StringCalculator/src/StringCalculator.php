<?php
namespace App;

final class StringCalculator 
{
    public function calculate(string $numberString) :int
    {  
        if(empty($numberString))
        {
            return 0;
        }
        
        if(strpos($numberString, ","))
        {
            $numbers = explode(",", $numberString);
            $intNumbers = array();
            foreach($numbers as $number)
            {   
                array_push($intNumbers, intval($number));                
            }
            return array_sum($intNumbers);
        }

        return intval($numberString);
    }     
}