<?php
    require_once(CONTROLLERS_PATH . "Controller.php");

    class User extends Controller {

        public function __construct(){
            $this->model = $this->getModel("UserModel");
            $this->view = $this->getView();
        }
        private $messages = [
          'Please fill in a valid email',
          'Please fill in the required fields'
        ];

        public function home () {
            $user = $this->model->getUser();
            $this->view->set("name", $user->getUsername());
            $this->view->set("employees", $this->model->getEmployees());
            $this->view->show("User", "home");
        }

        public function employees () {
            $this->view->set("employees", $this->model->getEmployees());
            $this->view->show("User", "employees");
        }

        public function employee () {
            if(!$this->model->postEmpty()){
              $errorCode = $this->model->changeInfo();
              $this->view->set("message", $errorCode);
            }
            $this->view->set("employee", $this->model->getEmployee());
            $this->view->set("groups", $this->model->getGroups());
            $this->view->set("jobs", $this->model->getJobs());
            $this->view->show("User", "employee");
        }

        public function addEmployee () {
          if (!$this->model->postEmpty()) {
            $message = $this->model->addEmployee();
            $this->view->set("message", $message);
          }
          $this->view->set("groups", $this->model->getGroups());
          $this->view->set("jobs", $this->model->getJobs());
          $this->view->show("User", "addEmployee");
        }

        public function delete () {
          $this->model->delete();
          $this->view->set("employees", $this->model->getEmployees());
          $this->view->show("User", "employees");
        }

        public function logout () {
            $this->model->logout();
            header('Location: ' ."http://localhost:8080/competa-smoelenboek/?control=Visitor&action=home");
        }
    }
?>
