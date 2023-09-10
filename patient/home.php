<?php
session_start();
include('inc/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:31 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - Home</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/slick/slick/slick.css" />
<link rel="stylesheet" href="vender/slick/slick/slick-theme.css" />

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="home d-flex flex-column vh-100">
<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
<div class="p-3 mb-2">
<div class="row row-cols-4 g-2">
<div class="col">
<div class="bg-white text-center rounded-4 p-2 shadow-sm">
<a href="all_doctor.php" class="link-dark">
<img src="img/home/doctor.png" alt="" class="img-fluid px-2">
<p class="text-truncate small pt-2 m-0">Doctor</p>
</a>
</div>
</div>
<div class="col">
<div class="bg-white text-center rounded-4 p-2 shadow-sm">
<a href="BookAppointment.php" class="link-dark">
<img src="img/home/schedule.png" alt="" class="img-fluid px-2">
<p class="text-truncate small pt-2 m-0">Appointment</p>
</a>
</div>
</div>
<div class="col">
<div class="bg-white text-center rounded-4 p-2 shadow-sm">
<a href="#" class="link-dark">
<img src="img/home/prescription.png" alt="" class="img-fluid px-2">
<p class="text-truncate small pt-2 m-0">Prescription</p>
</a>
</div>
</div>
<div class="col">
<div class="bg-white text-center rounded-4 p-2 shadow-sm">
<a href="rushta.php" class="link-dark">
<img src="img/home/medicine.png" alt="" class="img-fluid px-2">
<p class="text-truncate small pt-2 m-0">Rushta</p>
</a>
</div>
</div>
</div>
</div>

<div class="mb-3">
<h6 class="mb-2 pb-1 fw-bold px-3 text-black">Top <span class="text-danger">10</span>  Doctor</h6>
<div class="top-doctors ps-2 ms-1">
<?php
$sql = "SELECT * FROM doctor LIMIT 10";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_doc = $row['id'];
?>
<div class="top-doctor-item">
<a href="book-appointment.php?id_doc=<?=$id_doc?>" class="link-dark">
<div class="card bg-white border-0 rounded-4 shadow-sm overflow-hidden">
<img  src="../doctor/assets/dist/img/img_doctor/<?php
$sql3 = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doc";
    $result3 = $con->query($sql3);
    $row3 = $result3->fetch_assoc();
    echo $row3['photo'];
?>" class="card-img-top top-doctor-img" alt="...">
<div class="card-body small p-3 osahan-card-body">
<p class="card-title fw-semibold mb-0 text-truncate fs-14">Dr. <?=$row['name']?></p>
<p class="card-text text-muted small m-0">
  <?php 
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
  ?>
</p>
</div>
</div>
</a>
</div>
<?php
}
?>


</div>
</div>




<div class="p-3">
<h6 class="mb-2 pb-2 fw-bold text-black">Discount on Appointment</h6>
<div class="row row-cols-2 g-3">

<?php
$sql = "SELECT * FROM desc_doctor WHERE yes_no = 1";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_doc = $row['id_doctor'];
  ?>
<div class="col">
  <div class="card rounded-4 border-0 position-relative shadow-sm overflow-hidden">
    <div class="position-absolute m-2">
      </div>
      <img src="../doctor/assets/dist/img/img_doctor/<?=$row['photo']?>" alt="" class="card-img-top top-doctor-img">
      <div class="card-body small p-3 osahan-card-body">
        <?php
    $sql5 = "SELECT * FROM doctor WHERE id = $id_doc";
    $result5 = $con->query($sql5);
    $row5 = $result5->fetch_assoc();
    $id_special = $row5['special'];
  ?>
<h6 class="card-title fs-14 mb-1">Dr. <?=$row5['name']?></h6>
<p class="card-text text-muted mb-1">  <?php 
    $special = $row5['special'];
    $sql2 = "SELECT * FROM special WHERE id = $id_special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
  ?></p>
<div class="align-items-center gap-3 small mb-3">
<div><span class="mdi mdi-medical-bag text-primary me-1"></span><?=$row['Experience'] ?>+ Years</div>
</div>
<h6 class="mb-0">E <?=$row['descount'] ?> <span class="text-muted small ms-1"> <del> E <?=$row['base_price'] ?></del></span></h6>
</div>
<div class="card-footer bg-transparent border-0 p-0 cf-btn">
<a href="book-appointment.php?id_doc=<?=$id_doc?>" class="btn btn-sm btn-primary d-flex align-items-center justify-content-between small">
<span class="small">Book NEW Appointment</span>
<span class="mdi mdi-left mdi-18px"></span>
</a>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>

<?php
include('sid.php');
?>
</div>


<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/slick/slick/slick.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="js/script.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="8f0f59d96637477c316a7a6d-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c419a0a11b6","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:07 GMT -->
</html>