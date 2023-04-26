<?php
/**
 * A class to hold a car position
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Models;

class CarPosition
{
     /**
      * x-position
      *
      * @var integeger
      */
    private $x;
    
    
    /**
     * y-position
     *
     * @var integeger
     */
    private $y;
    
   
    /**
     * Direction of the car
     *
     * @var string
     */
    private $dir;
    

    /**
     * Directions
     *
     * @var array
     */
    private $directions = ['N', 'E' , 'S', 'W'];

    /**
     * Constructor
     *
     * @param string $x   initial X position,
     * @param string $y   initial Y position,
     * @param string $dir initial direction
     */
    public function __construct($x, $y, $dir)
    {
        $this->x = $x;
        $this->y = $y;
        $this->dir = $dir;
    }
    
    
    /**
     * Get X position
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }
    
    
     /**
      * Get Y position
      *
      * @return integer
      */
    public function getY()
    {
        return $this->y;
    }
    
    
     /**
      * Get direction
      *
      * @return string
      */
    public function getDir()
    {
        return $this->dir;
    }
    
    
     /**
      * Set X position
      *
      * @param integer
      */
    public function setX($x)
    {
        $this->x = $x;
    }
    
        
     /**
      * Set Y position
      *
      * @param integer
      */
    public function setY($y)
    {
        $this->y = $y;
    }
    
    
        
     /**
      * Set direction
      *
      * @param string
      */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }
    
    
    /**
     *
     * @param type $dir
     */
    public function turn($dir)
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
