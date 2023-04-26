<?php

namespace Lib\Controllers\Console;

use Lib\Factor\Base\Map as MapFactor;
use Lib\Factor\Base\Car as CarFactor;

/**
 * Controller for the the script assessment.php
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
     * @param array $argv Parameters to map
     * @return array
     */
    protected function mapArguments($argv)
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
        $constructorParams = [
            'northCorner' => $this->arguments->mapCorner->north,
            'eastCorner' => $this->arguments->mapCorner->east,
        ];
        $map = MapFactor::build('Standard', $constructorParams);


        $constructorParams = [
            'x' => $this->arguments->startPosCar1->x,
            'y' => $this->arguments->startPosCar1->y,
            'dir' => $this->arguments->startPosCar1->dir,
            'map' => $map
        ];

        $car1 = CarFactor::build('Standard', $constructorParams);
        $car1->doMoves($this->arguments->moveInstructionsCar1);
        $pos = $car1->getPos();
        echo("\n Car1  " .
            $pos->getX() . ',' .
            $pos->getY() . ',' .
            $pos->getDir()
        );

        $constructorParams = [
            'x' => $this->arguments->startPosCar2->x,
            'y' => $this->arguments->startPosCar2->y,
            'dir' => $this->arguments->startPosCar2->dir,
            'map' => $map
        ];

        $car1 = CarFactor::build('Standard', $constructorParams);
        $car1->doMoves($this->arguments->moveInstructionsCar1);
        $pos = $car1->getPos();
        echo("\n Car2  " .
            $pos->getX() . ',' .
            $pos->getY() . ',' .
            $pos->getDir() .
            "\n"
        );
    }
}
