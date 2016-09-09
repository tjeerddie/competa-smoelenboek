<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
        <main class="main main--employee">
            <?php require_once(INCLUDES_PATH . "hamburger.php");?>
            <div class="grid__container">
              <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form__group grid__row">
                  <figure class="figure form__logo form__logo--photo grid__column-md-5">
                    <img class="figure__image form__image employee--image" src="app/img/content/default.jpg" alt="Photo" />
                    <figcaption class="figure__caption">
                      <label class="sr-only" for="inputPhoto"></label>
                      <input class="form__control--file" type="file" id="inputPhoto" name="photo" placeholder="File">
                    </figcaption>
                  </figure>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputFirstName">first name*</label>
                    <input class="form__control grid__column-md-8" type="text" id="inputFirstname" name="first_name" placeholder="First name" required autofocus>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputLastName">last name*</label>
                    <input class="form__control grid__column-md-8" type="text" id="inputLastname" name="last_name" placeholder="Last name" required>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputEmail">email*</label>
                    <input class="form__control grid__column-md-8" type="email" id="inputEmail" name="email" placeholder="E-mail" required>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="inputPhone">phone</label>
                    <input class="form__control grid__column-md-8" type="tel" id="inputPhone" name="phone_number" placeholder="Phonenumber" required>
                  </div>
                  <div class="form__group grid__column-md-5 grid__row">
                    <label class="form__label grid__column-md-4" for="inputJob">job*</label>
                    <select class="form__control grid__column-md-8" id="inputJob" name="job_id">
                      <?php foreach($jobs as $job) {
                        echo '<option value="'. $job->getId() .'" >',$job->getType(),'</option>';
                      }?>
                    </select>
                  </div>
                  <div class="form__group grid__column-md-7 grid__row">
                    <label class="form__label grid__column-md-4" for="selectGroupName">group</label>
                    <select class="form__control grid__column-md-8" id="selectGroupName" name="group_id">
                      <?php foreach ($groups as $group) {
                        echo '<option value="'. $group->getId() .'" >',$group->getName(),'</option>';
                      }?>
                    </select>
                  </div>
                  <div class="form__group grid__column-xs-12 grid__row">
                    <label class="form__label grid__column-md-2" for="inputDescription">description</label>
                    <textarea class="form-control grid__column-md-10" id="inputDescription" name="description" rows="3" placeholder="Write here your description..."></textarea>
                  </div>
                  <div class="form__group grid__row grid__column-md-6 grid__column--offset-md-3">
                    <button class="button button--primary grid__column-md-5" type="submit" name="update" role="button">add</button>
                    <button class="button button--delete grid__column-md-5" type="reset" value="Reset">reset</button>
                  </div>
                </div>
              </form>
              <p class="employee__message"><?= isset($message) ? $message : ""?></p>
            </div>
        </main>
<?php    require_once(INCLUDES_PATH . "footer.php");?>
