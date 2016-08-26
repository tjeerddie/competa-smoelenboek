<?php
    require_once("resources/controllers/Controller.php");
    class Visitor extends Controller {
        private $model;
        private $view;

        public function __construct(){
            $this->model = $this->getModel("Model");
            $this->view = $this->getView();
        }

        public function home () {
            $this->view->setView("visitor", "home");
            $this->view->show();
        }
    }
?>
