<?php
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}
include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $phone = $_POST['phone'];
  $sql1 = "SELECT * FROM `patient` WHERE phone='$phone'";
  $result = $con->query($sql1);
  $row = $result->num_rows;
  $rows = $result->fetch_assoc(); 
  if ($row > 0) {
    $pat_id = $rows['id'];
    $id_em = $_SESSION['id_em'];
    $sqlz = "SELECT * FROM `employes` WHERE id =$id_em";
    $resultz = $con->query($sqlz);
    $rowz = $resultz->fetch_assoc();
    $id_doctor =$rowz['id_doctor'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO `medical_ex`(`patient_id`, `doctor_id`, `date`) VALUES ('$pat_id ','$id_doctor','$date')";
    $con->query($sql);
    $sccs = "b";
    
  }else{
    $nosccs= "m";
  }
}



?>

<div class="content-wrapper">
  <div class="col-sm-12">
        <!-- Content Header (Page header) -->
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ad medical</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php 
      if (isset($sccs)) {
        ?>

<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> successfully !</h5>
                  the is medical successfully.
                </div>
        <?php
      }
    ?>
        <?php 
      if (isset($nosccs)) {
        ?>
        
  <div class="alert alert-danger alert-dismissible m-5">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban "></i> error !</h5>
                  phone your patient is not successfully
                </div>
        <?php
      }
    ?>
    <!-- /.content-header -->
    <a href="patient.php"> <button class="btn btn-primary m-3  ">go to patient</button></a>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class=" p-3">
    <div class="mb-3">
      <label for="username">phone :</label>
      <input type="text" class="form-control" placeholder="Enter phone your patient" name="phone">
    </div>
    <input type="submit" class="btn btn-primary" value="send">
  </form>
  </div>
  </div>

<?php
include('inc/desin/footer.php');
?>


