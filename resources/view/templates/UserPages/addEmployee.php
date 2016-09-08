<?php require_once(INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>
        <main class="main">
            <?php require_once(INCLUDES_PATH . "hamburger.php");?>
            <div class="grid__container employee">
                <header class="main__header">
                </header>
                <div class="divider">
                    <div class="divider__block divider__block--absolute divider__block--red"></div>
                </div>
                <div class="grid__row employee__box">
                    <div class="grid__column-xl-6">
                      <?= isset($message)? $message : "no message"?>
                      <div class="form__grid--employee">
                        <form class="form__add" method="post" autocomplete="off">
                          <label class="sr=only" for="inputFirstname">First Name</label>
                          <input class="form__control" id="inputFirstname" name="first_name" placeholder="First name" required autofocus>
                          <label class="sr=only" for="inputLastname">Last Name</label>
                          <input class="form__control" id="inputLastname" name="last_name" placeholder="Last name" required>
                          <label class="sr=only" for="inputEmail">email</label>
                          <input class="form__control" id="inputEmail" name="email" placeholder="E-mail" required>
                          <label class="sr=only" for="inputPhoneNumber">Phone number</label>
                          <input class="form__control" id="inputPhoneNumber" name="phone_number" placeholder="Phonenumber" required>
                          <label class="sr=only" for="inputPhoto">Photo</label>
                          <input type="file" id="inputPhoto" name="photo"  accept='image/*'>
                          <label class="sr=only" for="inputGroupId">Group_Id</label>
                          <input class="form__control" id="inputGroupId" name="group_id" placeholder="Group Id" required>
                          <label class="sr=only" for="inputCategoryId">Category_Id</label>
                          <input class="form__control" id="inputCategoryId" name="job_id" placeholder="Category Id" required>

                          <button class="button button--primary button--block" type="submit" name="submit" role="button">
                            Submit
                            <i class="fa fa-sign-in button__icon"></i>
                          </button>
                        </form>
                      </div>

                    </div>
                </div>
            </div>
        </main>


<?php    require_once(INCLUDES_PATH . "footer.php");?>
