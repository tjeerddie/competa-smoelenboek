<?php
    require_once(MODELS_PATH . 'Model.php');

    class UserModel extends model {

        public function __construct () {
            parent::__construct();
        }

        public function uitloggen(){
           $_SESSION = array();
           session_destroy();
        }
    }
?>
