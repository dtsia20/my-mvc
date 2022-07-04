<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?php echo URLROOT; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4"><?php echo SITENAME; ?></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo URLROOT .'/pages/about'; ?>" class="nav-link">About</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT .'/posts'; ?>" class="nav-link">Posts</a></li>
        <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Welcome <?php echo $_SESSION['user_name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo URLROOT .'/users/info'; ?>">Account Info</a>
              <a class="dropdown-item" href="<?php echo URLROOT .'/users/edit'; ?>">Change password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo URLROOT .'/users/logout'; ?>">Logout</a>
              
            </div>
          </li>
          <?php else : ?>
        <li class="nav-item"><a href="<?php echo URLROOT .'/users/register';; ?>" class="nav-link" aria-current="page">Register</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT .'/users/login'; ?>" class="nav-link">Login</a></li>
        <?php endif; ?>
      </ul>
    </header>
