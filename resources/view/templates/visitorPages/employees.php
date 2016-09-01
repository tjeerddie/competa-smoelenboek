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
      <div class="divider__block">
        
      </div>
    </div>
    <div class="grid__row">
      <?php foreach ($employees as $employee): ?>
        <figure class="figure grid__column-xl-3 card">
          <img class="figure__image image--fluid card__image image--rounded" src="<?= $employee->getPhoto() ?>" alt="" />
          <figcaption class=" figure__caption card__block">
            <h4 class="card__title"><?= $employee->getFirstName() ?></h4>
          </figcaption>
        </figure>.
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once(TEMPLATES_PATH . 'footer.php') ?>
