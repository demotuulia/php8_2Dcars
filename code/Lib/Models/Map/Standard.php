<?php
/**
 * A class for a standard map
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models\Map;

use Lib\Models\Interfaces\Map as MapInterface;
use Lib\Models\Map;
use Lib\Models\CarPosition;

class Standard extends Map implements MapInterface
{

    public function __construct(array $params)
    {
        parent::__construct($params);
    }


    /**
     * @inheritdoc
     */
    public function moveForward(float $distance, CarPosition &$pos)
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
