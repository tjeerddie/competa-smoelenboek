<?php
  require_once("config.php");

  session_start();

  $control = 'Visitor';
  $action = 'home';
  if (isset($_GET['control']) && isset($_GET['action'])) {
    $control = filter_input(INPUT_GET,'control', FILTER_SANITIZE_STRING);
    $action = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
  }

  function call($control, $action) {
    require_once(CONTROLLERS_PATH . $control . '.php');
    $controller = new $control();
    $controller->{ $action }();
  }

    // list of allowed controllers with corresponding actions.
    $controllers = array('Visitor' => ['home', 'login', 'employees', 'employee','search', 'error'],
    'User' => ['home', 'logout', 'employees', 'employee', 'addEmployee', 'changeInfo', 'delete', 'search', 'error']);

    // check that the requested controller and action are both allowed
  if (array_key_exists($control, $controllers) && in_array($action, $controllers[$control])) {
    if ($control === "User" && !isset($_SESSION['user'])){
      call("Visitor", "home");
    }
    else if ($control === "Visitor" && isset($_SESSION['user'])) {
      call("User", "home");
    } else {
      call($control, $action);
    }
  } else {
    call("Visitor", "home");
  }
?>
