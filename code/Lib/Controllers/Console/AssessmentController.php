<?php

namespace Lib\Controllers\Console;

use Lib\Factor\Base\Map as MapFactor;
use Lib\Factor\Base\Car as CarFactor;
use Lib\Models\Car;
/**
 * Controller for the script assessment.php
 */
class AssessmentController extends \Lib\Controllers\ConsoleController
{

    /**
     * Function to map the console arguments
     *
     * The program receives 5 inputs (arguments):
     * [x y] - Integer values. North-east corner position of the rectangular map
     * [x y z] - x and y are integers, z is a character. Starting position of the first car
     * [x y z] - x and y are integers, z is a character. Starting position of the second car
     * [string] - string composed by any combination of letters L, R and F defining the instructions to the first car
     * [string] - string composed by any combination of letters L, R and F defining the instructions to the second car
     *
     * Example: php Assessment.php 20 20 0 0 N 12 9 E FFFFFRFFRFLFF FFRFRFLFFLFFR
     *
     * $argv Parameters to map from console command
     */
    protected function mapArguments(array $argv): array
    {
        $retArr = [
            'mapCorner' => (object)['north' => $argv[1], 'east' => $argv[2]],
            'startPosCar1' => (object)[
                'x' => $argv[3],
                'y' => $argv[4],
                'dir' => $argv[5]
            ],
            'startPosCar2' => (object)[
                'x' => $argv[6],
                'y' => $argv[7],
                'dir' => $argv[8]
            ],
            'moveInstructionsCar1' => $argv[9],
            'moveInstructionsCar2' => $argv[10]
        ];
        return $retArr;
    }


    /**
     * Action function of each console controller
     */
    public function executeAction()
    {
        /** @var  \stdClass $arguments */
        $arguments = $this->arguments;
        /** @var \stdClass $mapCorner */
        $mapCorner = $arguments->mapCorner;
        $constructorParams = [
            'northCorner' => $mapCorner->north,
            'eastCorner' => $mapCorner->mapCorner->east,
        ];
        $map = MapFactor::build('Standard', $constructorParams);

        /** @var  \stdClass $startPosCar1 */
        $startPosCar1 = $arguments->startPosCar1;

        $constructorParams = [
            'x' => $startPosCar1->x,
            'y' => $startPosCar1->y,
            'dir' => $startPosCar1->dir,
            'map' => $map
        ];

        /** @var Car $car1 */
        $car1 = CarFactor::build('Standard', $constructorParams);
        $car1->doMoves($arguments->moveInstructionsCar1);
        $pos = $car1->getPos();
        echo("\n Car1  " .
            $pos->getX() . ',' .
            $pos->getY() . ',' .
            $pos->getDir()
        );

        $constructorParams = [
            'x' => $arguments->startPosCar2->x,
            'y' => $arguments->startPosCar2->y,
            'dir' => $arguments->startPosCar2->dir,
            'map' => $map
        ];

        $car1 = CarFactor::build('Standard', $constructorParams);
        $car1->doMoves($arguments->moveInstructionsCar1);
        $pos = $car1->getPos();
        echo("\n Car2  " .
            $pos->getX() . ',' .
            $pos->getY() . ',' .
            $pos->getDir() .
            "\n"
        );
    }
}
