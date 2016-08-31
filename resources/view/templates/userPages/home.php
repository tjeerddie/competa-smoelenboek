<?php require_once("resources/view/templates/header.php");

    echo "Employees </br></br>";
    foreach ($employees as $employee) {
        echo "name: " . $employee->getFirstName()." ".$employee->getMiddleName()." ".$employee->getLastName();
        echo "</br> email: " . $employee->getEmail();
        echo "</br> phone: " . $employee->getPhoneNumber();
        foreach ($groups as $group) {
            if ($employee->getGroupId() === $group->getId()) {
                echo "</br> group: " . $group->getName();
            }
        }
        foreach ($jobs as $job) {
            if ($employee->getCategoryId() === $job->getId()) {
                echo "</br> job: " . $job->getType();
            }
        }
        echo "</br></br>";
    }
    require_once("resources/view/templates/footer.php");
?>
