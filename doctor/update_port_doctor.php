<?php
ob_start();
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}

include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');
$id_doctor = $_SESSION['id_do'];
?>

<?php



if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $yes_no = $_POST['yes_no'];
  $descount = $_POST['descount'];
  $base_price = $_POST['base_price'];
  $return_price = $_POST['return_price'];
    $sql ="UPDATE `desc_doctor` SET adrress='$address',phone='$phone',age='$age',
    base_price='$base_price',return_price='$return_price' ,descount='$descount' ,yes_no='$yes_no' WHERE id_doctor = $id_doctor";
    $con->query($sql);
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
$sqlw = "SELECT * FROM desc_doctor WHERE id_doctor = '$id_doctor'";
$resultw =  $con->query($sqlw);
$rowsx = $resultw->fetch_assoc();
?>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="mb-3 mt-3">
    <label for="address" class="form-label">address :</label>
    <input type="address" value="<?=$rowsx['adrress'] ?>" class="form-control" id="address" placeholder="Enter address" name="address">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone :</label>
    <input type="text" value="<?=$rowsx['phone'] ?>" class="form-control" id="phone" placeholder="Enter phone" name="phone">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">age :</label>
    <input type="text" value="<?=$rowsx['age'] ?>" class="form-control" id="age" placeholder="Enter age" name="age">
  </div>
  <div class="mb-3">
    <label for="base_price" class="form-label"> : سعر الكشف</label>
    <input type="number" value="<?=$rowsx['base_price'] ?>" class="form-control" id="base_price" placeholder="Enter price" name="base_price">
  </div>
  <div class="mb-3">
    <label for="return_price" class="form-label"> : سعر الاعادة</label>
    <input type="number" value="<?=$rowsx['return_price'] ?>" class="form-control" id="return_price" placeholder="Enter price" name="return_price">
  </div>
  <div class="mb-3">
    <label for="return_price" class="form-label"> : خصم علي الكشف</label>
    <input type="number" value="<?=$rowsx['descount'] ?>" class="form-control" id="return_price" placeholder="Enter price" name="descount">
  </div>
  <div class="mb-3 mt-3">
    <label for="ststus" class="form-label">تفعيل الخصم :</label>
    <select name="yes_no" required id="ststus" class="form-control">

      <option value="2" 
      <?php
      $x = 2;
        if ($x == $rowsx['yes_no']) {
          echo "selected";
        }
      ?>
      >لا</option>
      <option value="1" 
      <?php
      $x = 1;
        if ($x == $rowsx['yes_no']) {
          echo "selected";
        }
      ?>
      >نعم</option>
    </select>
  </div>


  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 
<!-- <br> -->
              </div>
              </div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

  <!-- /.content-wrapper -->
  <?php
include('inc/desin/footer.php');
ob_end_flush();
?>