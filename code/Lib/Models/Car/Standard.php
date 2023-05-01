<?php
/**
 * This is  a model for a standard car. Later there can be other type cars,
 * like electric car.
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models\Car;

use Lib\Models\Car;
use Lib\Models\Interfaces\Car as CarInterface;

class Standard extends Car implements CarInterface
{

    public function __construct(array $params)
    {
        parent::__construct($params);
    }


    /**
     * Set valid moves and the functions to call
     */
    protected function setValidMoves()
    {
        $this->validMoves = [
            'F' => 'forward',
            'R' => 'turnRight',
            'L' => 'turnLeft'
        ];
    }


    public function doMoves(string $moves)
    {
        if (!$moves) {
            return;
        }

        foreach (str_split($moves) as $move) {
            $this->doMove($move);
        }
    }


    /**
     * @throws \Exception
     */
    public function doMove(string $move)
    {
        if (!$this->isValidMove($move)) {
            throw new \Exception("Illegal move.");
        }

        $function = $this->getMoveFunction($move);
        $this->$function();
        //$position = $this->getPos();
        //echo ("\n $move : " . $position->getX() . ' , ' . $position->getY() . ' , ' . $position->getDir() );
    }


    private function forward()
    {
        $position = $this->getPos();

        $this->getMap()->moveForward(1, $position);
    }


    private function turnRight()
    {
        $this->getPos()->turn('R');
    }


    private function turnLeft()
    {
        $this->getPos()->turn('L');
    }



    protected function isValidMove(string $move): bool
    {
        return parent::isValidMove($move);
    }
}
