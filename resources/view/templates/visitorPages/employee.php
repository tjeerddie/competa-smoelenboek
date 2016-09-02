<?php require_once("resources/view/templates/header.php");
    require_once("resources/view/templates/navigation.php");?>

        <main class="main">
            <div>
                <h1><?= $employee->getFullName();?></h1>
                <img src="app/img/content/<?= $employee->getPhoto();?>" alt="de photo of <?= $employee->getFullName();?>"></img>
                <p><?= "name: " . $employee->getFullName();?></p>
                <p><?="</br> email: " . $employee->getEmail();?></p>
                <p><?=  "</br> phone: " . $employee->getPhoneNumber();?></p>
                <?php foreach ($groups as $group) :
                    if ($employee->getGroupId() === $group->getId()) :?></p>
                        <p><?= "</br> group: " . $group->getName();?></p>
                    <?php endif;
                endforeach;?>
                <?php foreach ($jobs as $job) :
                    if ($employee->getCategoryId() === $job->getId()) :?>
                        <p><?= "</br> job: " . $job->getType();?></p>
                    <?php endif;
                endforeach;?>
                <p><?php echo "</br> description: " . $employee->getDescription();?></p>
            </div>
        </main>


<?php    require_once("resources/view/templates/footer.php");?>
