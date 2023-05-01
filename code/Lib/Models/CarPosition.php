<?php
/**
 * A class to hold a car position
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models;

class CarPosition
{

    private int $x;

    private int $y;

    private string $dir;

    private array $directions = ['N', 'E', 'S', 'W'];


    public function __construct(string $initialX, string $initialY, string $dir)
    {
        $this->x = $initialX;
        $this->y = $initialY;
        $this->dir = $dir;
    }


    public function getX(): int
    {
        return $this->x;
    }


    public function getY(): int
    {
        return $this->y;
    }

    public function getDir(): string
    {
        return $this->dir;
    }

    public function setX(int $x)
    {
        $this->x = $x;
    }

    public function setY(int $y)
    {
        $this->y = $y;
    }


    public function setDir(string $dir)
    {
        $this->dir = $dir;
    }


    public function turn(string $dir)
    {
        $index = array_search($this->dir, $this->directions);
        $index = $dir == 'R' ? $index + 1 : $index - 1;

        // case we have turned to left in north
        if ($index < 0) {
            $index = count($this->directions) - 1;
        }

        if ($index > count($this->directions) - 1) {
            $index = 0;
        }

        $newDir = $this->directions[$index];
        $this->setDir($newDir);
    }
}
