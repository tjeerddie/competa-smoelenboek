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
            $this->view->show();
        }
    }
?>
