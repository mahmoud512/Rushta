<?php
include('conn.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $phone = $_POST['phone'];
  $phone_num = (int)$phone;
  $sql0 = "SELECT * FROM patient WHERE phone = $phone_num";
  $result =  $con->query($sql0);
  $row = $result->num_rows;
  if ($row > 0) {
    $rows = $result->fetch_assoc();
    $id_patient = $rows['id'];
    $status = $_POST['status'];
    $id_doctor = $_SESSION['id_do'];
    $date = date('Y-m-d');
    $sql = "INSERT INTO revealed(id_patient, id_doctor, statu, date_p) VALUES
     ('$id_patient','$id_doctor','$status','$date')";
     $con->query($sql);
     header('location:patient.php');
    }else{
      $error = 0;
    }
}



?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
  <?php
      if (isset($error)) {
        ?>
        <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> error !</h5>
                the phone is not found
                </div>
        <?php
      }
    ?>
    <label for="phone" class="form-label">phone :</label>
    <input type="text" required class="form-control" id="phone" placeholder="Enter phone" name="phone">
  </div>
  <div class="mb-3 mt-3">
    <label for="ststus" class="form-label">status :</label>
    <select name="status" required id="ststus" class="form-control">
      <?php
    $sql = "SELECT * FROM ststu";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
      ?>
<option value="<?=$row['id'] ?>"><?=$row['name'] ?></option>
      <?php
    }
      ?>
    </select>
  </div>
  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 
