<?php
use PHPUnit\Framework\TestCase;
use App\Player;

final class PlayerTest extends TestCase
{    
    public $player;
    
    public function SetUp() :void
    {
        $this->player = new Player();
    }

    public function test_player_has_round_and_global_scores()
    {
        $this->assertObjectHAsAttribute('globalScore', $this->player);
        $this->assertObjectHAsAttribute('roundScore', $this->player);
    }
    
    public function test_player_can_roll_the_dice()
    {
        $this->player->roll(4);

        $this->assertEquals($this->player->getRoundScore(), 4);
    }

    public function test_all_rolls_results_are_summed_in_roundScore()
    {   
        $roundScore = $this->player->getRoundScore();
        $result = $roundScore + $this->player->roll(2);
        $result += $this->player->roll(2);

        $this->assertEquals($this->player->getRoundScore(), $result);
    }

    public function test_player_loses_roundScore()
    {
        $this->player->roll(6);
        $this->player->roll(1);

        $this->assertEquals(0, $this->player->getRoundScore());
    }

    public function test_player_roundScores_adds_to_globalScore_when_holds()
    {
        $this->player->roll(5);
        $this->player->roll(6);
        $this->player->roll(2);        
        
        $this->player->hold();

        $this->assertEquals(0, $this->player->getRoundScore());
        $this->assertEquals(13, $this->player->getGlobalScore());
    }
    
    public function test_player_wins_when_gets_100_points_on_globalScore()
    {
        $this->player->setGlobalScore(98);

        $this->player->roll(2);
        $this->player->hold();

        $this->assertEquals(100, $this->player->getGlobalScore());
    } 
}