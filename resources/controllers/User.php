<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class User extends Controller {
        private $model;
        private $view;

        public function __construct(){
            $this->model = $this->getModel("UserModel");
            $this->view = $this->getView();
        }

        public function home () {
            $this->view->setView("user", "home");
            $emps = $this->model->search();
            $this->view->set("employees", $this->model->getEmployees());
            $this->view->set("groups", $this->model->getGroups());
            $this->view->set("jobs", $this->model->getJobs());
            $this->view->show();
        }
    }
?>
