<?php require_once(INCLUDES_PATH . "header.php"); ?>

  <main class="main main--addEmloyee">
    <div class="grid__container">
      <form class="form__add" method="post" autocomplete="off">
        <label class="sr=only" for="inputFirstname">First Name</label>
        <input class="form__control" id="inputFirstname" name="firstname" placeholder="First name" required autofocus>
        <label class="sr=only" for="inputMiddlename">Middle Name</label>
        <input class="form__control" id="inputMiddlename" name="middlename" placeholder="Middle name">
        <label class="sr=only" for="inputLastname">Last Name</label>
        <input class="form__control" id="inputLastname" name="lastname" placeholder="Last name" required>
        <label class="sr=only" for="inputEmail">email</label>
        <input class="form__control" id="inputEmaile" name="email" placeholder="E-mail" required>
        <label class="sr=only" for="inputPhoneNumber">Phone numbere</label>
        <input class="form__control" id="inputPhoneNumber" name="phone_number" placeholder="Phonenumber" required>
        <label class="sr=only" for="inputPhoto">Photo</label>
        <input type="file" id="inputPhoto" name="photo"  accept='image/*'>
        <label class="sr=only" for="inputDescription">Description</label>
        <input class="form__control" id="inputDescription" name="description" placeholder="Description">
        <label class="sr=only" for="inputAddress">Address</label>
        <input class="form__control" id="inputAddress" name="address" placeholder="Address" required>
        <label class="sr=only" for="inputCity">City</label>
        <input class="form__control" id="inputCity" name="city" placeholder="City" required>
        <label class="sr=only" for="inputGroupId">Group_Id</label>
        <input class="form__control" id="inputGroupId" name="group_id" placeholder="Group Id" required>
        <label class="sr=only" for="inputCategoryId">Category_Id</label>
        <input class="form__control" id="inputCategoryId" name="category_id" placeholder="Category Id" required>

        <p class="form__message <?php echo ($failedToSignIn ? 'form__message--danger': ''); ?>"><?php echo $message; ?></p>
        <button class="button button--primary button--block" type="submit" name="submit" role="button">
          Submit
          <i class="fa fa-sign-in button__icon"></i>
        </button>
      </form>
    </div>
  </main>

<?php require_once(INCLUDES_PATH . "footer.php"); ?>
