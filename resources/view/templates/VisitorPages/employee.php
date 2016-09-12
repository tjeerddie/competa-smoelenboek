<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
    <main class="main main--employee">
        <?php require_once(INCLUDES_PATH . "hamburger.php");?>
        <div class="grid__container">
          <form method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form__group grid__row">
              <figure class="figure form__logo form__logo--photo grid__column-lg-5">
                <img class="figure__image form__image employee--image" src="app/img/content/<?= $employee->getPhoto();?>" alt="Photo of <?= $employee->getFullName();?>" />
              </figure>
              <div class="form__group grid__column-lg-7 grid__row">
                <span class="form__label grid__column-lg-4">first name</span>
                <span class="form__control form__control--no-border grid__column-lg-8"><?= $employee->getFirstName();?></span>
              </div>
              <div class="form__group grid__column-lg-7 grid__row">
                <span class="form__label grid__column-lg-4">last name</span>
                <span class="form__control form__control--no-border grid__column-lg-8"><?= $employee->getLastName();?></span>
              </div>
              <div class="form__group grid__column-lg-7 grid__row">
                <span class="form__label grid__column-lg-4">email</span>
                <span class="form__control form__control--no-border grid__column-lg-8"><?= $employee->getEmail();?></span>
              </div>
              <div class="form__group grid__column-lg-7 grid__row">
                <span class="form__label grid__column-lg-4">phone</span>
                <span class="form__control form__control--no-border grid__column-lg-8"><?= $employee->getPhoneNumber();?></span>
              </div>
              <div class="form__group grid__row form__group--lastRows grid__column-lg-5">
                <span class="form__label grid__column-lg-4" for="inputJob">job</span>
                <?php foreach ($jobs as $job) :
                    if ($employee->getCategoryId() === $job->getId()) :?>
                        <span class="form__control form__control--no-border grid__column-lg-8"><?= $job->getType();?></span>
                    <?php endif;
                endforeach;?>
              </div>
              <div class="form__group grid__column-lg-7 grid__row">
                <span class="form__label grid__column-lg-4">group</span>
                  <?php foreach ($groups as $group) :
                      if ($employee->getGroupId() === $group->getId()) :?>
                          <span class="form__control form__control--no-border grid__column-lg-8"><?= $group->getName();?></span>
                      <?php endif;
                  endforeach;?>
              </div>
              <div class="form__group grid__column-xs-12 grid__row">
                <span class="form__label grid__column-lg-2">description</span>
                <span class="form-control form__control--textarea grid__column-lg-10"><?= $employee->getDescription(); ?></span>
              </div>
            </div>
          </form>
          <p class="employee__message"><?= isset($message) ? $message : ""?></p>
        </div>
    </main>
<?php    require_once(INCLUDES_PATH . "footer.php");?>
