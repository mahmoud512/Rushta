<?php
session_start();
include('inc/conn.php');
$id_pat = $_SESSION['id_pa'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:07 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Dactorapp - Doctor Appointment Booking Mobile Template - Select Area</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/slick/slick/slick.css" />
<link rel="stylesheet" href="vender/slick/slick/slick-theme.css" />

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="select-area d-flex flex-column vh-100">
<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
<div class="py-3">
<div>
<h6 class="mb-2 pb-1 px-3 fw-bold text-black">Rushta </h6>
<?php
$sql = "SELECT * FROM `rushta` WHERE id_patient = $id_pat";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_doc = $row['id_doctor'];
?>
<a href="rushta_show.php?id_ro=<?=$row['id']?>" class="link-dark">
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
<small class="text-muted"><?=$row['prescription_name']?></small>
</div>
</div>
</a>
<?php } ?>


</div>
</div>

</div>



<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="a11d566f741c0b950a3c7f6b-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="a11d566f741c0b950a3c7f6b-text/javascript"></script>

<script src="vender/slick/slick/slick.min.js" type="a11d566f741c0b950a3c7f6b-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="a11d566f741c0b950a3c7f6b-text/javascript"></script>

<script src="js/script.js" type="a11d566f741c0b950a3c7f6b-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="a11d566f741c0b950a3c7f6b-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c43af20077e","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:09 GMT -->
</html>