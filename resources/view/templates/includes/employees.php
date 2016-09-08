<?php foreach ($employees as $employee): ?>
  <figure class="figure grid__column-xl-3 card">
    <img class="figure__image image--fluid card__image image--rounded" src="app/img/content/<?= $employee->getPhoto() ?>" alt="<?= $employee->getFullName() ?>" />
    <div class="divider__block divider__block--blue"></div>
    <figcaption class=" figure__caption card__block">
      <h4 class="card__title"><?= $employee->getfirstName() ?></h4>
      <h4 class="card__title"><?= $employee->getlastName() ?></h4>
    </figcaption>
    <a class="card__overlay" href="?control=Visitor&action=employee&id=<?= $employee->getId()?>">
      <p class="card__text">Click to see more about</p>
      <p class="card__text"><?= $employee->getfirstName() . ' ' . $employee->getlastName() ?></p>
    </a>
  </figure>
<?php endforeach; ?>
