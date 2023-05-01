<?php
/**
 * A class for the business rules of the map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */


namespace Lib\Models;

use Lib\Models\Interfaces\Map as MapInterface;
use Lib\Models\CarPosition;

abstract class Map implements MapInterface
{

    private int $northCorner;

    private int $eastCorner;


    /**
     * @inheritdoc
     */
    public function __construct(array $params)
    {
        $this->northCorner = $params['northCorner'];
        $this->eastCorner = $params['eastCorner'];
    }


    public function getMapDimensions(): \stdClass
    {
        return (object)[
            'north' => $this->northCorner,
            'east' => $this->eastCorner
        ];
    }

    /**
     * Move forward
     *
     * @inheritdoc
     */
    abstract public function moveForward(float $distance, CarPosition &$pos);
}
