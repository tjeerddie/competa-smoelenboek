<?php
    require_once(MODELS_PATH . 'Model.php');
    require_once(DB_PATH . 'Employee.php');

    class VisitorModel extends Model {


        public function __construct () {
            parent::__construct();
        }

        public function getPeople() {
            $sql = "SELECT * FROM `employees`";
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute();
            $employees = $stmnt->fetchAll(\PDO::FETCH_CLASS,'Employee');
            return $employees;
        }
    }
?>
