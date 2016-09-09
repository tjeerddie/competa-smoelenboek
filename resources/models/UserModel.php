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
          $values['first_name'] = filter_input(INPUT_POST,'first_name', FILTER_SANITIZE_STRING);
          $values['last_name']=filter_input(INPUT_POST,'last_name', FILTER_SANITIZE_STRING);
          $values['email']=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
          $values['phone_number']=filter_input(INPUT_POST,'phone_number', FILTER_SANITIZE_STRING);
          $values['photo']=filter_input(INPUT_POST,'photo');
          $values['group_id'] = filter_input(INPUT_POST, 'group_id', FILTER_VALIDATE_INT);
          $values['category_id'] =  filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);

            if(empty($values['first_name']) || empty($values['last_name']) || empty($values['email']) || empty($values['phone_number'])) {
                return "a required field has not been filled out / correctly";
            }
            if($values['group_id'] === false || $values['category_id'] === false)
            {
                return "no group or job";
            }
            if($values['email']===false)
            {
                return "no email";
            }

            $values['photo'] = $this->sendPhoto();
            // switch($result)
            // {
            //     case "file too big":
            //       return $result;
            //       break;
            //     case "wrong image type":
            //         return $result;
            //         break;
            //     case "no image uploaded":
            //         return $result;
            //         break;
            //     case "image uploaded":
            //         $photoName = $this->makeFileName();
            //         $values['photo']=$photoName;
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
                 if(!empty($values['photo'])){
                   $this->savePhoto($values['photo']);
                   return "user added";
                 }
                return "user added without photo";
            }
            return "rip nothing added";
        }

        public function logout(){
           $_SESSION = array();
           session_destroy();
        }

      public function sendPhoto() {
        if(empty($_FILES['photo']['tmp_name'])||empty($_FILES['photo']['type'])) {
            return "no image uploaded";
        }
        if(empty($_FILES['photo']['size'])||empty($_FILES['photo']['tmp_name'])) {
            return "file too big";
        }
        $finfo = new \finfo(FILEINFO_MIME_TYPE);

        $ext = $finfo->file($_FILES['photo']['tmp_name']);
        $allowed = array(
            'image/jpeg',
            'image/png',
            'image/gif',
        );
        if(!in_array($ext, $allowed)) {
            return "wrong image type";
        }
        $photoName = $this->makeFileName();
        $values['photo']=$photoName;
        return $photoName;
      }

      private function makeFileName(){
        $foto_tmp_name = $_FILES['photo']['tmp_name'];
        $foto_name = $_FILES['photo']['name'];
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['photo']['tmp_name']);
        $allowed = array(
            'jpg'=>'image/jpeg',
            'png'=>'image/png',
            'gif'=>'image/gif',
        );
        $ext = array_search($mime,$allowed,true);
        if($ext===false){
            return false;
        }
        $time = getdate();
        $theHashedName = $foto_name.$foto_tmp_name.$time[0].$time['weekday'].".$ext";
        $teller =0;
        $photoName = md5($theHashedName).".$ext";
        while(file_exists(IMAGES_PATH . $theHashedName)){
          $theHashedName = $teller.$theHashedName;
          $photoName = md5($theHashedName).".$ext";
          $teller++;
        }
        return $photoName;
      }

      private function savePhoto($photoName){
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        return \move_uploaded_file($photo_tmp_name, IMAGES_PATH.$photoName);
      }

      private function removePhoto($name){
        if($name!=='default.jpg'&&  \file_exists(IMAGES_PATH.$name)){
          unlink(IMAGES_PATH.$name);
        }
      }

        public function delete() {
        if ($this->getEmployee() !== null) {
          $id = $this->getEmployee()->getId();
          $sql = "DELETE FROM `employees` WHERE `employees`.`id`=$id";
          $stmnt = $this->db->prepare($sql);
          $stmnt->execute();
            }
          }

        public function changeInfo() {
        $values = [];
        $values['first_name'] = filter_input(INPUT_POST,'first_name');
        $values['last_name'] = filter_input(INPUT_POST,'last_name');
        $values['phone_number'] = filter_input(INPUT_POST,'phone_number');
        $values['address'] = filter_input(INPUT_POST,'address');
        $values['city'] = filter_input(INPUT_POST,'city');
        $values['group_id'] = filter_input(INPUT_POST,'group_name', FILTER_VALIDATE_INT);
        $values['category_id'] = filter_input(INPUT_POST,'job', FILTER_VALIDATE_INT);
        $values['email'] = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

        if(empty($values['first_name'])||empty($values['last_name'])||empty($values['email'])||empty($values['phone_number']))
        {
          return "Please fill in the required fields.";
        }

        if($values['email']===null)
        {
          return "Please fill in a working email field.";
        }

        $employee_id = $this->getEmployee()->getId();
        $sql = 'UPDATE `employees` SET ';

        $numberOfValues = count($values);
        $needles =[];
        $counter =0;
        foreach($values as $col_name=>$value){
            $counter++;
            if($counter!==$numberOfValues){
                $sql .= " `employees`.`$col_name` = :$col_name, ";
            }
            else{
                $sql .= " `employees`.`$col_name` = :$col_name WHERE `employees`.`id`= $employee_id; ";
            }
            $needles[":$col_name"]=$value;
        }
        $stmnt = $this->db->prepare($sql);
        $stmnt->execute($needles);
    }
    }
?>
