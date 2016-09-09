<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
        <main class="main main--employee">
            <?php require_once(INCLUDES_PATH . "hamburger.php");?>
            <div class="grid__container">
              <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form__group grid__row">
                  <figure class="figure form__logo form__logo--photo grid__column-md-5">
                    <img class="figure__image form__image employee--image" src="app/img/content/<?= $employee->getPhoto();?>" alt="Photo of <?= $employee->getFullName();?>" />
                    <figcaption class="figure__caption">
                      <label class="sr-only" for="inputPhoto"></label>
                      <input class="form__control--file" type="file" id="inputPhoto" name="photo" placeholder="File">
                    </figcaption>
                  </figure>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputFirstName">first name*</label>
                    <input class="form__control grid__column-md-8" type="text" id="inputFirstName" name="first_name" value="<?= $employee->getFirstName();?>" placeholder="First name" required autofocus>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputLastName">last name*</label>
                    <input class="form__control grid__column-md-8" type="text" id="inputLastName" name="last_name" value="<?= $employee->getLastName();?>" placeholder="Last name" required>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputEmail">email*</label>
                    <input class="form__control grid__column-md-8" type="email" id="inputEmail" name="email" value="<?= $employee->getEmail();?>" placeholder="Email" required>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputPhone">phone</label>
                    <input class="form__control grid__column-md-8" type="tel" id="inputPhone" name="phone_number" value="<?= $employee->getPhoneNumber();?>" placeholder="Phone number">
                  </div>
                  <div class="form__group grid__column-md-5 grid__row">
                    <label class="form__label grid__column-md-4" for="inputJob">job*</label>
                    <?php foreach ($jobs as $job) :
                      if ($employee->getCategoryId() === $job->getId()) :?>
                        <select class="form__control grid__column-md-8" id="inputJob" name="job_id">
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
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="selectGroupName">group</label>
                    <?php foreach ($groups as $group) :
                      if ($employee->getGroupId() === $group->getId()) :?>
                        <select class="form__control grid__column-md-8" id="selectGroupName" name="group_id" value="<?= $group->getName();?>">
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
                  </div>
                  <div class="form__group grid__column-xs-12 grid__row">
                    <label class="form__label grid__column-md-2" for="inputDescription">description</label>
                    <textarea class="form-control grid__column-md-10" id="inputDescription" name="description" rows="3" value="<?= $employee->getDescription();?>" placeholder="Write here your description..."><?= $employee->getDescription(); ?></textarea>
                  </div>
                  <div class="form__group grid__row grid__column-md-6 grid__column--offset-md-3">
                    <button class="button button--primary grid__column-md-5" type="submit" name="update" role="button">update</button>
                    <button class="button button--delete grid__column-md-5" type="reset" value="Reset">reset</button>
                  </div>
                </div>
              </form>
              <p class="employee__message"><?= isset($message) ? $message : ""?></p>
            </div>
        </main>
<?php    require_once(INCLUDES_PATH . "footer.php");?>
