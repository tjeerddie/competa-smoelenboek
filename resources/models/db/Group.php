<?php
    class Group {
      private $id;
      private $name;

      public function __construct () {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
      }

      public function getId () {
        return $this->id;
      }

      public function getName () {
        return $this->name;
      }
    }
?>
