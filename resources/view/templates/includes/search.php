<div class="sub-menu">
  <form class="sub-menu--left"  method="post" id="form">
    <?php if($control === 'User') :?>
    <a class="button button--primary sub-menu--button" href="?control=User&action=addEmployee">
      <i class="fa fa-user-plus sub-menu--icon button--search"></i>
    </a>
  <?php endif;?>
    <input class="form__control form__control--search"  type="text" name="name">
    <button class="button button--primary button--search" type="submit" name="search" role="button">
      <i class="fa fa-search"></i>
    </button>
  </form>
</div>
