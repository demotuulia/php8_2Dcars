<?php
/**
 * A class to test the map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
//namespace Tests;

require_once __DIR__ . '/Test.php';

use Lib\Factor\Base\Map as MapFactor;
use Lib\Models\CarPosition;

class Map extends Test
{
    /**
     * Test initialize
     */
    public function testInitialize()
    {
        $northCorner = 456;
        $eastCorner = 235;
        
        $constructorParams = [
            'northCorner' => $northCorner,
            'eastCorner' => $eastCorner,
        ];
        $map = MapFactor::build('Standard', $constructorParams);
        
        $dimensions = $map->getMapDimensions();
        $this->assertEquals($northCorner, $dimensions->north);
        $this->assertEquals($eastCorner, $dimensions->east);
    }
    
    
    /**
     * Test move
     */
    public function testMove()
    {
        $cases = [
         
                'Move 1 unit to north' =>  [
                    'initialPos' => (object)['x' => 45, 'y'=>34, 'dir' => 'N'],
                    'move' => [1],
                    'expectedPosition' => (object)['x' => 45, 'y'=>35]
                ],
            
                'Move 1 unit to west' =>  [
                    'initialPos' => (object)['x' => 45, 'y'=>34, 'dir' => 'W'],
                    'move' => [1],
                    'expectedPosition' => (object)['x' => 44, 'y'=>34]
                ],
            
                'Move 2 unit  to east' =>  [
                    'initialPos' => (object)['x' => 45, 'y'=>34, 'dir' => 'E'],
                    'move' => [2],
                    'expectedPosition' => (object)['x' => 47, 'y'=>34]
                ],
            
                'Move 2 times' =>  [
                    'initialPos' => (object)['x' => 45, 'y'=>34, 'dir' => 'N'],
                    'move' => [2,3],
                    'expectedPosition' => (object)['x' => 45, 'y'=>39]
                ],
            
               
        ];
        
        
        $constructorParams = [
            'northCorner' => 1000,
            'eastCorner' => 1000,
        ];
        $map = MapFactor::build('Standard', $constructorParams);
        
        foreach ($cases as $label => $case) {
            if (isset($carPosition)) {
                unset($carPosition);
            }
          
            $carPosition  = new CarPosition(
                $case['initialPos']->x,
                $case['initialPos']->y,
                $case['initialPos']->dir
            );
            
            foreach ($case['move'] as $move) {
                      $map->moveForward($move, $carPosition);
            }
            
            
            $this->assertEquals(
                $case['expectedPosition']->x,
                $carPosition->getX(),
                $label . ', X position '
            );
            
            $this->assertEquals(
                $case['expectedPosition']->y,
                $carPosition->getY(),
                $label . ', Y position '
            );
        }
    }
}
