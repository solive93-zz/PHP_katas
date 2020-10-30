<?php
namespace App;

use App\Player;

final class PigGame 
{   
    private $player1;
    private $player2;

    public function __construct()
    {
        $this->player1 = new Player();
        $this->player2 = new Player();
    }

    public function getPlayer(int $playNum) :Player
    {
        return $playNum == 1 ? $this->player1 : $this->player2;
    }
}    



