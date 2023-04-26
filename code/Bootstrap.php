<?php
/**
 * Bootstrap
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */

require_once __DIR__ . '/Lib/Core/Autoloader.php';
require_once __DIR__ . '/Config.php';

use Lib\Core\Router as Router;

/**
 * Routing
 */
list($controller, $action) = Router::getRouting();


/**
 *  Call action
 */
$controllerObj = new $controller();
$content = $controllerObj->$action();
