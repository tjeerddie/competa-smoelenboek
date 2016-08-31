<?php
    class UserInfo {
        private $id;
        private $username;
        private $password;
        private $email;
        private $permissions;

        public function __construct () {
            $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
        }

        public function getId () {
            return $this->id;
        }

        public function getUserName () {
            return $this->username;
        }

        public function getHash () {
            return $this->password;
        }
    }
?>
