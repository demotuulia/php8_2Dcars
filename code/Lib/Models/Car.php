<?php
/**
 * Base  class for all cars
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models;

use Lib\Models\Interfaces\Car as CarInterface;
use Lib\Models\CarPosition as CarPosition;

/**
 * A class for the business rules of the car
 */
abstract class Car implements CarInterface
{

    /**
     * Car position
     *
     * @var Lib\Models\CarPosition
     */
    private $carPosition;

    /**
     * Direction of the car
     *
     * @var Lib\Models\Map
     */
    private $map;


    protected $validMoves = [];


    /**
     * Constructor
     *
     * @param array $params x    (string) initial X position,
     *                      y    (string) initial Y position,
     *                      dir  (string) initial direction
     *                      map  (Lib\Models\Map) used map
     */
    public function __construct($params)
    {
        $this->carPosition = new CarPosition(
            $params['x'],
            $params['y'],
            $params['dir']
        );
        $this->map = $params['map'];

        $this->setValidMoves();
    }


    /**
     * Get map
     *
     * @return Lib\Models\Map
     */
    public function getMap()
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
     * @param string $moves
     */
    abstract public function doMoves($moves);


    /**
     * Do one move
     *
     * @param string $move
     */
    abstract public function doMove($move);

    /**
     * Set valid moves
     */
    abstract protected function setValidMoves();


    /**
     * Check is move is valid
     *
     * @param string $move
     * @return boolean
     */
    protected function isValidMove($move)
    {
        return isset($this->validMoves[$move]);
    }

    protected function getMoveFunction($move)
    {
        return ($this->validMoves[$move]);
    }
}
