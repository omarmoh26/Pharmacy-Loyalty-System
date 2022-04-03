  <div class="container-fluid">
    <a class="new" href="<?php echo URLROOT . 'public'; ?>"><?php echo SITENAME; ?></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
		 <li class="nav-item dropdown">
       <div class="new2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if (isset($_SESSION['user_id'])) {
              echo $_SESSION['user_name'];
            } else {
              echo 'User';
            }
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li><a class="dropdown-item" href="../users/logout">Logout</a></li>
            <?php else : ?>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'users/login'; ?>">Login</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'users/register'; ?>">Sign Up</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
            <?php endif; ?>
          </ul>
        </li>

      </ul>
    </div>
  </div>