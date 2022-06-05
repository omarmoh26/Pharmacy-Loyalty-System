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
      $dataPoints = array(
        array("y" => 2000, "label" => "Sept"),
        array("y" => 2400, "label" => "Oct"),
        array("y" => 2600, "label" => "Nov"),
        array("y" => 2200, "label" => "Dec"),
        array("y" => 2000, "label" => "Jan"),
      array("y" => 2300, "label" => "Feb"),
      array("y" => 2400, "label" => "Mar"),
      array("y" => 2500, "label" => "Apr"),
      array("y" => 2150, "label" => "May"),
      array("y" => $this->model->getTotalSum(), "label" => "Jun")
      )
      ?>
      <script>
        window.onload = function() {

          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
              text: "Revenue to June 2022"
            },
            axisX: {
              valueFormatString: "DD-MMM-YYYY",
              interval: 1
            },
            axisY: {
              title: "Revenue in Egyptian pound",
              valueFormatString: "#,##0.##",
              suffix: "EGP",
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