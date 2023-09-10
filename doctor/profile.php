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
$sqld = "SELECT * FROM `desc_doctor` WHERE id_doctor = $id_doctor";
$resultd =  $con->query($sqld);
$rowd = $resultd->num_rows;
if ($rowd > 0) {
header('location:update_port_doctor.php');
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $id_doctor = $_SESSION['id_do'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $base_price = $_POST['base_price'];
  $return_price = $_POST['return_price'];
  $img_name = $_FILES['photo']['name'];
  $img_size = $_FILES['photo']['size'];
  $img_tmp = $_FILES['photo']['tmp_name'];

  $type_img = ["png" , "jpg" , "gif" , "jpeg"];
  $explode_name_img = explode(".", $img_name);
  $explode_name_img_end = end($explode_name_img);
  if (!in_array($explode_name_img_end , $type_img)) {
    $error[] = 'the type img is not incorrect';
  }
  if ($img_size > 5000000) {
    $error[] = 'the image size is large';
  }
  
  if (empty($error)) {
    $new_img_name = time() .rand(1 , 10000000) . $img_name ; 
    move_uploaded_file($img_tmp , "assets/dist/img/img_doctor/$new_img_name");
    $sql ="INSERT INTO desc_doctor( id_doctor, adrress, photo, phone, age, base_price, return_price) 
    VALUES
    ('$id_doctor','$address','$new_img_name','$phone','$age','$base_price','$return_price')";
    $con->query($sql);
    header('location:dash_doctor.php');
  }

}

// Array ( [photo] => Array ( [name] => rt.png [full_path] => rt.png [type] => image/png [tmp_name] => C:\xampp\tmp\php7AA5.tmp [error] => 0 [size] => 16151 ) ) 
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


  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="address" class="form-label">address :</label>
    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone :</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">age :</label>
    <input type="text" class="form-control" id="age" placeholder="Enter age" name="age">
  </div>
  <div class="mb-3">
    <label for="base_price" class="form-label"> : سعر الكشف</label>
    <input type="number" class="form-control" id="base_price" placeholder="Enter price" name="base_price">
  </div>
  <div class="mb-3">
    <label for="return_price" class="form-label"> : سعر الاعادة</label>
    <input type="number" class="form-control" id="return_price" placeholder="Enter price" name="return_price">
  </div>
  <div class="mb-3">
    <label for="photo" class="form-label">choose your photo :  </label>
    <?php
      if (isset($error)) {
        ?>
        <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> error !</h5>
                <?php 
                foreach ($error as  $value) {
                  echo ". ". $value . "<br>";
                }
                ?>
                </div>
        <?php
      }
    ?>
    <?php
      if (isset($error_size)) {
        ?>
        <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> error !</h5>
                <?=$error_size ?>
                </div>
        <?php
      }
    ?>
    <input type="file" class="form-control" id="photo" name="photo">
  </div>
  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 
<!-- <br> -->
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