<?php
/**
 * A base class for all factor classes
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Factor;

use Lib\Models\Interfaces\Car as CarInterface;
use Lib\Models\Interfaces\Map as MapInterface;

abstract class Base
{
    /**
     *
     * $classGroup Folder of this factory type
     * $type Type class
     * $constructorParams Parameters in the constructor
     *
     * @throws \Exception
     */
    public static function buildBase(string $classGroup, string $type, array$constructorParams)// : MapInterface
    {
        $class = 'Lib\Models\\' . $classGroup . '\\' . $type;

        if (class_exists($class)) {
            $obj = new $class($constructorParams);
            return $obj;
        } else {
            throw new \Exception("Invalid type given.");
        }
    }
}
