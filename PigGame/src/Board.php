<?php
namespace App;

final class Board 
{   
    private $isFull;
    private $boardSize = 9;

    public function serialize(array $array2D) :array
    {   
        $array1D = [];
        foreach($array2D as $row)
        {
            foreach($row as $spot)
            {
                array_push($array1D, $spot);
            }
        }
        return $array1D;
    }
    
    public function countFullSpots(array $array1D) :int
    {   
        //$this->serialize($array);
        $counter=0;
        foreach($array1D as $element)
        {
            if(!empty($element))
            {
                $counter +=1;
            }
        }
        return $counter;
    }

    public function checkIsFull(array $array1D) :bool
    {
        if($this->countFullSpots($array1D) === $this->boardSize)
        {
            return true;
        }
        return false;
    }

    public function getStatus(array $array) :string
    {   
        if(!$this->checkIsFull($array))
        {
            return'Player 1 wins';
        }
        
        return 'Draw';
    }
}    



