<?php
    require_once("resources/config.php");

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = filter_input(INPUT_GET,'controller', FILTER_SANITIZE_STRING);
        $action     = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
    } else {
        $controller = 'visitor';
        $action     = 'home';
    }

    function call($controller, $action) {
        // require the file that matches the controller name
        require_once('resources/controllers/' . $controller . '.php');

        //makes the controller
        $controller = new $controller();

        // call the action
        $controller->{ $action }();
    }

    // list of allowed controllers with corresponding actions.
    $controllers = array('visitor' => ['home', 'error'], 'user' => ['home', 'error']);

    // check that the requested controller and action are both allowed
    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            require_once("resources/view/templates/error.php");
        }
    } else {
        require_once("resources/view/templates/error.php");
    }
?>
