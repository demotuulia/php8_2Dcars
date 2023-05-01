<?php
/**
 * A class to test the car
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */


require_once __DIR__ . '/Test.php';

use Lib\Factor\Base\Map as MapFactor;
use Lib\Factor\Base\Car as CarFactor;
use Lib\Models\Map\Standard;

/**
 * Class Map
 */
class Map extends Test
{
    /**
     * Test initialize
     */
    public function testInitialize(): void
    {
        $map = $this->getMap();

        $expectedXPos = 10;
        $expectedYPos = 53;
        $expectedDir = 'E';

        $constructorParams = [
            'x' => $expectedXPos,
            'y' => $expectedYPos,
            'dir' => $expectedDir,
            'map' => $map
        ];

        $car = CarFactor::build('Standard', $constructorParams);

        $pos = $car->getPos();

        $this->assertEquals($expectedXPos, $pos->getX());
        $this->assertEquals($expectedYPos, $pos->getY());
        $this->assertEquals($expectedDir, $pos->getDir());
    }


    /**
     * Test initialize
     */
    public function testMoves(): void
    {

        $cases = [
            'car1' => [
                'starPos' => (object)['x' => 0, 'y' => 0, 'dir' => 'N'],
                'expectedEndPos' => (object)['x' => 4, 'y' => 4, 'dir' => 'E'],
                'moves' => 'FFFFFRFFRFLFF'
            ],

            'car2' => [
                'starPos' => (object)['x' => 12, 'y' => 9, 'dir' => 'E'],
                'expectedEndPos' => (object)['x' => 15, 'y' => 6, 'dir' => 'S'],
                'moves' => 'FFRFRFLFFLFFR'
            ]
        ];

        foreach ($cases as $carId => $case) {
            $constructorParams = [
                'x' => $case['starPos']->x,
                'y' => $case['starPos']->y,
                'dir' => $case['starPos']->dir,
                'map' => $this->getMap(),

            ];

            $car = CarFactor::build('Standard', $constructorParams);
            $car->doMoves($case['moves']);
            $pos = $car->getPos();

            $this->assertEquals(
                $case['expectedEndPos']->x,
                $pos->getX(),
                $carId . ', X pos'
            );

            $this->assertEquals(
                $case['expectedEndPos']->y,
                $pos->getY(),
                $carId . ', Y pos'
            );

            $this->assertEquals(
                $case['expectedEndPos']->dir,
                $pos->getDir(),
                $carId . ', direction'
            );
        }
    }

    /**
     * Get map
     */
    private function getMap(): Standard
    {
        $northCorner = 456;
        $eastCorner = 235;

        $constructorParams = [
            'northCorner' => $northCorner,
            'eastCorner' => $eastCorner,
        ];
        $map = MapFactor::build('Standard', $constructorParams);

        return $map;
    }
}
