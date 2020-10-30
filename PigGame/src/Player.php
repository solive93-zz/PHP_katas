<?php
namespace App;

class Player
{
    private $globalScore; 
    private $roundScore;

    public function __construct()
    {
        $this->roundScore = 0;
        $this->globalScore = 0;
    }

    public function getGlobalScore() :int
    {
        return $this->globalScore;
    }

    public function setGlobalScore(int $number)
    {
        $this->globalScore = $number;
    }

    public function getRoundScore() :int
    {
        return $this->roundScore;
    }

    public function setRoundScore(int $number)
    {
        $this->roundScore = $number;
    }

    public function roll(int $number = null) :int
    {
        $diceScore = is_null($number) ? random_int(1, 6) : $number;
        
        if($diceScore == 1)
        {
            $this->roundScore = 0;
            return $diceScore;
        }
        
        $this->roundScore += $diceScore;
        return $diceScore;
    }

    public function hold()
    {
        $this->globalScore += $this->roundScore;
        $this->roundScore = 0;
    }
}