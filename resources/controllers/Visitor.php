<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class Visitor extends Controller {
        private $model;
        private $view;

        private $messages = [
          'Fill in your username and password.',
          'Your username or password is wrong!'
        ];

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
          $this->view->set("message", $this->messages[0]);
        } else {
            if($this->model->login()){
                header('Location: ' ."http://localhost:8080/competa-smoelenboek/?control=User&action=home");
            } else {
                $this->view->set("message", $this->messages[1]);
                $this->view->set("failedToSignIn", true);
            }
        }
            $this->view->setView("visitor", "login");
            $this->view->show();
        }
    }
?>