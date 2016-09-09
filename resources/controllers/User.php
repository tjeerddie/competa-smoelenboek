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
          if(isset($_GET['name'])){
            if($_GET['name'] !== ""){
              $employees = $this->model->search();
              $this->view->set("employees", $employees);
              echo require_once(INCLUDES_PATH . 'employees.php');
              return;
            } else {
              $this->view->set("employees", $this->model->getEmployees());
              echo require_once(INCLUDES_PATH . 'employees.php');
              return;
            }
          } else {
            $this->view->set("employees", $this->model->getEmployees());
          }
          $this->view->show("Visitor", "employees");
        }

        public function search () {
          if(isset($_GET['name'])){
            $employees = $this->model->search();
            $this->view->set("employees", $employees);
            require_once(INCLUDES_PATH . 'employees.php');
            return;
          }
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
