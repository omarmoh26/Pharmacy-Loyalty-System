<?php
if (isset($_SESSION['user_id'])) {
?>

  <div class="namee">
    <div class="dropdown">
      <a  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION['user_name']; ?>
        <span class="fa-stack">
          <i class="fa fa-square fa-stack-2x"></i>
          <i class="fa fa-user fa-stack-1x fa-inverse"></i>
        </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../users/logout">Logout</a></li>
      </div>
    </div>
  </div>
  <h1 class="sitename"><?php echo SITENAME; ?></h1>

<?php
} else {
?>

<?php
}
?>