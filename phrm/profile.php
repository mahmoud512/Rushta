<?php
ob_start();
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}

include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');

$id_pharmacy = $_SESSION['id_ph'];
$sqld = "SELECT * FROM `pharmacy` WHERE id = $id_pharmacy";
$resultd =  $con->query($sqld);
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $name = $_POST['name'];
  $governorate = $_POST['governorate'];
  $email = $_POST['email'];
$sqlph = "UPDATE `pharmacy` SET `name`='$name',`email`='$email',`governor`='$governorate',`adrress`='$address',`phone`='$phone' 
WHERE id = $id_pharmacy";
$con->query($sqlph);
header('location:profile.php');
}
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
        <div class="col-12">

<?php
while ($row10 = $resultd->fetch_assoc()) {

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">name :</label>
    <input type="text" value="<?=$row10['name']?>" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone :</label>
    <input type="text" value="<?=$row10['phone']?>" class="form-control" id="phone" placeholder="Enter phone" name="phone">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label"> email :</label>
    <input type="email" class="form-control" value="<?=$row10['email']?>" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label"> address :</label>
    <input type="text" class="form-control" value="<?=$row10['adrress']?>" id="address" placeholder="Enter address" name="address">
  </div>

  <label for="phone" class="form-label">governorate :</label>
  <div class="input-group mb-3">
  
          <select name="governorate" class="form-control">
<?php
$sql = "SELECT * FROM governorate";

$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {

?>
            <option value="<?=$row['id']?>" <?php 
            if ($row['id'] == $row10['governor']) {
              echo "selected";
            }
            ?>><?=$row['name']?></option>
<?php
}?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 
<?php } ?>
<!-- <br> -->
              </div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
    </section>
  <!-- /.content-wrapper -->
  </div>
  <?php
include('inc/desin/footer.php');
ob_end_flush();
?>