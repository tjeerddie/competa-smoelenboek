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
    }
?>
