<?php
    require_once("resources/controllers/Controller.php");
    class User extends Controller {
        private $model;
        private $view;

        public function __construct(){
            $this->model = $this->getModel("Model");
            $this->view = $this->getView();
        }

        public function home () {
            $this->view->setView("user", "home");
            $this->view->show();
        }
    }
?>
