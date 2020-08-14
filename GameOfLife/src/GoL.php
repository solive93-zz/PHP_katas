<?php
namespace App;


final class GoL 
{   
    public static function getCellStatus($array){

        $aliveCells_count = GoL::getAliveNeighbors($array);
        $cellStatus =  $array[1][1];
        
        if ($cellStatus == 0 && $aliveCells_count == 3){
            $cellStatus = 1;            
        }
    
        if ($cellStatus == 1 && ($aliveCells_count == 2 || $aliveCells_count == 3)){
            $cellStatus = 1;
        }

        if($cellStatus == 1 && ($aliveCells_count ==1 || $aliveCells_count >= 4))
        {
            $cellStatus = 0;
        }

        if ($aliveCells_count == 0){
            $cellStatus = 0;
        }

        return $cellStatus;
        
    }

    public static function getAliveNeighbors($array){
        $aliveCells_count = 0;
        foreach($array as $x => $row){
            foreach($row as $y => $cell){
                if ($cell == 1 && ($x != 1 || $y != 1)){
                    $aliveCells_count= $aliveCells_count + 1;
                }
            }
        }
        return $aliveCells_count;
    }
    
}


