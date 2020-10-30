<?php
use PHPUnit\Framework\TestCase;
use App\PigGame;
use App\Player;

final class PigGameTest extends TestCase
{       
    public function test_game_has_2_players()
    {
       $game = new PigGame();

       $this->assertObjectHasAttribute('player1', $game);
       $this->assertObjectHasAttribute('player2', $game);
        
       $this->assertInstanceOf(Player::class, $game->getPlayer(1));
       $this->assertInstanceOf(Player::class, $game->getPlayer(2));    
    }
}
