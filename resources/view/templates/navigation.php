<?php ?>
<nav class="navigation">
    <figure class="figure navigation__logo">
    <img class="figure-img img-fluid navigation__image" src="app/img/layout/competa_logo_big.png" alt="" />
    <img class="figure-img img-fluid navigation__image" src="app/img/layout/competa_logo_small.png" alt="" />
    </figure>
    <ul class="list--reset navigation__list">
        <li class="navigation__list-item">
            <div class="navigation__link__container is-active" role="button">
                <a class="navigation__link" href="?control=<?= isset($_SESSION['user'])? "User" : "Visitor"?>&action=home">home</a>
                <span class="fa fa-home" role="button"></span>
            </div>
        </li>
        <li class="navigation__list-item">
            <div class="navigation__link__container" role="button">
                <a class="navigation__link" href="?control=<?= isset($_SESSION['user'])? "User" : "Visitor"?>&action=employees">employees</a>
                <span class="fa fa-users" role="button"></span>
            </div>
        </li>
        <li class="navigation__list-item">
          <div class="navigation__link__container" role="button">
            <a class="navigation__link navigation__link" href="?control=<?= isset($_SESSION['user'])? "User" : "Visitor"?>&action=<?= isset($_SESSION['user'])? "logout" : "login"?>"><?= isset($_SESSION['user'])? "log out" : "log in"?></a>
            <span class="fa fa-sign-in" role="button"></span>
          </div>
        </li>
    </ul>
</nav>
