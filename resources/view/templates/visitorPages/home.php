<?php
    require_once("resources/view/templates/header.php");

    require_once("resources/view/templates/search.php");

    if($employees !== null){
      foreach ($employees as $employee) {
        echo $employee->getFirstName(), " ", $employee->getMiddleName(), " ", $employee->getLastName(),
        " ", $employee->getPhoneNumber(), " ", $employee->getEmail(), "<br>";
      }
    }

    require_once("resources/view/templates/footer.php");
?>
