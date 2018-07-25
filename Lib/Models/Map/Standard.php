<?php
/**
 * A class for a standard map
 *
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
namespace Lib\Models\Map;

use Lib\Models\Map;

class Standard extends Map
{
    
    /**
     * Constructor
     *
     * @param array $params     $northCorner, $eastCorner of the map
     */
    public function __construct($params)
    {
        parent::__construct($params);
    }
    
    
      /**
      * Move forward
      *
      * @param float $distance
      * @param stdClass $pos
      */
    public function moveForward($distance, &$pos)
    {
        switch ($pos->getDir()) {
            case 'N':
                $pos->setY($pos->getY() + $distance);
                break;
            
            case 'S':
                $pos->setY($pos->getY() - $distance);
                break;
            
            case 'E':
                $pos->setX($pos->getX() + $distance);
                break;
            
            case 'W':
                $pos->setX($pos->getX() - $distance);
                break;
        }
    }
}
