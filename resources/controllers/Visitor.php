<?php
    require_once("resources/controllers/controller.php");
    class Visitor extends Controller {
        private $model;
        private $view;

        public function home () {
            $model = $this->getModel("Model");
            $view = $this->getView();

            $view->template();
        }
    }
?>
