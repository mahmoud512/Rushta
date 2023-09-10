<?php
session_start();
include('inc/conn.php');
$id_pat = $_SESSION['id_pa'];
$sql = "SELECT * FROM `patient` WHERE id = $id_pat";
$result = $con->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $age = $_POST['age'];
  $sql0 = "UPDATE patient SET name='$name',phone='$phone',age='$age',address='$address' WHERE id = $id_pat";
  $con->query($sql0);
  header("location:my-profile.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/change-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:23 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - Change Profile</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="change-profile d-flex flex-column vh-100">

<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto p-3">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="mb-3">
<label for="exampleFormControlName" class="form-label mb-1">Name</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlName">
<span class="input-group-text bg-transparent rounded-0 border-0" id="firstname">
<span class="mdi mdi-account-outline mdi-18px"></span>
</span>
<input type="text" name="name" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your  name" aria-label="Type your  name" aria-describedby="firstname" value="<?=$row['name']?>">
</div>
</div>
<div>
<label for="exampleFormControlNumber" class="form-label mb-1">Phone</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlNumber">
<span class="input-group-text bg-transparent rounded-0 border-0" id="number"><span class="mdi mdi-phone-outline mdi-18px"></span>
</span>
<input type="text" name="phone" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your number" aria-label="Type your number" aria-describedby="number" value="<?=$row['phone']?>">
</div>
</div>
<div class="mb-3">
<label for="exampleFormControlName1" class="form-label mb-1">age</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlName1">
<span class="input-group-text bg-transparent rounded-0 border-0" id="firstname">
<span class="mdi mdi-account-outline mdi-18px"></span>
</span>
<input type="text" name="age" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your age" aria-label="Type your age" aria-describedby="firstname" value="<?=$row['age']?>">
</div>
</div>
<div class="mb-3">
<label for="exampleFormControlName1" class="form-label mb-1">address</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlName1">
<span class="input-group-text bg-transparent rounded-0 border-0" id="firstname">
</span>
<input type="text" name="address" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your address" aria-label="Type your address" aria-describedby="firstname" value="<?=$row['address']?>">
</div>
</div>

<div class="footer mt-auto p-3">
  <input type="submit"  class="btn btn-info btn-lg w-100 rounded-4" value="Save Change">
</div>
</form>
</div>
</div>


<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="7c8272c2b2adff893895d05d-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="7c8272c2b2adff893895d05d-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="7c8272c2b2adff893895d05d-text/javascript"></script>

<script src="js/script.js" type="7c8272c2b2adff893895d05d-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7c8272c2b2adff893895d05d-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c5d3b3211b6","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/change-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:23 GMT -->
</html>