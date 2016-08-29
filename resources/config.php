<?php

/*
    include data and settings that every page needs.
    ex. when databe credentials change you only change it here.
*/

$config = array(
    "db" => array(
        "Database" => array(
            "dbname" => "smoelenboek",
            "username" => "root",
            "password" => "",
            "host" => "localhost"
        ),
    ),
    "urls" => array(
        "baseUrl" => "http://example.com"
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);

/*
    Creating constants for heavily used paths.
    ex. require_once(LIBRARY_PATH . "Paginator.php").
*/
define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

define("TEMPLATES_PATH", 'resources/view/templates/');

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
