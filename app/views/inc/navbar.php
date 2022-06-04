<?php
if (isset($_SESSION['user_id'])) {
  if ($_SESSION['type'] == 1) {
?>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3">Saraya Care</h3>
        </div>

        <ul class="list-unstyled components">
          <li>
            <a href="<?php echo URLROOT . 'pages/Admin'; ?>">Home</a>
          </li>

          <li>
            <a href="#usersMangementSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users Mangement</a>
            <ul class="collapse list-unstyled" id="usersMangementSubmenu">

              <li>
                <a href="<?php echo URLROOT . 'pages/Viewcustomers'; ?>">View Customers</a>
              </li>

              <li>
                <a href="<?php echo URLROOT . 'pages/Viewemployees'; ?>">View Employees</a>

              </li>

              <li>
                <a href="<?php echo URLROOT . 'users/Addemployee'; ?>">Add Employee</a>
              </li>
            </ul>

          </li>

          <li>

            <a href="#productsMangementSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products Mangement</a>
            <ul class="collapse list-unstyled" id="productsMangementSubmenu">

              <li>
                <a href="<?php echo URLROOT . 'products/viewproducts'; ?>">View Products</a>
              </li>

              <li>
                <a href="<?php echo URLROOT . 'products/Addproducts'; ?>">Add Products</a>
              </li>

            </ul>

          </li>

          <li>

            <a href="#OrderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Orders </a>
            <ul class="collapse list-unstyled" id="OrderSubmenu">

              <li>
                <a href="<?php echo URLROOT . 'pages/Vieworders'; ?>">View Orders</a>
              </li>

            </ul>

          </li>

          <li>
            <a href="#AccountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Account</a>
            <ul class="collapse list-unstyled" id="AccountSubmenu">

            <li>
              <a href="<?php echo URLROOT . 'pages/Editname'; ?>">Edit Name</a>
              </li>

              <li>
                <a href="<?php echo URLROOT . 'pages/Editpassword'; ?>">Edit Password</a>
              </li>

              <li>
                <a href="<?php echo URLROOT . 'pages/Deleteaccount'; ?>">Delete</a>
              </li>
            </ul>

          </li>

        </ul>


      </nav>

      <!-- Page Content  -->
      <div id="content">
        <div class="namee">
          <div class="dropdown">
            <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i id="opentab" class="fa fa-bars"></i>
        </button>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-align-justify"></i>
        </button>

      </div>

      <script>
        $(document).ready(function() {
          $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
          });
        });
      </script>
    <?php
  }

  if ($_SESSION['type'] == 2) {
    ?>
      <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
          <div class="sidebar-header">
            <h3>Saraya Care</h3>
          </div>

          <ul class="list-unstyled components">
            <li>
              <a href="<?php echo URLROOT . 'customers/oldcust'; ?>">Home</a>
            </li>

            <li>
              <a href="#CustomersMangementSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers Mangement</a>
              <ul class="collapse list-unstyled" id="CustomersMangementSubmenu">

                <li>
                  <a href="<?php echo URLROOT . 'customers/Newcust'; ?>">Add Customer</a>
                </li>
                
              </ul>

            </li>

          </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">
          <div class="namee">
            <div class="dropdown">
              <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i id="opentab" class="fa fa-bars"></i>
          </button>

          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

        </div>

        <script>
          $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
              $('#sidebar').toggleClass('active');
            });
          });
        </script>
    <?php
  }
}
?>
