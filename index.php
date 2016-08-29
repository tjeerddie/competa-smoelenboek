<?php
    require_once("resources/config.php");

    if (isset($_GET['control']) && isset($_GET['action'])) {
        $control = filter_input(INPUT_GET,'control', FILTER_SANITIZE_STRING);
        $action     = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
    } else {
        $control = 'Visitor';
        $action     = 'home';
    }

    function call($control, $action) {
        // require the file that matches the controller name
        require_once('resources/controllers/' . $control . '.php');

        //makes the controller
        $control = new $control();

        // call the action
        $control->{ $action }();
    }

    // list of allowed controllers with corresponding actions.
    $controllers = array('Visitor' => ['home', 'error'], 'User' => ['home', 'error']);

    // check that the requested controller and action are both allowed
    if (array_key_exists($control, $controllers)) {
        if (in_array($action, $controllers[$control])) {
            call($control, $action);
        } else {
            require_once(TEMPLATES_PATH . 'error.php');
        }
    } else {
        require_once(TEMPLATES_PATH . 'error.php');
    }
?>
