<?php
use PHPUnit\Framework\TestCase; 
use App\PigGame;
use App\Player;

final class PigGameTest extends TestCase
{       
    public function test_game_has_2_players()
    {
        $player1 = new Player();
        $player2 = new Player();
        $game = new PigGame($player1, $player2);

        $this->assertObjectHasAttribute('player1', $game);
        $this->assertObjectHasAttribute('player2', $game);
        
        $this->assertInstanceOf(Player::class, $game->getPlayer(1));
        $this->assertInstanceOf(Player::class, $game->getPlayer(2));    
    }

    public function test_game_has_turns()
    {
        $player1 = new Player();
        $player2 = new Player();
        $game = new PigGame($player1, $player2);

        $this->assertObjectHasAttribute('turn', $game);
    }

    public function test_player1_starts_playing()
    {
        $player1 = new Player();
        $player2 = new Player();
        $game = new PigGame($player1, $player2);

        $this->assertEquals($player1, $game->getTurn());
    }

    
    
}
