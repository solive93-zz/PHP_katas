<?php
use PHPUnit\Framework\TestCase;
use App\GoL;

/*El Universo se programa con un estado inicial y a partir del mismo se "itera" con dos reglas. 
Cada iteración cambia el estado del universo (y de sus células).
Las reglas son:
1. Una célula muerta que tenga a su alrededor tres células vivas, 
renace (estará viva en la siguiente iteración) 
2. Una célula viva con dos o tres células a su alrededor continuará con vida 
(estará viva en la siguiente iteración), de lo contrario muere 
(estará muerta en la siguiente iteración).

https://meet.jit.si/static/dialInInfo.html?room=Gamelivekata

*/

final class GoLTest extends TestCase
{   
   
    public $DEATH = 0;
    public $ALIVE = 1;
          
    public function test_cell_dies_when_all_neighbors_dead()
    {
        $array = array ( 
        array(0, 0, 0),
        array(0, 1, 0),
        array(0, 0, 0),
        );

        $cellSatus = GoL::getCellStatus($array);

        $this->assertSame($cellSatus, $this->DEATH);
    } 
    
    public function test_cell_born_when_3_neighbors_alive()
    {
        $array = array ( 
            array(1, 1, 0),
            array(0, 0, 1),
            array(0, 0, 0),
            );

        $cellSatus = GoL::getCellStatus($array);
        
        $this->assertSame($cellSatus, $this->ALIVE);
    } 

    public function test_count_alive_neighbors()
    {
        $array = array ( 
            array(1, 1, 0),
            array(0, 0, 1),
            array(0, 0, 0),
            );
    
        $count=GoL::getAliveNeighbors($array);
            
        $this->assertSame($count, 3);
    }

    public function test_cell_remains_alive_when_2_alive_neighbors()
    {
        $array = array ( 
            array(1, 1, 0),
            array(0, 1, 0),
            array(0, 0, 0),
            );

        $cellSatus = GoL::getCellStatus($array);

        $this->assertSame($cellSatus, $this->ALIVE);
    }

    public function test_cell_remains_alive_when_3_alive_neighbors()
    {
        $array = array ( 
            array(1, 1, 0),
            array(0, 1, 1),
            array(0, 0, 0),
            );

        $cellSatus = GoL::getCellStatus($array);
        $this->assertSame($cellSatus, $this->ALIVE);
    }

    public function test_cell_dies_when_1_alive_neighbor()
    {
        $array = array ( 
            array(0, 0, 0),
            array(0, 1, 1),
            array(0, 0, 0),
            );

        $cellSatus = GoL::getCellStatus($array);
        $this->assertSame($cellSatus, $this->DEATH);
    }

    public function test_cell_dies_when_4_alive_neighbors()
    {
        $array = array ( 
            array(0, 0, 0),
            array(1, 1, 1),
            array(1, 1, 0),
            );

        $cellSatus = GoL::getCellStatus($array);
        $this->assertSame($cellSatus, $this->DEATH);
    }   
}