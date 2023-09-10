<?php
session_start();
include('inc/conn.php');
$id_pat = $_SESSION['id_pa'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - My Profile</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="my-profile d-flex flex-column vh-100">

<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
<div class="p-3">
  <?php
  $sql = "SELECT * FROM `patient` WHERE id = $id_pat";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  ?>
<div class="bg-white rounded-4 px-3 pt-3 overflow-hidden edit-profile-back shadow mb-3">
<h6 class="pb-2">Personal Info</h6>
<div class="d-flex">
<div class="col">
<p><span class="text-muted small">Name</span><br><?=$row['name']?></p>
</div>
<div class="col">
<p><span class="text-muted small">age</span><br><?=$row['age']?></p>
</div>
</div>
<div class="d-flex">
<div class="col">
<p><span class="text-muted small">address</span><br><?=$row['address']?></p>
</div>
<div class="col">
<p><span class="text-muted small">Phone</span><br><?=$row['phone']?></p>
</div>
</div>

<a href="change-profile.php" class="link-dark">
<div class="edit-profile-icon bg-primary text-white">
<span class="mdi mdi-square-edit-outline h2 m-0 pt-3 pe-2"></span>
</div>
</a>
</div>


<div class="py-3">
<div>
<h6 class="mb-2 pb-1 px-3 fw-bold text-black">status description</h6>
<?php
$sql = "SELECT * FROM `rushta` WHERE id_patient = $id_pat";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_doc = $row['id_doctor'];
?>
<a class="link-dark">
<div class="d-flex align-items-center gap-3 bg-white border-bottom shadow-sm p-3">
<img src="../doctor/assets/dist/img/img_doctor/<?php
$sql3 = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doc";
    $result3 = $con->query($sql3);
    $row3 = $result3->fetch_assoc();
    echo $row3['photo'];
?>" alt="" class="img-fluid rounded-4 favorite-img">
<div class="small">
<h6 class="mb-1 fs-14">Dr. <?php
$sqll = "SELECT * FROM `doctor` WHERE id = $id_doc";
$resultt = $con->query($sqll);
    $roww = $resultt->fetch_assoc();
    echo $roww['name'];
?></h6>
<span class="text-primary"><?=$row['date_add']?></span>
<br>
<small class="text-muted"><?=$row['des']?></small>
</div>
</div>
</a>
<?php } ?>


</div>
</div>


</div>
<?php
include('sid.php');
?>
</div>



  <!-- <div class="py-3">

  <div>
  <h6 class="mb-2 pb-1 px-3 fw-bold text-black">Specialist</h6>

  <a href="doctor-profile.html" class="link-dark">
  <div class="d-flex align-items-center gap-3 bg-white border-bottom shadow-sm p-3">
  <img src="img/favorite/favorite-1.jpg" alt="" class="img-fluid rounded-4 favorite-img">
  <div class="small">
  <h6 class="mb-1 fs-14">Dr. Taylor Samaro</h6>
  <div class="d-flex align-items-center gap-1 small">
  <span class="mdi mdi-star text-warning"></span>
  <span class="mdi mdi-star text-warning"></span>
  <span class="mdi mdi-star text-warning"></span>
  <span class="mdi mdi-star text-warning"></span>
  <span class="mdi mdi-star text-warning"></span>
  <span class="text-warning">4.9</span>
  <span>(5,380)</span>
  </div>
  <small class="text-muted">Dentist- Cumilla Medical Collage</small>
  </div>
  </div>
  </a>
  </div>
  </div> -->




<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="c7a8d3ee8c3faf250f95ce10-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="c7a8d3ee8c3faf250f95ce10-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="c7a8d3ee8c3faf250f95ce10-text/javascript"></script>

<script src="js/script.js" type="c7a8d3ee8c3faf250f95ce10-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c7a8d3ee8c3faf250f95ce10-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c517c26077e","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
</html>