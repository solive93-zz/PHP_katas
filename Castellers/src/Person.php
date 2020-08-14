<?php
namespace App;

final class Casteller 
{
    
    private $name;
    private $weight;
    private $strenght;

    public function __construct($name, $weight,$strenght)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->strenght = $strenght;
    }

    public static function translate(array $strings) :array
    {
        $return = [];
        foreach ($strings as $string)
        {
            list($name, $weight, $strenght) = explode(' ', $string);
            $person = new Casteller($name,$weight,$strenght);
            array_push($return,$person);
        }

        return $return;
    }
    
    public function getName()
    {
        return $this->name;
    }

    /*public function getWeight()
    {

    }*/

    public static function sortByMass(array $castellers) :array
    {   
        function comparatorFunction($, $)
        {
            if($a==$b)
            {
                return 0;
            }
            return ($a<$b)?-1:1;
        }

        usort($castellers, comparatorFunction($castellers->weight));
        var_dump($castellers);
        return $castellers;
    }
}