<?php
    require_once("resources/view/templates/header.php");

    require_once("resources/view/templates/search.php");

    if($employees !== null){
      foreach ($employees as $employee) {
        echo $employee->getFirstName();
      }
    }

    require_once("resources/view/templates/footer.php");
?>
