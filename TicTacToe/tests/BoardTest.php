<?php
use PHPUnit\Framework\TestCase;
use App\Board;
/*
Write code that figures out the state of a 3x3 tic tac toe board. The board is a 3 times 3 grid which are either X (for player 1), Y (player 2) or empty.

If the board is in a state that could not be achieved by playing in turns starting with player 1, it is Illegal

Otherwise if exactly one player has 3 symbols in a vertical, horizontal or diagonal row, she wins, indicated by Player 1 wins or Player 2 wins

If both players would win, no one wins, instead, it is Illegal

If the board is full and not illegal, it is a Draw

If the board is neither full nor illegal, it is Player 1 turn or Player 2 turn, depending on who’s turn it is (starting with 1) */

final class BoardTest extends TestCase
{       
   
    public function test_serialize_returns_1D_array()
    {   
        $array2D =array(
            array('X','O',''),
            array('O','X',''),
            array('','','X')
        );

        $board = new Board();
        $array1D = $board->serialize($array2D);

        $this->assertIsArray($array1D);
        $this->assertEquals(9, sizeOf($array1D));
    }

    public function test_returns_5_when_board_with_5_full_spots()
    {   
        $array2D = array(
            array('X','O',''),
            array('O','X',''),
            array('','','X')
        );

        $board = new Board();
        $fullSpots = $board->countFullSpots($board->serialize($array2D));

        $this->assertEquals(5, $fullSpots);
    }

    public function test_returns_9_when_all_board_is_full()
    {   
        $array2D =array(
            array('X','O','X'),
            array('O','X','X'),
            array('O','X','O')
        );

        $board = new Board();
        $fullSpots = $board->countFullSpots($board->serialize($array2D));

        $this->assertEquals(9, $fullSpots);
    }

    public function test_returns_true_when_all_board_is_full()
    {   
        $array2D =array(
            array('X','O','X'),
            array('O','X','X'),
            array('O','X','O')
        );

        $board = new Board();
        $isFull = $board->checkIsFull($board->serialize($array2D));

        $this->assertTrue($isFull);
    }

    public function test_returns_true_when_all_squares_full()
    {
        $array1D = array("X", "X", "X", "O", "X", "O", "O", "X", "O");

        $board = new Board();
        $this->assertTrue($board->checkIsFull($array1D));
    }

    public function test_player_1_wins()
    {
        $array2D =array(
            array('X','O',''),
            array('O','X',''),
            array('','','X')
        );

        $board = new Board();
        $status = $board->getStatus($array2D);

        $this->assertEquals('Player 1 wins', $status);
    }   

    public function test_board_full_and_not_illegal()
    {
        $array2D = array(
            array('O','O','X'),
            array('X','X','O'),
            array('O','X','X')
        );

        $board = new Board();
        $status = $board->getStatus($board->serialize($array2D));

        $this->assertSame('Draw', $status);
    }




}
