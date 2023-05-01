<?php
/**
 * Interface for Map classes
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Factor\Base;

use Lib\Factor\Base as BaseFactor;
use Lib\Models\Interfaces\Map as MapInterface;


class Map extends BaseFactor
{
    /**
     * build
     *
     * $type Type class
     * $constructorParams Parameters in the constructor
     */
    public static function build(string $type,array $constructorParams): MapInterface
    {
        return parent::buildBase('Map', $type, $constructorParams);
    }
}
