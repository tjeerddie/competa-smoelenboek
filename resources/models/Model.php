<?php
    require_once(DB_PATH . 'Employee.php');
    require_once(DB_PATH . 'Group.php');
    require_once(DB_PATH . 'Job.php');
    require_once(DB_PATH . 'UserInfo.php');

    abstract class Model {
        protected $db;
        private  $dsn = 'mysql:dbname=smoelenboek;host=127.0.0.1;charset=utf8';
        private  $user = 'root';
        private  $password = '';

        public function __construct(){
            $this->db = new \PDO($this->dsn, $this->user, $this->password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        function postEmpty(){
            return empty($_POST);
        }

        public function getEmployee() {
            $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM `employees` WHERE `id` = '$id'";
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute();
            $employee = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
            if ( ! isset($employee[0])) {
            }
            else{
              return $employee[0];
            }

        }

        public function getEmployees() {
            $sql = "SELECT * FROM `employees` ORDER BY last_name ASC";
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute();
            $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
            return $employees;
        }

        public function search(){
            if(preg_match("/^[  a-zA-Z]+/", $_GET['name'])){
                $name=filter_input(INPUT_GET,'name', FILTER_SANITIZE_STRING);
                $sql="SELECT * FROM employees WHERE first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%'";
                $stmnt = $this->db->prepare($sql);
                $stmnt->execute();
                $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
                return $employees;
            }
            return $this->getEmployees();
        }

        public function getGroups() {
           $sql = 'SELECT * FROM `groups` ORDER BY name ASC';
           $stmnt = $this->db->prepare($sql);
           $stmnt->execute();
           $group = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Group');
           return $group;
        }

        public function getJobs() {
           $sql = 'SELECT * FROM `job_categories` ORDER BY type ASC';
           $stmnt = $this->db->prepare($sql);
           $stmnt->execute();
           $jobs = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Job');
           return $jobs;
        }


    }
?>
