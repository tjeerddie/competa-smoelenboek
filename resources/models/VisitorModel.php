<?php
    require_once(MODELS_PATH . 'Model.php');
    require_once(DB_PATH . 'Employee.php');

    class VisitorModel extends Model {

        public function __construct () {
            parent::__construct();
        }

        public function getEmployees () {
            return parent::getEmployees();
        }
    }
?>
