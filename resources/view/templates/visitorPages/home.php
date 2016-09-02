<?php require_once("resources/view/templates/header.php");
    require_once("resources/view/templates/navigation.php");?>

        <main class="main">
            <header class="header">
                <button class="navigation__hamburger is-open" type="button" name="navigation-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </header>
        <?php   require_once("resources/view/templates/search.php");
            echo "Employees </br></br>";
            foreach ($employees as $employee):?>
            <a href="?control=Visitor&action=employee&id=<?php echo $employee->getId();?>">
                <?php echo "name: " . $employee->getFirstName()." ".$employee->getMiddleName()." ".$employee->getLastName();?>
            </a>
            <?php echo "</br> email: " . $employee->getEmail();
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
        endforeach;
        echo "</br></br>";
        ?>
        </main>


<?php    require_once("resources/view/templates/footer.php");?>
