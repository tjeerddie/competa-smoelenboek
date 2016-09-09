<?php
/*
    Creating constants for heavily used paths.
    ex. require_once(LIBRARY_PATH . "Paginator.php").
*/
define("CONTROLLERS_PATH", realpath(dirname(__FILE__) . '/resources/controllers'). "/");
define("MODELS_PATH", realpath(dirname(__FILE__) . '/resources/models'). "/");
define("DB_PATH", realpath(dirname(__FILE__) . '/resources/models/db'). "/");
define("RESOURCES_PATH", realpath(dirname(__FILE__) . '/resources'). "/");
define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/resources/view/templates'). "/");
define("INCLUDES_PATH", realpath(dirname(__FILE__) . '/resources/view/templates/includes'). "/");
define("IMAGES_PATH", realpath(dirname(__FILE__) . '/app/img/content'). "/");

/*
    include data and settings that every page needs.
*/
    require_once(DB_PATH . 'UserInfo.php');

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
