<?php
/**
 * A class for the business rules of the map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */


namespace Lib\Models;

use Lib\Models\Interfaces\Map as MapInterface;

abstract class Map implements MapInterface
{
    /**
     * North corner of the map
     *
     * @var integeger
     */
    private $northCorner;
    
    
    /**
     * East corner of the map
     *
     * @var integeger
     */
    private $eastCorner;
    
    
    /**
     * Constructor
     *
     * @param array $params     $northCorner, $eastCorner of the map
     */
    public function __construct($params)
    {
        $this->northCorner = $params['northCorner'];
        $this->eastCorner = $params['eastCorner'];
    }
    
    
    /**
     * Get the dimensions of the map
     *
     * @return stdClass
     */
    public function getMapDimensions()
    {
        return (object)[
            'north' => $this->northCorner,
            'east' => $this->eastCorner
        ];
    }
    
      /**
      * Move forward
      *
      * @param float $distance
      * @param stdClass $pos
      */
    abstract public function moveForward($distance, &$pos);
}
