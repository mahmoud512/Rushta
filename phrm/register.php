<?php
ob_start();
session_start();
include('inc/desin/conn.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $governorate = $_POST['governorate'];
  $password = $_POST['password'];
  $password_md5= md5($password);
  
  $R_password = $_POST['R_password'];
  $R_password_md5= md5($R_password);
  

  if (empty($_POST['name'])) {
    $error[] = "the name is required";
  }
  if (empty($_POST['email'])) {
    $error[] = "the email is required";
  }
  if (empty($_POST['password'])) {
    $error[] = "the password is required";
  }
  if ($password_md5 !== $R_password_md5) {
    $error[] ='the value of password is not identical';
  }

  if (empty($error)) {
    $sql1 ="INSERT INTO `pharmacy`(`name`, `email`, `pass`, `governor`)
     VALUES ('$name','$email','$password_md5','$governorate')";
    $con->query($sql1);
    header('location:index.php');
  }
}




?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RUSHTA PRO| Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a><b> RUSHTA PRO</b></a>
  </div>

  <div class="card">
    <?php 
    if (isset($error)) {
      ?>
      <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> error !</h5>
      <?php
      foreach($error as $value){
        echo "<p class='pl-3'>$value</p>";
      }
    }
    ?> 
     </div>
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="R_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="governorate" class="form-control">
<?php
$sql = "SELECT * FROM governorate";

$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {

?>
            <option value="<?=$row['id']?>"><?=$row['name']?></option>
<?php
}?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    

      <p class="ml-4">I already have a membership : <a href="index.php" class="text-center"> LOG IN</a></p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
