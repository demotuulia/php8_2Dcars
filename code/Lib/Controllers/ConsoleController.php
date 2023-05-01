<?php
/**
 * A base class for all controller console controllers
 */

namespace Lib\Controllers;

abstract class ConsoleController
{

    protected \stdClass $arguments;

    /**
     * Constructor
     */
    public function __construct(): void
    {
        $this->readArguments();
    }

    /**
     * Read request to $this->arguments
     */
    private function readArguments(): void
    {
        global $argv;

        $this->arguments = (object)
        $this->mapArguments($argv);
    }

    abstract protected function mapArguments(array $argv): array;


    /**
     * Action function of each console controller
     */
    abstract public function executeAction();
}
