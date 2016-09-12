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
    <div class="grid__row">
      <?php require_once(INCLUDES_PATH . 'employees.php') ?>
    </div>
  </div>
</main>
<?php require_once(INCLUDES_PATH . 'footer.php') ?>
