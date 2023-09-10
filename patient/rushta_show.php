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
<style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 8px;
  padding-bottom: 8px;
  background-color: #343a40;
  color: white;
}
.content{
  direction: rtl;
  text-align: right;
}
.h4{
  margin-top: 10px;
}
.x{
  text-align: center;
  font-size: 30px;
}


</style>
</head>
<body class="bg-light">

<div class="select-area d-flex flex-column vh-100">
<?php
include('header.php');
?>

<div class="vh-100 my-auto overflow-auto body-fix-osahan-footer" dir="rtl">
<div class="py-3 p-3">
<h4 style="display: inline-block;">بيانات الدكتور :</h4>
<table id="customers">
  <tr>
    <th>اسم الدكتور</th>
    <th>المحمول</th>
    <th>التخصص</th>
  </tr> 
   <tr>
  <?php
  $id_ro =$_GET['id_ro'];
  $sql2 = "SELECT * FROM `rushta` WHERE  id = $id_ro";
  $result = $con->query($sql2);
  $row = $result->fetch_assoc();
  $id_doctor = $row['id_doctor'];
  // ------------------------------------ 

    $sql = "SELECT * FROM `doctor` WHERE id =$id_doctor";
    $result0 = $con->query($sql);
    while ($ro = $result0->fetch_assoc()) {
      ?>
    <td><?=$ro['name']?></td>
    <td><?php
    $sql20 = "SELECT * FROM `desc_doctor` WHERE  id_doctor = $id_doctor";
  $result10 = $con->query($sql20);
  $row10 = $result10->fetch_assoc();
  echo $row10['phone'];
    ?></td>
    <td><?php 
    $special = $ro['special'];
    $sql20 = "SELECT * FROM `special` WHERE  id = $special";
    $result10 = $con->query($sql20);
    $row10 = $result10->fetch_assoc();
    echo $row10['name'];
    ?></td>
      <?php
    }
  ?>
  </tr>
</table>

  <h4 class="h4" style="display: inline-block;">بيانات الروشتة :</h4>
<table id="customers">
  <tr>
    <th>اسم الدواء</th>
    <th>عدد الجرعات اليومية</th>
    <th>موعد اخذ الجرعة</th>
  </tr>
  <tr>
  <?php
  $sql2 = "SELECT * FROM `rushta` WHERE  id = $id_ro";
  $result11 = $con->query($sql2);

  $name = $row['medicl_name'];
  $name_ex = explode("$" , $name);

  $time = $row['time_doses'];
  $time_ex = explode("$" , $time);

  $num = $row['num_doses'];
  $num_ex = explode("$" , $num);

  for ($i=0; $i < count($name_ex); $i++) { 
    ?>
    <tr>
    <td><?=$name_ex[$i]?></td>
    <td><?=$num_ex[$i]?> : يوميا</td>
    <td><?=$time_ex[$i]?></td>
    </tr>
    <?php
  }

    ?>
</table>

<br>
<div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
          ملحوظات
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
        <div class="card-body" >
        <?=$row['des']?>
      </div>
      </div>
    </div>
  
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