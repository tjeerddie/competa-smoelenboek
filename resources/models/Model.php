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
            return $employee[0];
        }

        public function getEmployees() {
            $sql = "SELECT * FROM `employees` ORDER BY last_name ASC";
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute();
            $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
            return $employees;
        }

        public function search(){
            if(isset($_POST['search']) && preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
                $name=filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
                $sql="SELECT * FROM employees WHERE first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%'";
                $stmnt = $this->db->prepare($sql);
                $stmnt->execute();
                $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
                return $employees;
            }
            return;
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

        public function changeInfo() {
        $values = [];
        $values['first_name'] = filter_input(INPUT_POST,'first_name');
        $values['last_name'] = filter_input(INPUT_POST,'last_name');
        $values['phone_number'] = filter_input(INPUT_POST,'phone_number');
        $values['address'] = filter_input(INPUT_POST,'address');
        $values['city'] = filter_input(INPUT_POST,'city');
        $group = filter_input(INPUT_POST,'group_name');
        $job = filter_input(INPUT_POST,'job');
        $values['email'] = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

        if(empty($values['first_name'])||empty($values['last_name'])||empty($values['email'])||empty($values['phone_number']))
        {
          return "Please fill in the required fields.";
        }

        if($values['email']===null)
        {
          return "Please fill in a working email field.";
        }

        $employee_id = $this->getEmployee()->getId();
        $sql = 'UPDATE `employees` SET ';

        $numberOfValues = count($values);
        $needles =[];
        $counter =0;
        foreach($values as $col_name=>$value){
            $counter++;
            if($counter!==$numberOfValues){
                $sql .= " `employees`.`$col_name` = :$col_name, ";
            }
            else{
                $sql .= " `employees`.`$col_name` = :$col_name WHERE `employees`.`id`= $employee_id; ";
            }
            $needles[":$col_name"]=$value;
        }
        $stmnt = $this->db->prepare($sql);
        $stmnt->execute($needles);
    }
    }
?>
