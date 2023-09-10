<?php
session_start();
include('inc/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/book-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - Book Appointment</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="appointment d-flex flex-column vh-100">

<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto p-3">
<div class="overflow-hidden rounded-4 shadow-sm mb-4">
<div class="px-3 appointment-banner">
<div class="d-flex align-items-center gap-3">
<img src="../doctor/assets/dist/img/img_doctor/
<?php
  $id_doc = $_GET['id_doc'];
  $sql3 = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doc";
  $result3 = $con->query($sql3);
  $row3 = $result3->fetch_assoc();
  echo $row3['photo'];
?>" alt="img doctor" style="margin: 10px;" class="img-fluid appointment-doctor-img">
<div>
<h5 class="mb-1">Dr. <?php 
  $sql = "SELECT * FROM doctor WHERE id = $id_doc";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  echo $row['name'];
?></h5>
<p class="text-muted mb-2">Sr. <?php 
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
    ?></p>
<div class="d-flex align-items-center gap-1 text-warning small">
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span>4.9</span>
<span class="text-primary">(5,380)</span>
</div>
</div>
</div>
</div>
<div class="d-flex align-items-center justify-content-between bg-white">
<a href="tel:<?php
$sql3 = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doc";
    $result3 = $con->query($sql3);
    $row3 = $result3->fetch_assoc();
    echo $row3['phone'];
?>" class="col text-center rounded-0 p-3">
<span class="mdi mdi-phone-outline h4 m-0 text-primary"></span>
</a>
<!-- <a href="chat.html" class="col text-center rounded-0 p-3">
<span class="mdi mdi-message-processing-outline h4 m-0 text-primary"></span>
</a> -->
</div>
</div>
<div class="body">
<div class="mb-4">
<h5 class="mb-1 text-black">Sr. <?php 
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
    ?></h5>
<p class="text-muted mb-2">Address : <?=$row3['adrress'] ?></p>
<div class="d-flex align-items-center gap-1 text-warning">
 <span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="mdi mdi-star"></span>
<span class="badge rounded-pill text-bg-warning">4.9</span>
</div>
</div>

<div class="mb-4">
<h6>About</h6>
<p class="text-muted"><?=$row3['dec'] ?>
</p>
</div>
<div class="d-flex align-items-center justify-content-between border rounded-4 overflow-hidden bg-white shadow-sm">
<div class="text-center col px-2 py-3">
<p class="mb-1">Pataint</p>
<h5 class="text-primary m-0 fw-bold">2.05K</h5>
</div>
<div class="text-center col px-2 py-3 border-start border-end">
<p class="mb-1">Experience</p>
<h5 class="text-primary m-0 fw-bold"><?=$row3['Experience'] ?></h5>
</div>

</div>
</div>
</div>
<div class="footer osahan-footer mt-auto p-3">
<a href="visit-info.php?id_doc=<?=$id_doc?>" class="btn btn-info btn-lg w-100 rounded-4">Book NEW Appointment</a>
</div>
</div>


<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="66be5ab978d35053fe4d7493-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="66be5ab978d35053fe4d7493-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="66be5ab978d35053fe4d7493-text/javascript"></script>

<script src="js/script.js" type="66be5ab978d35053fe4d7493-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="66be5ab978d35053fe4d7493-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c49d8ab11b6","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/book-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
</html>