<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Admin.css">
</head>
<?php
class Admin extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $action = URLROOT . 'pages/Admin';

    $text = <<<EOT
    <form action="$action" method="post">
    EOT
?>
    <!-- <a class="wrapper2" href="<?php echo URLROOT . 'users/Viewusers'; ?>">users Mangement</a>
    <a class="wrapper3" href="<?php echo URLROOT . 'pages/Editaccount'; ?>">Account</a>
    <a class="wrapper4" href="<?php echo URLROOT . 'pages/products'; ?>">products Mangement</a> -->
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3>Saraya Care</h3>
        </div>

        <ul class="list-unstyled components">

          <li>
            <a href="<?php echo URLROOT . 'users/Viewusers'; ?>">users Mangement</a>
          </li>

          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">

              <li>
                <a href="#">Page 1</a>
              </li>

              <li>
                <a href="#">Page 2</a>
              </li>

              <li>
                <a href="#">Page 3</a>
              </li>
            </ul>

          </li>

          <li>
            <a href="<?php echo URLROOT . 'pages/products'; ?>">products Mangement</a>
          </li>

          <li>
            <a href="<?php echo URLROOT . 'pages/Editaccount'; ?>">Account</a>
          </li>
        </ul>


      </nav>

      <!-- Page Content  -->
      <div id="content">

          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-bars"></i>
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
    <<<EOT
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
  ?>