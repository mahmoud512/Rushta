<?php
session_start();
include('inc/conn.php');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$phone = $_POST['phone'];
$pass = md5($_POST['pass']);
$sql = "SELECT * FROM patient WHERE phone = '$phone' and pass = '$pass'";
$result = $con->query($sql);
$num_result = $result->num_rows;
if($num_result > 0){
  $rows = $result->fetch_assoc();
  $_SESSION['log'] = 'users';
  $_SESSION['name_pa'] = $rows['name'];
  $_SESSION['id_pa'] = $rows['id'];
  header('location:home.php');
}else{
  $error = 0;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/dactorapp/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:30 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>rushta pro - Sign in</title>


<link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.10.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="vender/sidebar/demo.css">

<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="sign-in p-4">
<div class=" mb-4">
  <center>
    <div>
<span class="mdi mdi-account-circle-outline display-1 text-primary"></span>
<h2 class="my-3 fw-bold">Let's Sign in</h2>
<p class="text-muted mb-0">Welcome Back</p>
</div>

</center>

</div>
<?php
      if (isset($error)) {
        ?>
        <div class="alert alert-danger alert-dismissible">
                  <h5><i class="icon fas fa-ban"></i> error !</h5>
                email or password is not correct
                </div>
        <?php
      }
    ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="mb-3">
<label for="phone" class="form-label mb-1">phone</label>
<div class="input-group border bg-white rounded-3 py-1" id="phone">
<span class="input-group-text bg-transparent rounded-0 border-0" id="phone">
<span class="mdi mdi-phone-outline mdi-18px text-muted"></span>
</span>
<input type="text" required name="phone" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your phone" aria-label="Type your phone" aria-describedby="phone">
</div>
</div>
<div class="mb-3">
<label for="exampleFormControlPassword" class="form-label mb-1">Password</label>
<div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlPassword">
<span class="input-group-text bg-transparent rounded-0 border-0" id="password">
<span class="mdi mdi-lock-outline mdi-18px text-muted"></span></span>
<input type="password" required name="pass" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your password" aria-label="Type your password" aria-describedby="password">
</div>
</div>
<div>
  <input type="submit" value="Login" class="btn btn-info btn-lg w-100 rounded-4 mb-2">
</div>
</form>
<div class="d-flex justify-content-between mt-2">
<p class="text-muted text-end small">Don't have an account? <a class="text-primary" href="sign-up.php">Sign up</a></p>
</div>
</div>



<script src="js/bootstrap.bundle.min.js"></script>
<script src="vender/bootstrap/js/bootstrap.bundle.min.js" type="9b66bf120eac38c1477cfaa7-text/javascript"></script>

<script src="vender/jquery/jquery.min.js" type="9b66bf120eac38c1477cfaa7-text/javascript"></script>

<script src="vender/sidebar/hc-offcanvas-nav.js" type="9b66bf120eac38c1477cfaa7-text/javascript"></script>

<script src="js/script.js" type="9b66bf120eac38c1477cfaa7-text/javascript"></script>
<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="9b66bf120eac38c1477cfaa7-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a360c287e42077e","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/dactorapp/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2023 23:14:30 GMT -->
</html>