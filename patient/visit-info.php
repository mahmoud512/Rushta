<?php
session_start();
include('inc/conn.php');
$id_doc = $_GET['id_doc'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $date = $_POST['date'];
  $statu = $_POST['statu'];
  $id_patient = $_SESSION['id_pa'];
  $sql = "INSERT INTO revealed(id_patient, id_doctor, statu, date_p)
   VALUES ('$id_patient','$id_doc','$statu','$date')";
  $result = $con->query($sql);
  header('location:BookAppointment.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/visit-info.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Book NEW Appointment</title>

<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="visit-info d-flex flex-column vh-100">

<?php
include('header.php');
?>
<div class="vh-100 my-auto overflow-auto p-3">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="row g-2 mb-3">
<div class="col">
<div>
<label for="exampleFormControlAge" class="form-label mb-1">date</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlAge">
<span class="input-group-text bg-transparent rounded-0 border-0"><i class="bi bi-calendar-date text-muted"></i></span>
<input type="date" name="date"  fom class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="22" value="22" maxlength="2">
</div>
</div>
</div>

<div class="mb-3">
<label for="exampleFormControlWight" class="form-label mb-1">statu</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlWight">
<span class="input-group-text bg-transparent rounded-0 border-0"><i class="bi bi-speedometer2 text-muted"></i></span>
<select name="statu" class="form-control bg-transparent rounded-0 border-0 px-0" id="exampleFormControlWight">
  <option value="1">كشف</option>
  <option value="2">اعادة</option>
</select>
</div>
</div>
</div>

<div class="footer mt-auto p-3">
  <div class="bg-white rounded-4 border-primary-dotted py-3 ps-3 pe-5 upload-file mb-3">
  <h6 class="mb-0 me-auto fw-bold">details doctor</h6>
  <br>
<p class="fw-bold mb-1 text-primary fs-14">Dr. <?php 
  $sql = "SELECT * FROM doctor WHERE id = $id_doc";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  echo $row['name'];
?></p>
<small class="text-muted">Sr. <?php 
    $special = $row['special'];
    $sql2 = "SELECT * FROM special WHERE id = $special";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_assoc();
    echo $row2['name'];
    ?></small>
    <br>
<small class="text-muted">tel : <?php
$sql3 = "SELECT * FROM desc_doctor WHERE id_doctor = $id_doc";
    $result3 = $con->query($sql3);
    $row3 = $result3->fetch_assoc();
    echo $row3['phone'];
?></small>
<br>
<div class="upload-file-icon bg-primary">
<i class="bi bi-file-earmark-arrow-up text-white fs-3 pt-4 pe-3"></i>
</div>
</div>
<input type="submit" class="btn btn-info btn-lg w-100 rounded-4" value="Book NEW Appointment">
</div>
</div>
</form>
<nav id="main-nav">
<ul class="second-nav">
<li class="osahan-user-profile bg-primary">
<div class="d-flex align-items-center gap-2">
<img src="img/favorite/favorite-4.jpg" alt="" class="rounded-pill img-fluid">
<div class="ps-1">
<h6 class="fw-bold text-white mb-0">Hey, Samantha!</h6>
<p class="text-white-50 m-0 small">+91 12345-67890</p>
</div>
</div>
</li>
<li><a href="index-2.html"><span class="mdi mdi-cellphone me-3"></span>Splash</a></li>
<li>
<a href="#"><span class="mdi mdi-login me-3"></span>Authentication</a>
<ul>
<li><a href="landing.html">Landing</a></li>
<li><a href="welcome.html">Welcome</a></li>
<li><a href="sign-up.html">Sign up</a></li>
<li><a href="sign-in.html">Sign in</a></li>
<li><a href="sign-in-email.html">Sign in with email</a></li>
<li><a href="forget-password.html">Forget Password</a></li>
<li><a href="reset-password.html">Reset Password</a></li>
<li><a href="verify.html">Verify</a></li>
<li> <a href="congrats.html">Congrats</a></li>
</ul>
</li>
<li><a href="notification.html"><span class="mdi mdi-bell-outline me-3"></span>Notification</a></li>
<li><a href="home.html"><span class="mdi mdi-home-variant-outline me-3"></span>Homepage</a></li>
<li>
<a href="#"><span class="mdi mdi-magnify me-3"></span>Doctors</a>
<ul>
<li><a href="search.html"><span class="mdi mdi-magnify me-3"></span>Doctor List</a></li>
<li><a href="doctor-profile.html"><span class="mdi mdi-account-supervisor-outline me-3"></span>Doctor Profile</a></li>
<li><a href="request-appointment.html"><span class="mdi mdi-calendar-check me-3"></span>Request Appointment</a>
</li>
<li><a href="book-appointment.html"><span class="mdi mdi-calendar-plus me-3"></span>Book Appointment</a></li>
<li><a href="visit-info.html"><span class="mdi mdi-information-outline me-3"></span>Visit Info</a></li>
<li><a href="overview.html"><span class="mdi mdi-file-table-box-outline me-3"></span>Checkout</a></li>
</ul>
</li>
<li>
<a href="#"><span class="mdi mdi-account-outline me-3"></span>My Profile</a>
<ul>
<li><a href="my-profile.html"><span class="mdi mdi-account-outline me-3"></span>My Account</a></li>
<li><a href="my-appointment-upcoming.html"><span class="mdi mdi-calendar-clock me-3"></span>My Upcoming Appointment</a></li>
<li><a href="my-appointment.html"><span class="mdi mdi-calendar-range me-3"></span>My Appointments</a></li>
<li><a href="history.html"><span class="mdi mdi-history me-3"></span>History</a></li>
<li><a href="favorite-doctor.html"><span class="mdi mdi-cards-heart-outline me-3"></span>Favorites Doctor</a></li>
<li><a href="change-profile.html"><span class="mdi mdi-square-edit-outline me-3"></span>Edit Profile</a></li>
</ul>
</li>
<li><a href="video.html"><span class="mdi mdi-video-outline me-3"></span>Video Consultation</a></li>
<li>
<a href="#"><span class="mdi mdi-phone-outline me-3"></span>Doctor Call</a>
<ul>
<li><a href="call.html">Call</a></li>
<li><a href="call-doctor.html">Call Doctor</a></li>
<li><a href="call-end.html">Call End</a></li>
</ul>
</li>
<li>
<a href="#"><span class="mdi mdi-record-circle-outline me-3"></span>Doctor Recordings</a>
<ul>
<li><a href="recording.html">Recording 1</a></li>
<li><a href="recording-2.html">Recording 2</a></li>
<li><a href="play-recording.html">Play Recording 1</a></li>
<li><a href="play-recording-2.html">Play Recording 2</a></li>
</ul>
</li>
<li><a href="message.html"><span class="mdi mdi-message-processing-outline me-3"></span>Message</a></li>
<li><a href="chat.html"><span class="mdi mdi-chat-processing-outline me-3"></span>Chat</a></li>
<li><a href="review.html"><span class="mdi mdi-star-half-full me-3"></span>Doctor Review</a></li>
</ul>
<ul class="bottom-nav">
<li class="home">
<a href="home.html">
<p class="h5 m-0"><span class="mdi mdi-home-variant-outline"></span></p>
Home
</a>
</li>
<li class="find">
<a href="search.html">
<p class="h5 m-0"><span class="mdi mdi-magnify"></span></p>
Search
</a>
</li>
<li class="more">
<a href="my-profile.html">
<p class="h5 m-0"><span class="mdi mdi-account-circle-outline"></span></p>
Profile
</a>
</li>
</ul>
</nav>

<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="b1b51022b66672d001508d1a-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="b1b51022b66672d001508d1a-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="b1b51022b66672d001508d1a-text/javascript"></script>

<script src="js/script.js" type="b1b51022b66672d001508d1a-text/javascript"></script>
<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="b1b51022b66672d001508d1a-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c4c5f1d077e","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/visit-info.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:15:20 GMT -->
</html>