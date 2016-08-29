<?php
    require_once("model.php");
    class VisitorModel extends model {
        protected $db;
        private  $dsn = 'mysql:dbname=smoelenboek;host=127.0.0.1:8080;charset=utf8';
        private  $user = 'root';
        private  $password = '';

        public function __construct(){
            $this->db = new \PDO($this->dsn, $this->user, $this->password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        private function getPeople() {
            $sql = "SELECT * FROM `employees`";
           $stmnt = $this->db->prepare($sql);
           $stmnt->execute();
           $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Contact');
           console.log($employees);
        }
    }
?>
