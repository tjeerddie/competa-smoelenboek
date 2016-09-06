<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
        <main class="main">
            <?php require_once(INCLUDES_PATH . "hamburger.php");?>
            <div class="grid__container employee">
                <header class="main__header">
                    <h1 class="main__heading"><?= $employee->getFullName();?></h1>
                </header>
                <div class="divider">
                    <div class="divider__block divider__block--absolute divider__block--red"></div>
                </div>
                <div class="grid__row employee__box">
                    <figure class="figure grid__column-xl-3 grid__column--offset-xl-1">
                        <img class="figure__image image--fluid employee--image" src="app/img/content/<?= $employee->getPhoto();?>" alt="de photo of <?= $employee->getFullName();?>"></img>
                    </figure>
                    <div class="grid__column-xl-6">
                        <table class="list--reset employee__list">
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Name: </h5>
                                </td>
                                <td class="table__cell">
                                    <h5 class="employee__info"> <?= $employee->getFullName();?></h5>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Email: </h5>
                                </td>
                                <td class="table__cell">
                                    <h5 class="employee__info"><?= $employee->getEmail();?></h5>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Phone: </h5>
                                </td>
                                <td class="table__cell">
                                    <h5 class="employee__info"><?= $employee->getPhoneNumber();?></h5>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Group: </h5>
                                </td>
                                <td class="table__cell">
                                    <?php foreach ($groups as $group) :
                                        if ($employee->getGroupId() === $group->getId()) :?>
                                            <h5 class="employee__info"><?= $group->getName();?></h5>
                                        <?php endif;
                                    endforeach;?>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Job: </h5>
                                </td>
                                <td class="table__cell">
                                    <?php foreach ($jobs as $job) :
                                        if ($employee->getCategoryId() === $job->getId()) :?>
                                            <h5 class="employee__info"><?= $job->getType();?></h5>
                                        <?php endif;
                                    endforeach;?>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Description: </h5>
                                </td>
                                <td class="table__cell">
                                    <h5 class="employee__info"><?= $employee->getDescription();?></h5>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </main>


<?php    require_once(INCLUDES_PATH . "footer.php");?>
