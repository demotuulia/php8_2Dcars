<?php
/**
 * Interface for the class car
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
namespace Lib\Models\Interfaces;

interface Car
{
    /**
     * CarInterface constructor
     *
     * @param array $params     $northCorner, $eastCorner of the car
     */
    public function __construct($params);
     
    
     /**
      * Do a serie of moves
      *
      * @param string $moves
      */
    public function doMoves($moves);
    
    
    /**
     * Do one move
     *
     * @param string $move
     */
    public function doMove($move);
}
