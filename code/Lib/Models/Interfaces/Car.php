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
     * @param array $params $northCorner, $eastCorner of the car
     */
    public function __construct(array $params);


    /**
     * Do a series of moves
     */
    public function doMoves(string $moves);

    public function doMove(string $move);
}
