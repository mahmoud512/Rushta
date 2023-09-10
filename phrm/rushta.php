<?php
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}


include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');


$id = $_GET['id'];

?>


<style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 8px;
  padding-bottom: 8px;
  background-color: #343a40;
  color: white;
}
.content{
  direction: rtl;
  text-align: right;
}
.h4{
  margin-top: 10px;
}
.x{
  text-align: center;
  font-size: 30px;
}


</style>
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
              <li class="breadcrumb-item"><a href="#">Rushta</a></li>
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

  <h4 style="display: inline-block;">بيانات الدكتور :</h4>
<table id="customers">
  <tr>
    <th>اسم الدكتور</th>
    <th>المحمول</th>
    <th>التخصص</th>
  </tr> 
   <tr>
  <?php
  $sql2 = "SELECT * FROM `rushta` WHERE  id = $id";
  $result = $con->query($sql2);
  $row = $result->fetch_assoc();
  $id_doctor = $row['id_doctor'];
  // ------------------------------------ 
  if (isset($_POST['yes'])) {
    $on = $_POST['yes'];
    if ($on == "on"){
    $id_patient = $row['id_patient'];
    $prescription_name = $row['prescription_name'];
    $medicl_name = $row['medicl_name'];
    $num_doses = $row['num_doses'];
    $time_doses = $row['time_doses'];
    $date_add = date('Y/m/d');
    $des = $row['des'];
    $id_phar = $_SESSION['id_ph'];
    $sqll = "INSERT INTO rushta_sela(id_patient, id_rushta, id_doctor, id_phr, prescription_name, medicl_name, num_doses, time_doses, date_add, des) VALUES ('$id_patient','$id','$id_doctor','$id_phar','$prescription_name','$medicl_name','$num_doses','$time_doses','$date_add','$des')";
    $con->query($sqll);
  }
  }

    $sql = "SELECT * FROM `doctor` WHERE id =$id_doctor";
    $result0 = $con->query($sql);
    while ($ro = $result0->fetch_assoc()) {
      ?>
    <td><?=$ro['name']?></td>
    <td><?php
    $sql20 = "SELECT * FROM `desc_doctor` WHERE  id_doctor = $id_doctor";
  $result10 = $con->query($sql20);
  $row10 = $result10->fetch_assoc();
  echo $row10['phone'];
    ?></td>
    <td><?php 
    $special = $ro['special'];
    $sql20 = "SELECT * FROM `special` WHERE  id = $special";
    $result10 = $con->query($sql20);
    $row10 = $result10->fetch_assoc();
    echo $row10['name'];
    ?></td>
      <?php
    }
  ?>
  </tr>
</table>

  <h4 class="h4" style="display: inline-block;">بيانات الروشتة :</h4>
<table id="customers">
  <tr>
    <th>اسم الدواء</th>
    <th>عدد الجرعات اليومية</th>
    <th>موعد اخذ الجرعة</th>
  </tr>
  <tr>
  <?php
  $sql2 = "SELECT * FROM `rushta` WHERE  id = $id";
  $result11 = $con->query($sql2);

  $name = $row['medicl_name'];
  $name_ex = explode("$" , $name);

  $time = $row['time_doses'];
  $time_ex = explode("$" , $time);

  $num = $row['num_doses'];
  $num_ex = explode("$" , $num);

  for ($i=0; $i < count($name_ex); $i++) { 
    ?>
    <tr>
    <td><?=$name_ex[$i]?></td>
    <td><?=$num_ex[$i]?> : يوميا</td>
    <td><?=$time_ex[$i]?></td>
    </tr>
    <?php
  }

    ?>
</table>

<br>
<div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
          ملحوظات
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
        <div class="card-body" >
        <?=$row['des']?>
      </div>
      </div>
    </div>
  
  </div>
</div>
<?php
$sqql = "SELECT * FROM rushta_sela WHERE id_rushta = $id";
$result = $con->query($sqql);
$row = $result->num_rows;
if ($row > 0){
  echo '<div class="row">
  <div class="col-12 x">
  <h1>تم صرف الروشتة من قبل </h1>
  </div></div>';
}else{
  ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="row">
          <div class="col-12 x">
            <div class="icheck-primary">
              <label for="remember">
                هل تم صرف الروشيتة
              </label>
              <input type="checkbox" name="yes" class="form-check-input" id="remember">
            </div>
          </div>
          <div class="col-12 x">
          <input type="submit" value="save" class="btn btn-primary pr-4 pl-4">
          </div>
</form>
  <?php
}
?>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include('inc/desin/footer.php');
?>