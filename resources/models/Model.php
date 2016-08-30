<?php
    abstract class Model {
        protected $db;
        private  $dsn = 'mysql:dbname=smoelenboek;host=127.0.0.1;charset=utf8';
        private  $user = 'root';
        private  $password = '';

        public function __construct(){
            $this->db = new \PDO($this->dsn, $this->user, $this->password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function getEmployees() {
            $sql = "SELECT * FROM `employees`";
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute();
            $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
            return $employees;
        }

        public function search(){
          if(isset($_POST['submit'])){ 
          if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])) {
            $name=$_POST['name'];
            if ($name !== 'undefined')
            {
              $sql="SELECT  ID, first_name, last_name FROM employees WHERE first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%'";
              $stmnt = $this->db->prepare($sql);
              $stmnt->execute();
              $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
              return $employees;
            }
            else{

            }

          }
          else {
            echo  "<p>Please enter a search query</p>";
          }
        }
      }

      }

?>
