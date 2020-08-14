<?php
use PHPUnit\Framework\TestCase;
use App\Casteller;

final class CastellerTest extends TestCase
{   
    private $personsStrings;
    public function setUp(): void
    {
        $this->personsStrings = ['30 35','40 20', '35 80', '20, 32'];
        parent::setUp(); 
    }

    public function test_translate_string_in_to_people()
    {

        $return = Casteller::translate($this->personsStrings);

        $this->assertIsArray($return);
        $this->assertInstanceOf('App\Casteller',$return[1]);
    }

    public function test_person_have_name()
    {
        $return = Casteller::translate($this->personsStrings);
        $this->assertClassHasAttribute('name','App\Casteller');
        $this->assertNotNull($return[0]->getName());
    }

    /* public function test_person_has_weight()
    {
        $return = Casteller::translate($this->personasStrings);
        
        $this->assertClassHasAttribute('weight','App\Casteller');
        $this->assertNotNull($return[1]->getWeight());
    } */

    public function test_sort_by_mass()
    {   
        $castellers= Casteller::translate($this->personsStrings);
        $sortedArray = Casteller::sortByMass($castellers);
        
        $this->assertIsArray($sortedArray);
        $this->assertGreaterThan($sortedArray[0]->wight, $sortedArray[1]->weight);
        $this->assertGreaterThan($sortedArray[1]->wight, $sortedArray[2]->weight);
    }
   
}
