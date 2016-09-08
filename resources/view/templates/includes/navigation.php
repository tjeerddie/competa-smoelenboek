<nav class="navigation is-open">
  <figure class="figure navigation__logo">
    <img class="figure__image image--fluid navigation__image" src="app/img/layout/competa_logo_name_large.png" alt="A large Competa logo" />
    <img class="figure__image image--fluid navigation__image" src="app/img/layout/competa_logo_small.png" alt="A small Competa logo" />
  </figure>
  <ul class="navigation__list-item list--reset">
    <li class="navigation__list-item" role="button">
      <a class="navigation__link" href="?control=<?= $control?>&action=home">
        <div class="navigation__link__wrapper is-active">
          <p class="navigation__link__title">home</p>
          <span class="fa fa-home navigation__link__icon" role="button"></span>
        </div>
      </a>
    </li>
    <li class="navigation__list-item">
      <a class="navigation__link" href="?control=<?= $control?>&action=employees">
        <div class="navigation__link__wrapper">
          <p class="navigation__link__title">employees</p>
          <span class="fa fa-users navigation__link__icon" role="button"></span>
        </div>
      </a>
    </li>
    <li class="navigation__list-item">
      <a class="navigation__link" href="?control=<?= $control?>&action=<?= $control==="User"? "logout" : "login"?>">
        <div class="navigation__link__wrapper">
          <p class="navigation__link__title"><?= !isset($_SESSION['user'])? "Sign in" : "Sign out"?></p>
          <span class="fa fa-sign-<?= $control==="User"? "out" : "in"?> navigation__link__icon" role="button"></span>
        </div>
      </a>
    </li>
  </ul>
</nav>
