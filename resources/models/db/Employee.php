<?php
    class Employee {
        private $id;
        private $first_name;
        private $middle_name;
        private $last_name;
        private $email;
        private $phone_number;
        private $photo;
        private $description;
        private $address;
        private $City;
        private $group_id;
        private $category_id;

        public function __construct () {
            $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
            $this->group_id = filter_var($this->group_id,FILTER_VALIDATE_INT);
            $this->category_id = filter_var($this->category_id,FILTER_VALIDATE_INT);
        }

        public function getId () {
            return $this->id;
        }

        public function getFirstName () {
            return $this->first_name;
        }

        public function getMiddleName () {
            return $this->middle_name;
        }

        public function getLastName () {
            return $this->last_name;
        }

        public function getFullName () {
            return $this->first_name ." " . $this->middle_name . " " . $this->last_name;
        }

        public function getEmail () {
            return $this->email;
        }

        public function getPhoneNumber () {
            return $this->phone_number;
        }

        public function getPhoto () {
            return $this->photo;
        }

        public function getDescription () {
            return $this->description;
        }

        public function getAddress () {
            return $this->address;
        }

        public function getCity () {
            return $this->City;
        }

        public function getGroupId () {
            return $this->group_id;
        }

        public function getCategoryId () {
            return $this->category_id;
        }
    }
?>
