<?php
namespace App;

final class PrimeFactors 
{
    public function calculate(int $number) :array
    {   
        $factors = [];
        
        while($number > 1)
        {   
            $divisor = 2;
            if($number % $divisor !== 0)
            {   
                $divisor++;
                if ($number % $divisor !== 0)
                {
                    array_push($factors, $number);
                    break;
                }
                array_push($factors, $number);
                $number/=$divisor;

            }
            
            array_push($factors, $divisor);
            $number /= $divisor;
            
        }
        
        return $factors;
    

        
        
        
        
    }
}


