<?php require_once("resources/view/templates/header.php");

    echo "Names:  ";
    foreach ($employees as $employee) {
        echo $employee->getFirstName();
        echo " ";
        echo $employee->getMiddleName();
        echo " ";
        echo $employee->getLastName();
    }
    echo "</br></br>";

    require_once("resources/view/templates/search.php");
    if($employees !== null){
      foreach ($employees as $employee) {
        echo $employee->getFirstName(), " ", $employee->getMiddleName(), " ", $employee->getLastName(),
        " ", $employee->getPhoneNumber(), " ", $employee->getEmail(), "<br>";
      }
    }

    require_once("resources/view/templates/footer.php");
?>
