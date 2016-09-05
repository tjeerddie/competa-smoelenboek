<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
        <main class="main">
            <?php require_once(TEMPLATES_PATH . "hamburger.php");?>
            <div class="grid__container employee">
                <header class="main__header">
                    <h1 class="main__heading"><?= $employee->getFullName();?></h1>
                </header>
                <div class="divider">
                    <div class="divider__block divider__block--absolute divider__block--red"></div>
                </div>
                <div class="grid__row employee__box">
                    <div class="grid__column-xl-5 grid__column--offset-xl-1">
                        <figure class="figure">
                            <img class="employee--image" src="app/img/content/<?= $employee->getPhoto();?>" alt="de photo of <?= $employee->getFullName();?>"></img>
                        </figure>
                    </div>
                    <div class="grid__column-xl-5">
                        <ul class="list--reset employee__list">
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Name: <?= $employee->getFullName();?></h5>
                                    <h5 class="employee__info"></h5>
                                </div>
                            </li>
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Email: </h5>
                                    <h5 class="employee__info"><?= $employee->getEmail();?></h5>
                                </div>
                            </li>
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Phone: </h5>
                                    <h5 class="employee__info"><?= $employee->getPhoneNumber();?></h5>
                                </div>
                            </li>
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Group: </h5>
                                    <?php foreach ($groups as $group) :
                                        if ($employee->getGroupId() === $group->getId()) :?>
                                            <h5 class="employee__info"><?= $group->getName();?></h5>
                                        <?php endif;
                                    endforeach;?>
                                </div>
                            </li>
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Job: </h5>
                                    <?php foreach ($jobs as $job) :
                                        if ($employee->getCategoryId() === $job->getId()) :?>
                                            <h5 class="employee__info"><?= $job->getType();?></h5>
                                        <?php endif;
                                    endforeach;?>
                                </div>
                            </li>
                            <li class="employee__list-item">
                                <div class="employee__container">
                                    <h5 class="employee__text">Description: </h5>
                                    <h5 class="employee__info"><?= $employee->getDescription();?></h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>


<?php    require_once(INCLUDES_PATH . "footer.php");?>
