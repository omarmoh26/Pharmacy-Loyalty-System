<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Admin.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
    <div class="containz">
      <?php
      
        // array("x" => 946665000000, "y" => 25, "label" => "Jan"),
        // array("x" => 978287400000, "y" => 15, "label" => "Feb"),
        // array("x" => 1009823400000, "y" => 25, "label" => "Mar"),
        // array("x" => 1041359400000, "y" => 5, "label" => "Apr"),
        // array("x" => 1072895400000, "y" => 10, "label" => "May"),
        // array("x" => 1104517800000, "y" => 54, "label" => "Jun"),
        // array("x" => 1136053800000, "y" => 20, "label" => "Jul"),
        // array("x" => 1167589800000, "y" => 20, "label" => "Aug"),
        // array("x" => 1199125800000, "y" => 20, "label" => "Sept"),
        // array("x" => 1230748200000, "y" => 20, "label" => "Oct"),
        // array("x" => 1262284200000, "y" => 20, "label" => "Nov"),
        // array("x" => 1293820200000, "y" => 20, "label" => "Dec")
      

      $dataPoints = array(
        array("y" => 500, "label" => "Sept"),
        array("y" => 750, "label" => "Oct"),
        array("y" => 850, "label" => "Nov"),
        array("y" => 700, "label" => "Dec"),
        array("y" => 650, "label" => "Jan"),
      array("y" => 800, "label" => "Feb"),
      array("y" => 1100, "label" => "Mar"),
      array("y" => 1000, "label" => "Apr"),
      array("y" => 900, "label" => "May"),
      array("y" => $this->model->getTotalSum(), "label" => "Jun"),
      array("y" => 0, "label" => "Jul"),
      array("y" => 0, "label" => "Aug")
      )
      ?>
      <script>
        window.onload = function() {

          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
              text: "Revenue by Year"
            },
            axisX: {
              valueFormatString: "DD-MMM-YYYY",
              interval: 1
            },
            axisY: {
              title: "Revenue in Egyptian pound",
              valueFormatString: "#0,,.",
              suffix: "k EGP",
            },
            data: [
              {
              type: "spline",
              markerSize: 10,
              xValueType: "dateTime",
              xValueFormatString: "MMMM",
              yValueFormatString: "#,##0 EGP",
              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
          });

          chart.render();

        }
      </script>

      <div id="chartContainer" style="height: 450px; width: 910px;"></div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>

    <div class="first cardd">
      <img class="cardd-profile-img" src="http://localhost/mvc/public/Order.jpg" alt="">
      <div class="cardd-description-bk"></div>

      <div class="cardd-description">
        <div class="fonn"><?php echo $this->model->getOrderCount() ?></div>
      </div>
      <div class="cardd-btn">
        <a href="<?php echo URLROOT; ?>pages/ViewOrders">Orders</a>
      </div>
    </div>

    <div class="sec cardd2">
      <img class="cardd-profile-img" src="http://localhost/mvc/public/emp.jpg" alt="">
      <div class="cardd-description-bk"></div>

      <div class="cardd-description">
        <div class="fonn"><?php echo $this->model->getEmpCount() ?></div>
      </div>

      <div class="cardd-btn">
        <a href="<?php echo URLROOT; ?>pages/Viewemployees">Employees</a>
      </div>
    </div>

    <div class="thrd cardd3">
      <img class="cardd-profile-img" src="http://localhost/mvc/public/prod.jpg" alt="">
      <div class="cardd-description-bk"></div>

      <div class="cardd-description">
        <div class="fonn"><?php echo $this->model->getProductsCount() ?></div>
      </div>

      <div class="cardd-btn">
        <a href="<?php echo URLROOT; ?>products/viewproducts">Products</a>
      </div>
    </div>
    <div class="thrd cardd4">
      <img class="cardd-profile-img" src="http://localhost/mvc/public/cust.jpg" alt="">
      <div class="cardd-description-bk"></div>

      <div class="cardd-description">
        <div class="fonn"><?php echo $this->model->getCustCount() ?></div>
      </div>

      <div class="cardd-btn">
        <a href="<?php echo URLROOT; ?>pages/Viewcustomers">Customers</a>
      </div>
    </div>

    <!-- <div class="frth cardd5">
      <img class="cardd-profile-img" src="http://localhost/mvc/public/stat.jpg" alt="">
      <div class="cardd-description-bk"></div>

      <div class="cardd-description">
        <div class="fonn">3213</div>
      </div>

      <div class="cardd-btn">
        <a href="#">Revenue</a>
      </div>
    </div> -->


<?php
    <<<EOT
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>