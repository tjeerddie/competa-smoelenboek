<?php
    abstract class Controller {
        protected $model;
        protected $view;

        protected function getModel ($model) {
            require_once('resources/models/' . $model . '.php');
            return new $model();
        }

        protected function getView () {
            require_once('resources/view/View.php');
            return new View();
        }
    }
?>
