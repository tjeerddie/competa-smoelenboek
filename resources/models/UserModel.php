<?php
    require_once(MODELS_PATH . 'Model.php');

    class UserModel extends model {

        public function __construct () {
            parent::__construct();
        }

        public function getUser(){
            return $_SESSION['user'];
        }

        public function addEmployee() {
          $values =[];
          //required values ophalen uit posts
          $values['first_name'] = filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING);
          $values['last_name']=filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING);
          $values['email']=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
          $values['phone_number']=filter_input(INPUT_POST,'phonenumber', FILTER_VALIDATE_INT);
          $values['photo']=filter_input(INPUT_POST,'photo');
          $values['group_id'] = filter_input(INPUT_POST, 'group', FILTER_VALIDATE_INT);
          $values['category_id'] =  filter_input(INPUT_POST, 'job', FILTER_VALIDATE_INT);

            // if(empty($values['first_name']) || empty($values['last_name']) || empty($values['email']) || empty($values['phone_number'])) {
            //     return "a required field has not been filled out / correctly";
            // }
            // if($values['group_id'] === false || $values['category_id'] === false)
            // {
            //     return "no group or job";
            // }
            // if($values['email']===false)
            // {
            //     return "no email";
            // }

            // $result = $this->isAfbeeldinggestuurd();
            // switch($result)
            // {
            //     case self::IMAGE_SIZE_EXCEEDED:
            //     case self::WRONG_IMAGE_TYPE:
            //         return $result;//er is iets fout gegaan stop de toevoeging
            //         break;
            //     case self::NO_IMAGE_UPLOADED:
            //         //NOTHING TO DO
            //         break;
            //     case self::IMAGE_UPLOADED_SUCCES:
            //         $foto_naam = $this->bepaalBestandsNaam();
            //         $values['foto']=$foto_naam;
            //         break;
            //
            // }

             $sql1="INSERT IGNORE INTO `employees` ( ";
             $sql2 = "VALUES ( ";
             $needles=[];
             $count = 0;
             foreach($values as $column_name=>$value)
             {
                if ($count<sizeof($values)-1)
                {
                   $count++;
                   $needles[":$column_name"] = $value;
                   $sql1 .= "`$column_name`, ";
                   $sql2 .= ":$column_name, ";
                }
                else
                {
                   $needles[":$column_name"] = $value;
                   $sql1 .= "`$column_name` ";
                   $sql2 .= ":$column_name ";
                }

             }
             $sql1 .= ') ';
             $sql2 .= " )";
             $sql = $sql1.$sql2;
             $stmnt = $this->db->prepare($sql);
             $stmnt->execute($needles);
            if($stmnt->rowCount()===1) {
                // if(!empty($foto_naam)){
                //     $this->slaAfbeeeldingOp($foto_naam);
                // }
                return "beep";
            }
            return "rip";
        }

        public function logout(){
           $_SESSION = array();
           session_destroy();
        }
    }
?>
