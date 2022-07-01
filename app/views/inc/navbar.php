<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?php echo URLROOT; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4"><?php echo SITENAME; ?></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT .'/pages/about'; ?>" class="nav-link">About</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT .'/users/register';; ?>" class="nav-link" aria-current="page">Register</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT .'/users/login'; ?>" class="nav-link">Login</a></li>
      </ul>
    </header>