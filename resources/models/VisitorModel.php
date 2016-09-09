<?php
    require_once(MODELS_PATH . 'Model.php');

    class VisitorModel extends Model {

      public function __construct () {
        parent::__construct();
      }

      public function login () {
        if ((isset($_POST['username'])) && (!empty($_POST['username']))
        && (isset($_POST['password']))  && (!empty($_POST['password']))) {
          $username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
          $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);

          $hash = '*';
          $sql = "SELECT * FROM `users` WHERE `username` = :username";
          $stmnt = $this->db->prepare($sql);
          $stmnt->bindParam(':username', $username);
          $stmnt->execute();
          $user = $stmnt->fetchAll(\PDO::FETCH_CLASS,'UserInfo');

          if(count($user) === 1) {
            if (password_verify($password, $user[0]->getHash())) {
              $_SESSION['user']=$user[0];
              return true;
            } else {
              return false;
            }
          } else {
             return false;
          }

          //for new passwords
          // $options = [
          //     'cost' => 9,
          // ];

          // $hash = password_hash($password, PASSWORD_BCRYPT, $options);
          // echo $hash;
          // $sql = "UPDATE `users` SET `password`='$hash' WHERE `username` = '$username'";
          // $stmnt = $this->db->prepare($sql);
          // $stmnt->execute();
        }
      }
    }
?>
