<?php
/**
 * A base class for all controller console controllers
 */

namespace Lib\Controllers;

abstract class ConsoleController
{

    /**
     * Request parameters
     *
     * @var stdObject
     */
    protected $arguments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->readArguments();
    }

    /**
     * Read request to $this->arguments
     */
    private function readArguments()
    {
        global $argv;
       
        $this->arguments = (object)
            $this->mapArguments($argv);
    }
    
    
     /**
      * Function to map the console arguments
      *
      * @param  array $argv Parameters to map
      * @return array
      */
    abstract protected function mapArguments($argv);

    
    /**
     * Action function of each console controller
     */
    abstract public function executeAction();
}
