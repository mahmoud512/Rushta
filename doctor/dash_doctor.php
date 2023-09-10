<?php
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}

include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                $date = date('Y/m/d');
                $id_doctor = $_SESSION['id_do'];
                $sql = "SELECT * FROM `revealed` WHERE id_doctor = $id_doctor and statu = 1 and  date_p='$date'";
                $result = $con->query($sql);
                 $row = $result->num_rows;
                 echo $ro = $row + 40;
                ?></h3>

                <p>اجمالي الكشوفات </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <?php
                $sql = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doctor";
                $result = $con->query($sql);
                $rowd = $result->num_rows;
                if ($rowd > 0) {
                  $rows = $result->fetch_assoc();
                $base_price = $rows['base_price'];
                $return_price = $rows['return_price'];
                echo $base_price * $ro;
                }else{
                  echo 0;
                }
                
                ?>
                <sup style="font-size: 20px">$</sup></h3>

                <p> اجمالي دخل الكشف</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                $sql = "SELECT * FROM `revealed` WHERE id_doctor = $id_doctor and statu = 2 and date_p='$date'";
                $result = $con->query($sql);
                $rowx = $result->num_rows;
                echo $rox = $rowx + 33;
                ?></h3>

                <p>اجمالي مرضي الاعادة</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
                if ($rowd > 0) {
                echo $return_price * $rox;
                }else{
                  echo 0;
                }
                ?> <sup style="font-size: 20px">$</sup></h3>

                <p>اجمالي دخل اعادة الكشف</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->

          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <?php
$sql = "SELECT * FROM `revealed` WHERE id_doctor = $id_doctor and statu = 2 and date_p = '$date'";
$resultm = $con->query($sql);
$rowxx = $resultm->num_rows;
$rowxxx =$rowxx + 33;
          ?>
                <?php
$sql = "SELECT * FROM `revealed` WHERE id_doctor = $id_doctor and statu = 1 and date_p = '$date'";
$resultk = $con->query($sql);
$rowkk = $resultk->num_rows;
$rowkkk =$rowkk +40;
          ?>

          <section class="col-lg-9 connectedSortable">
            <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
          </section>
          <section class="col-lg-3 connectedSortable">
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['كشف',   <?php echo $rowkkk ?>],
          ['اعادة', <?php echo $rowxxx ?>]
        ]);

        var options = {
          title: 'تفاصيل دخل اليوم',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
// -------------------
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);

function drawMaterial() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'دخل اليوم');
      data.addColumn('number', ' كشف '  );
      data.addColumn('number', ' اعادة ');

      data.addRows([
        [{v: [8, 0, 0], f: 'دخل اليوم'} , <?php echo $rowkkk * $base_price ?> , <?php echo $rowxxx * $return_price ?>],
      ]);

      var options = {
        title: 'دخل اليوم',
        hAxis: {
          title: 'دخل اليوم',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      materialChart.draw(data, options);
    }
    </script>

  <?php
include('inc/desin/footer.php');
?>