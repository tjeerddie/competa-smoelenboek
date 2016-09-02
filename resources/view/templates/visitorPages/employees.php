<?php require_once(TEMPLATES_PATH . 'header.php') ?>
<?php require_once(TEMPLATES_PATH . 'navigation.php') ?>
<main class="main">
  <header class="header">
    <button class="navigation__hamburger" type="button" name="navigation-button">
        <span class="navigation__hamburger__burger">burger</span>
        <span class="navigation__hamburger__burger">burger</span>
        <span class="navigation__hamburger__burger">burger</span>
    </button>
  </header>
  <div class="grid__container">
    <header class="main__header">
      <h1 class="main__heading">employees</h1>
    </header>
    <div class="divider">
      <div class="divider__block divider__block--absolute divider__block--red"></div>
    </div>
    <?php require_once(TEMPLATES_PATH . 'search.php') ?>
    <div class="grid__row">
      <?php foreach ($employees as $employee): ?>
        <figure class="figure grid__column-xl-3 card">
          <img class="figure__image image--fluid card__image image--rounded" src="app/img/content/<?= $employee->getPhoto() ?>" alt="<?= $employee->getFullName() ?>" />
          <div class="divider__block divider__block--blue"></div>
          <figcaption class=" figure__caption card__block">
            <h4 class="card__title"><?= $employee->getfirstName() ?></h4>
            <h4 class="card__title"><?= $employee->getlastName() ?></h4>
          </figcaption>
          <a class="card__overlay" href="#">
            <p class="card__text">Click to see more about</p>
          </a>
        </figure>
      <?php endforeach; ?>
      <?php foreach ($employees as $employee): ?>
        <figure class="figure grid__column-xl-3 card">
          <img class="figure__image image--fluid card__image image--rounded" src="app/img/content/<?= $employee->getPhoto() ?>" alt="<?= $employee->getFullName() ?>" />
          <div class="divider__block divider__block--blue"></div>
          <figcaption class=" figure__caption card__block">
            <h4 class="card__title"><?= $employee->getfirstName() ?></h4>
            <h4 class="card__title"><?= $employee->getlastName() ?></h4>
          </figcaption>
          <a class="card__overlay" href="#">
            <p class="card__text">Click to see more about</p>
          </a>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once(TEMPLATES_PATH . 'footer.php') ?>
