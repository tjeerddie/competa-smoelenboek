<?php require_once (INCLUDES_PATH . "header.php");
    require_once(INCLUDES_PATH . "navigation.php");?>

        <main class="main">
            <?php require_once(INCLUDES_PATH . "hamburger.php");?>
            <section class="grid__container">
              <header class="main__header">
                <h1 class="main__heading">Home</h1>
				<h4 class="main__heading">Welcome <?= $name ?></h4>
              </header>
              <div class="divider">
                <div class="divider__block divider__block--absolute divider__block--red"></div>
              </div>
              <p class="main__text">
                Welcome on the home page of Smoelenboek. <br>
                You can see how many employees there are and find more information about them. <br>
                Or login as a admin and add, edit or delete information of employees or the employee itself.
              </p>
            </section>
        </main>
<?php require_once(INCLUDES_PATH . "footer.php");?>
