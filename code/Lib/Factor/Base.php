<?php
/**
 * A base class for all factor classes
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Factor;

abstract class Base
{
    /**
     * Build
     *
     * @param sting $classGroup Folder of this factory type
     * @param string $type Type class
     * @param array $constructorParams Parameters in the constructor
     * @return \Lib\Models\
     *
     * @throws Exception
     */
    public static function buildBase($classGroup, $type, $constructorParams)
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
