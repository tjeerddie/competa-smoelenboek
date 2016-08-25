<?php
    class userController {

        public function home () {
            require_once("resources/views/templates/footer.php");
        }

        public function error () {
            require_once("resources/views/templates/header.php");
            require_once("resources/views/templates/footer.php");
        }
    }
?>
