<?php
  require_once("config.php");

  session_start();

  if (isset($_GET['control']) && isset($_GET['action'])) {
    $control = filter_input(INPUT_GET,'control', FILTER_SANITIZE_STRING);
    $action = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
  } else if (isset($_SESSION['user']) && property_exists($_SESSION['user'], "username") && property_exists($_SESSION['user'], "password")) {
    $control = 'User';
    $action = 'home';
  } else {
    $control = 'Visitor';
    $action = 'home';
  }

  function call($control, $action) {
    // require the file that matches the controller name
    require_once(CONTROLLERS_PATH . $control . '.php');

    //makes the controller
    $controller = new $control();

    // call the action
    $controller->{ $action }();
  }

    // list of allowed controllers with corresponding actions.
    $controllers = array('Visitor' => ['home', 'login', 'employees', 'employee','search', 'error'], 'User' => ['home', 'logout', 'employees', 'employee', 'search', 'error', 'changeInfo', 'delete']);

    // check that the requested controller and action are both allowed
  if (array_key_exists($control, $controllers) && in_array($action, $controllers[$control])) {
    if ($control === "User" && !isset($_SESSION['user'])){
      require_once(TEMPLATES_PATH . 'error.php');
    }
    else {
      call($control, $action);
    }
  } else {
    require_once(TEMPLATES_PATH . 'error.php');
  }
?>
