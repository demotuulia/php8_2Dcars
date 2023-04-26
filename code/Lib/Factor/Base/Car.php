<?php
/**
 * Interface for Car classes
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
namespace Lib\Factor\Base;

use Lib\Factor\Base as BaseFactor;

/**
 * Car factor
 */
class Car extends BaseFactor
{
    /**
     * build
     *
     * @param  string $type
     * @return \Lib\Models\Car
     */
    public static function build($type, $params)
    {
        return parent::buildBase('Car', $type, $params);
    }
}
