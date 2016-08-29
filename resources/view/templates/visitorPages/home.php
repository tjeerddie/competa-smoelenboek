<?php
    require_once("resources/view/templates/header.php");

    echo "Names:  ";
    foreach ($employees as $employee) {
        echo $employee->getFirstName();
        echo ", ";
    }
    echo "</br></br>";

    require_once("resources/view/templates/footer.php");
?>
