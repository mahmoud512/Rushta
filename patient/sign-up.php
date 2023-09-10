
<?php
include('inc/conn.php');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $pass = $_POST['pass'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  if (empty($_POST['name'])) {
    $error[] = "the name is required";
  }
  if (empty($_POST['phone'])) {
    $error[] = "the email is required";
  }
  if (empty($_POST['pass'])) {
    $error[] = "the password is required";
  }
  if (empty($_POST['age'])) {
    $error[] = "the age is required";
  }
  if (empty($_POST['address'])) {
    $error[] = "the address is required";
  }
  if (empty($error)) {
  $sql1 = "INSERT INTO patient(name, phone, pass, age, address) VALUES ('$name','$phone','$pass','$age','$address')";
  $con->query($sql1);
  header('location:sign-in.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:17 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - Sign Up</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
  
<div class="sign-in p-4">
<div class="d-flex align-items-start justify-content-between mb-4">
<div style="width: 100%; text-align: center;">
<span class="mdi mdi-account-plus-outline display-1 text-primary"></span>
<h2 class="my-3 fw-bold">Getting Started</h2>
<p class="text-muted mb-0">Create an account to Rushta pro!</p>
</div>

</div>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<div class="mb-3">
  <div class="mb-3">
  <label for="exampleFormControlName" class="form-label mb-1">Name</label>
  <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlName">
  <span class="input-group-text bg-transparent rounded-0 border-0" id="name"><span class="mdi mdi-account-circle-outline mdi-18px text-muted"></span></span>
  <input type="text" name="name" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your name" aria-label="Type your name" aria-describedby="name">
</div>
  </div>
<label for="exampleFormControlphone" class="form-label mb-1">phone</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlphone">
<span class="input-group-text bg-transparent rounded-0 border-0" id="mail"><span class="mdi mdi-phone-outline mdi-18px text-muted"></span></span>
<input type="text" name="phone" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your phone" aria-label="Type your phone" aria-describedby="mail" >
</div>
</div>
<div class="mb-3">
<label for="exampleFormControlPassword" class="form-label mb-1">Password</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlPassword">
<span class="input-group-text bg-transparent rounded-0 border-0" id="password"><span class="mdi mdi-lock-outline mdi-18px text-muted"></span></span>
<input type="password" name="pass" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your password" aria-label="Type your password" aria-describedby="password">
</div>
</div>
<div class="mb-3">
<label for="exampleFormControlage" class="form-label mb-1">age</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlage">
<span class="input-group-text bg-transparent rounded-0 border-0" id="age"><span class="mdi mdi-account-circle-outline mdi-18px text-muted"></span></span>
<input type="number" name="age" min="0" value="0" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your age" aria-label="Type your age" aria-describedby="age">
</div>
</div>
<div class="mb-3">
<label for="exampleFormaddress" class="form-label mb-1">address</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlage">
<span class="input-group-text bg-transparent rounded-0 border-0" id="age"><span class="mdi mdi-account-circle-outline mdi-18px text-muted"></span></span>
<select name="address" id="exampleFormaddress" class="form-control bg-transparent rounded-0 border-0 px-0">
  <?php
    $sql = "SELECT * FROM governorate";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
<option value="<?=$row['name']?>"><?=$row['name']?></option>
    <?php
    }
  ?>
</select>
</div>

</div>
<div>
  <input type="submit" value="Create Account" class="btn btn-info btn-lg w-100 rounded-4 mb-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomCountry" aria-controls="offcanvasBottomCountry">
  <span><?php 
    if (isset($error)) {
      ?>
      <div class="alert alert-danger alert-dismissible">
      <h5> error !</h5>
      <?php
      foreach($error as $value){
        echo "<p class='pl-3'>. $value</p>";
      }
    }
    ?> 
     </div></span>
<p class="text-muted  small">Already have an account? <a class="text-primary" href="sign-in.php">Sign In</a></p>
</div>
</form>
</div>



<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="6d8b341edaca3f19a5b0cb3c-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="6d8b341edaca3f19a5b0cb3c-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="6d8b341edaca3f19a5b0cb3c-text/javascript"></script>

<script src="js/script.js" type="6d8b341edaca3f19a5b0cb3c-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="6d8b341edaca3f19a5b0cb3c-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c216df311b6","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:30 GMT -->
</html>