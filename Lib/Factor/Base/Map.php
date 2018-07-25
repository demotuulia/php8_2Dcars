<?php
/**
 * Interface for Map classes
 *
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
namespace Lib\Factor\Base;

use Lib\Factor\Base as BaseFactor;

/**
 * Map factor
 *
 */
class Map extends BaseFactor
{
    /**
     * build
     *
     * @param string $type             Type class
     * @param array $constructorParams Parameters in the constructor
     * @return \Lib\Models\
     */
    public static function build($type, $constructorParams)
    {
        return parent::buildBase('Map', $type, $constructorParams);
    }
}
