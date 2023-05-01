<?php
/**
 * Interface for the class map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models\Interfaces;

use Lib\Models\CarPosition;

interface Map
{
    /**
     * $params $northCorner, $eastCorner of the map
     */
    public function __construct(array $params);

    public function moveForward(float $distance,  CarPosition &$pos);
}
