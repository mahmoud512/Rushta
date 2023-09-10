<?php
session_start();
include('inc/conn.php');
$id_patient = $_SESSION['id_pa'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:31 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<link rel="stylesheet" href="css/bootstrap.min.css">
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

<?php
include('header.php');
?>


<div class="p-3">
<h6 class="mb-2 pb-2 fw-bold text-black">Book Appointment today</h6>
<div class="row row-cols-2 g-3">
<?php
$date = date('Y-m-d');
$sql1 = "SELECT * FROM revealed WHERE id_patient = $id_patient and date_p ='$date'";
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {
  while ($rows = $result1->fetch_assoc()) {
    $id_doc = $rows['id_doctor'];
    ?>

<div class="col">
<div class="card rounded-4 border-0 position-relative shadow-sm overflow-hidden">
<div class="position-absolute m-2">
<span class="badge text-bg-success rounded-pill float-end">new</span>
</div>
<img src="img/favorite/mm.jpg" alt="" class="card-img-top top-doctor-img">
<div class="card-body small p-3 osahan-card-body">
<h6 class="card-title fs-14 mb-1">Dr. <?php
$sql = "SELECT * FROM doctor WHERE id = $id_doc";
$result = $con->query($sql);
$row = $result->fetch_assoc();
echo $row['name'];
?></h6>
<p class="card-text text-muted mb-1">special : <?php
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
?></p>
<p class="card-text text-muted mb-1">date : <?=$rows['date_p']?></p>

<p class="card-text text-muted mb-1">status : <?php
$statu = $rows['statu'];
$sql8 = "SELECT * FROM ststu WHERE id = $statu";
$result8 = $con->query($sql8);
$row8 = $result8->fetch_assoc();
echo $row8['name'];
?></p>
<div class="d-flex align-items-center gap-3 small mb-3">
</div>
</div>
<div class="card-footer bg-transparent border-0 p-0 cf-btn">
<a href="call-doctor.html" class="btn btn-sm btn-primary d-flex align-items-center justify-content-between small">
<span class="small">SEE Appointment</span>
</a>
</div>
</div>
</div>

<?php
}
}else{
  ?>
  <center>
    <h1>لا يوجد حجز اليوم</h1>
  </center>
  <?php
}
?>


<a href="all_doctor.php" class="btn btn-info btn-lg w-100 rounded-4">Book NEW Appointment</a>
</div>
</div>
<hr>


<div class="p-3">
<h6 class="mb-2 pb-2 fw-bold text-black">ALL Book Appointment</h6>
<div class="row row-cols-2 g-3">
<?php
$sql1 = "SELECT * FROM revealed WHERE id_patient = $id_patient";
$result1 = $con->query($sql1);
while ($rows = $result1->fetch_assoc()) {
  $id_doc = $rows['id_doctor'];
  ?>
<div class="col">
<div class="card rounded-4 border-0 position-relative shadow-sm overflow-hidden">
<div class="position-absolute m-2">
<span class="badge text-bg-success rounded-pill float-end">new</span>
</div>
<img src="img/favorite/mm.jpg" alt="" class="card-img-top top-doctor-img">
<div class="card-body small p-3 osahan-card-body">
<h6 class="card-title fs-14 mb-1">Dr. <?php
$sql = "SELECT * FROM doctor WHERE id = $id_doc";
$result = $con->query($sql);
$row = $result->fetch_assoc();
echo $row['name'];
?></h6>
<p class="card-text text-muted mb-1">special : <?php
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
?></p>
<p class="card-text text-muted mb-1">date : <?=$rows['date_p']?></p>

<p class="card-text text-muted mb-1">status : <?php
$statu = $rows['statu'];
$sql8 = "SELECT * FROM ststu WHERE id = $statu";
$result8 = $con->query($sql8);
$row8 = $result8->fetch_assoc();
echo $row8['name'];
?></p>
<div class="d-flex align-items-center gap-3 small mb-3">
</div>
</div>
<div class="card-footer bg-transparent border-0 p-0 cf-btn">
<a href="call-doctor.html" class="btn btn-sm btn-primary d-flex align-items-center justify-content-between small">
<span class="small">SEE Appointment</span>
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




<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/slick/slick/slick.min.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>

<script src="js/script.js" type="8f0f59d96637477c316a7a6d-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="8f0f59d96637477c316a7a6d-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c419a0a11b6","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:07 GMT -->
</html>