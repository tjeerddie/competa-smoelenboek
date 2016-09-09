<?php require_once(INCLUDES_PATH . 'header.php') ?>
<?php require_once(INCLUDES_PATH . 'navigation.php') ?>
<main class="main">
  <?php require_once(INCLUDES_PATH . "hamburger.php");?>
  <div class="grid__container">
    <header class="main__header">
      <h1 class="main__heading">employees</h1>
    </header>
    <div class="divider">
      <div class="divider__block divider__block--absolute divider__block--red"></div>
    </div>
    <?php require_once(INCLUDES_PATH . 'search.php') ?>
    <a class="fa fa-user-plus" href="?control=User&action=addEmployee"></a>
    <div class="grid__row">
      <?php foreach ($employees as $employee): ?>
        <figure class="figure grid__column-xl-3 grid__column-lg-3 grid__column-md-4 grid__column-sm-2 grid__column-xs-1 card">
          <img class="figure__image image--fluid card__image image--rounded" src="app/img/content/<?= $employee->getPhoto() ?>" alt="<?= $employee->getFullName() ?>" />
          <div class="divider__block divider__block--blue"></div>
          <figcaption class=" figure__caption card__block">
            <h4 class="card__title"><?= $employee->getfirstName() ?></h4>
            <h4 class="card__title"><?= $employee->getlastName() ?></h4>
          </figcaption>
          <a class="card__overlay" href="?control=User&action=employee&id=<?= $employee->getId()?>">
            <p class="card__text">Click to edit or see more about</p>
            <p class="card__text"><?= $employee->getfirstName() . ' ' . $employee->getlastName() ?></p>
          </a>
          <a class="button button--delete" href="?control=User&action=delete&id=<?= $employee->getId()?>" type="submit" name="delete" role="button">
            <i class="fa fa-user-times"></i>
          </a>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once(INCLUDES_PATH . 'footer.php') ?>
