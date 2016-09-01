<?php require_once("resources/view/templates/header.php"); ?>

  <main class="main main--login">
    <div class="grid__container">
      <form class="form__sign-in" method="post" autocomplete="off">
        <figure class="figure form__logo">
          <img class="figure-img img-fluid form__image" src="app/img/layout/competa_logo_big.png" alt="Logo of Competa IT" />
        </figure>
        <label class="sr-only" for="inputUsername">Username</label>
        <input class="form__control" id="inputUsername" type="text" name="username" placeholder="Username" required autofocus>
        <label class="sr-only" for="inputPassword">Password</label>
        <input class="form__control" id="inputPassword" type="password" name="password" placeholder="Password" required>
        <!-- <div class="">
          <label for="">
            <input type="checkbox" name="checkbox" value="remember-username">
            Remember me
          </label>
        </div> -->
        <p class="form__message <?php echo ($failedToSignIn ? 'form__message--danger': ''); ?>"><?php echo $message; ?></p>
        <button class="button button--primary button--block" type="submit" name="sign-in" role="button">
          Sign in
          <i class="fa fa-sign-in button__icon"></i>
        </button>
      </form>
    </div>
  </main>

<?php require_once("resources/view/templates/footer.php"); ?>
