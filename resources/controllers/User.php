<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class User extends Controller {

        public function __construct(){
            $this->model = $this->getModel("UserModel");
            $this->view = $this->getView();
        }

        public function home () {
            $this->view->set("employees", $this->model->getEmployees());
            $this->view->setView("visitor", "employees");
            $this->view->show();
        }
    }
?>
