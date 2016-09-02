<?php

/*
    include data and settings that every page needs.
*/

/*
    Creating constants for heavily used paths.
    ex. require_once(LIBRARY_PATH . "Paginator.php").
*/
define("CONTROLLERS_PATH", realpath(dirname(__FILE__) . '/controllers'). "/");
define("MODELS_PATH", realpath(dirname(__FILE__) . '/models'). "/");
define("DB_PATH", realpath(dirname(__FILE__) . '/models/db'). "/");
define("RESOURCES_PATH", realpath(dirname(__FILE__) . '/resources'). "/");
define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/view/templates'). "/");

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
