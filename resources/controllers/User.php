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

        public function employees () {
            $this->view->set("employees", $this->model->getEmployees());
            $this->view->setView("visitor", "employees");
            $this->view->show();
        }

        public function logout () {
            $this->model->logout();
            header('Location: ' ."http://localhost:8080/competa-smoelenboek/?control=Visitor&action=home");
        }
    }
?>
