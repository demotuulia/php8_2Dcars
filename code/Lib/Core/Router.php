<?php
/**
 * Router class
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

namespace Lib\Core;

/**
 * A class to handle the router
 */
class Router
{
    private static string $CONSOLE_CONTROLLER_PATH = '\Lib\Controllers\Console\\';

    public static function getRouting()
    {
        return (self::isCli())
            ? self::getRoutingForConsoleScript()
            : self::getRoutingForWebPage();
    }


    /**
     * Check if the current request is from a console script
     *
     * @return boolean
     */
    private static function isCli()
    {
        return (
            !isset($_SERVER['SERVER_SOFTWARE']) &&
            (
                php_sapi_name() == 'cli' ||
                (
                    is_numeric($_SERVER['argc']) &&
                    $_SERVER['argc'] > 0
                )
            )
        );
    }


    /**
     * Get routing for a console script
     *
     * @return array<string>
     */
    private static function getRoutingForConsoleScript(): array
    {
        $cliScrptNameFull = $_SERVER['SCRIPT_NAME'];
        $cliScrptNameParts = explode('/', $cliScrptNameFull);
        $cliScrptName = end($cliScrptNameParts);
        $cliScrptName = ucfirst(preg_replace('/\.php$/', '', $cliScrptName));
        $controller = self::$CONSOLE_CONTROLLER_PATH . $cliScrptName . 'Controller';

        $action = 'executeAction';

        return [
            $controller,
            $action
        ];
    }


    /**
     * Get routing for a web page
     */
    private static function getRoutingForWebPage()
    {
        // Not needed in this project
    }
}
