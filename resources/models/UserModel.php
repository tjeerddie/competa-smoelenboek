<?php
    require_once(MODELS_PATH . 'Model.php');
    require_once(DB_PATH . 'Employee.php');

    class UserModel extends model {

        public function __construct () {
            parent::__construct();
        }

        public function getEmployees () {
            return parent::getEmployees();
        }
        
        public function search () {
            return parent::search();
        }
    }
?>
