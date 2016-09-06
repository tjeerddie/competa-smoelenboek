<?php
    class View {
        private $control;
        private $action;
        private static $data;


        public function __construct () {
            if (!isset(self::$data)) {
                self::$data = array();
            }
        }

        //gives name with value to the view
        public function set($name, $value) {
            self::$data[$name] = $value;
        }

        //gets the template
        private function getTemplate () {
            return TEMPLATES_PATH . $this->control .'Pages/'.$this->action . ".php";
        }

        //shows the template
        public function show ($control, $action) {
            $this->control = $control;
            $this->action = $action;

            foreach (self::$data as $key =>$value) {
                $$key = $value;
            }
            include_once $this->getTemplate();
        }
    }
?>
