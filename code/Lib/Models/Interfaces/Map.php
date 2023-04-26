<?php
/**
 * Interface for the class map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
namespace Lib\Models\Interfaces;

interface Map
{
    /**
     * MapInterface constructor
     *
     * @param array $params $northCorner, $eastCorner of the map
     */
    public function __construct($params);
     
     
     /**
      * Move forward
      *
      * @param float    $distance
      * @param stdClass $pos
      */
    public function moveForward($distance, &$pos);
}
