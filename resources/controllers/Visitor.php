<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class Visitor extends Controller {

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
            $emps = $this->model->search();
            if(isset($emps)){
              $this->view->set("employees" , $emps);
            } else {
              $this->view->set("employees", $this->model->getEmployees());
            }
            $this->view->set("groups", $this->model->getGroups());
            $this->view->set("jobs", $this->model->getJobs());
            $this->view->show();
        }

        public function login () {
        if($this->model->postEmpty()) {
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

        public function employee () {
            $this->view->set("employee", $this->model->getEmployee());
            $this->view->set("groups", $this->model->getGroups());
            $this->view->set("jobs", $this->model->getJobs());
            $this->view->setView("visitor", "employee");
            $this->view->show();
        }
    }
?>
