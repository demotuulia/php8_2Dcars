<?php
/**
 * This is  a model for a standard car. Later there can be other type cars,
 * like electric car.
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models\Car;

use Lib\Models\Car;

class Standard extends Car
{
    /**
     * Constructor
     *
     * @param array $params $x, $y, $dir  of the car
     */
    public function __construct($params)
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


    /**
     * Do a serie of moves
     *
     * @param string $moves
     */
    public function doMoves($moves)
    {
        if (!$moves) {
            return;
        }

        foreach (str_split($moves) as $move) {
            $this->doMove($move);
        }
    }


    /**
     * Do one move
     *
     * @param string $move
     * @throws Exception
     */
    public function doMove($move)
    {
        if (!$this->isValidMove($move)) {
            throw new \Exception("Illegal move.");
        }

        $function = $this->getMoveFunction($move);
        $this->$function();
        //$position = $this->getPos();
        //echo ("\n $move : " . $position->getX() . ' , ' . $position->getY() . ' , ' . $position->getDir() );
    }


    /**
     * Move car forward
     */
    private function forward()
    {
        $position = $this->getPos();

        $this->getMap()->moveForward(1, $position);
    }


    /**
     * Turn right
     */
    private function turnRight()
    {
        $this->getPos()->turn('R');
    }


    /**
     * Turn left
     */
    private function turnLeft()
    {
        $this->getPos()->turn('L');
    }


    /**
     * Check is move is valid
     *
     * @param string $move
     * @return boolean
     */
    protected function isValidMove($move)
    {
        return parent::isValidMove($move);
    }
}
