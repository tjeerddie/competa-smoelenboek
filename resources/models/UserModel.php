<?php
    require_once(MODELS_PATH . 'Model.php');

    class UserModel extends model {

        public function __construct () {
            parent::__construct();
        }

        public function getUser(){
            return $_SESSION['user'];
        }

        public function logout(){
           $_SESSION = array();
           session_destroy();
        }

        public function changeInfo(){
          return parent::changeInfo();
        }
    }
?>
