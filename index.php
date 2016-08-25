<?php
    require_once("resources/config.php");

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
    } else {
        $controller = 'visitor';
        $action     = 'home';
    }

    function call($controller, $action) {
        // require the file that matches the controller name
        require_once('resources/controllers/' . $controller . 'Controller.php');

        // create a new instance of the needed controller
        switch($controller) {
            case 'visitor':
                $controller = new visitorController();
                break;
            case 'user':
                $controller = new userController();
                break;
        }

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
            call('pages', 'error');
        }
    } else {
        call('pages', 'error');
    }
?>
