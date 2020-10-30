<?php
namespace App;

use App\Player;

final class PigGame  
{   
    private Player $player1;
    private Player $player2;
    private Player $turn;
    

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

        $this->turn = $player1;
    }

    public function getPlayer(int $playNum) :Player
    {
        return $playNum == 1 ? $this->player1 : $this->player2;
    }

    public function getTurn()
    {
        return $this->turn;
    }



    
}    



