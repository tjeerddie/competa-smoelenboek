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
                </div><br>
                <p class="employee__message"><?= isset($message) ? $message : ""?></p>
                <div class="grid__row">
                    <figure class="figure grid__column-xl-3 grid__column--offset-xl-1">
                        <img class="figure__image image--fluid employee--image" src="app/img/content/<?= $employee->getPhoto();?>" alt="de photo of <?= $employee->getFullName();?>"></img>
                    </figure>
                    <div class="grid__column-xl-6">
                      <form method="post">
                        <table class="list--reset employee__list">
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">First name: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getFirstName();?>" name="first_name" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Last name: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getLastName();?>" name="last_name" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Email: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getEmail();?>" name="email" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Phone: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getPhoneNumber();?>" name="phone_number" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Group: </h5>
                                </td>
                                <td class="table__cell">
                                  <?php foreach ($groups as $group) :
                                      if ($employee->getGroupId() === $group->getId()) :?>
                                          <select class="" value="<?= $group->getName();?>" name="group_name" type="text">
                                            <?php foreach ($groups as $group) :
                                              if($employee->getGroupId() === $group->getId()) {
                                                echo '<option selected value="'. $group->getId() .'" >',$group->getName(),'</option>';
                                              }
                                              else{
                                                echo '<option value="'. $group->getId() .'" >',$group->getName(),'</option>';
                                              }
                                              endforeach;?>
                                          </select>
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
                                            <select class="" name="job" type="text">
                                              <?php foreach ($jobs as $job) :
                                                if($employee->getCategoryId() === $job->getId()) {
                                                  echo '<option selected value="'. $job->getId() .'" >',$job->getType(),'</option>';
                                                }
                                                else{
                                                  echo '<option value="'. $job->getId() .'" >',$job->getType(),'</option>';
                                                }
                                                endforeach;?>
                                            </select>
                                        <?php endif;
                                    endforeach;?>
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Description: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getDescription();?>" name="description" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">City: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getCity();?>" name="city" type="text">
                                </td>
                            </tr>
                            <tr class="employee__list-item table__row">
                                <td class="table__cell">
                                    <h5 class="employee__text">Address: </h5>
                                </td>
                                <td class="table__cell">
                                    <input class="form__control form__control--update" value="<?= $employee->getAddress();?>" name="address" type="text">
                                </td>
                            </tr>
                        </table>
                          <button class="" type="submit" name="update" role="button">update</button>
                          <button type="reset" value="Reset">reset</button>
                      </form>
                    </div>
                </div>

            </div>
        </main>


<?php    require_once(INCLUDES_PATH . "footer.php");?>
