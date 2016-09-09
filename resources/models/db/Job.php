<?php
    class Job {
      private $id;
      private $type;

      public function __construct () {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
      }

      public function getId () {
        return $this->id;
      }

      public function getType () {
        return $this->type;
      }
    }
?>
