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

        public function login () {
        if($this->model->isPostLeeg()) {
           $this->view->set("message","fill the form");
        } else {
            if($this->model->login()){
                header('Location: ' ."http://localhost:8080/competa-smoelenboek/?control=User&action=home");
                $this->view->set("message", "yes");
            } else {
                $this->view->set("message", "no");
            }
        }
            $this->view->setView("visitor", "login");
            $this->view->show();
        }
    }
?>
