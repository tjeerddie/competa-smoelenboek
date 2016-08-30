<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class Visitor extends Controller {
        private $model;
        private $view;

        public function __construct(){
            $this->model = $this->getModel("VisitorModel");
            $this->view = $this->getView();
        }

        public function home () {
            $this->view->setView("visitor", "home");
            $this->view->show();
        }
    }
?>
