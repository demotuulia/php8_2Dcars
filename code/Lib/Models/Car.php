<?php
/**
 * Base  class for all cars
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models;

use Lib\Models\Interfaces\Car as CarInterface;
use Lib\Models\CarPosition as CarPosition;
use Lib\Models\Map;
/**
 * A class for the business rules of the car
 */
    abstract class Car implements CarInterface
{

    private CarPosition $carPosition;

    private Map $map;

    protected $validMoves = [];


    /**
     * Constructor
     *
     *   $params x    (string) initial X position,
     *                      y    (string) initial Y position,
     *                      dir  (string) initial direction
     *                      map  (Lib\Models\Map) used map
     */
    public function __construct(array $params)
    {
        $this->carPosition = new CarPosition(
            $params['x'],
            $params['y'],
            $params['dir']
        );
        $this->map = $params['map'];

        $this->setValidMoves();
    }


    public function getMap(): Map
    {
        return $this->map;
    }


    public function getPos()
    {
        return $this->carPosition;
    }


    /**
     * Do a serie of moves
     *
     */
    abstract public function doMoves(string $moves);

    abstract public function doMove(string $move);

    /**
     * Set valid moves
     */
    abstract protected function setValidMoves();



    protected function isValidMove(string $move) : bool
    {
        return isset($this->validMoves[$move]);
    }

    protected function getMoveFunction($move)
    {
        return ($this->validMoves[$move]);
    }
}
