<?php
ob_start();
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}

include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $phone = $_POST['ser'];
  $sql = "SELECT * FROM `patient` WHERE phone = $phone";
  $result = $con->query($sql);
  $row = $result->num_rows;
  if ($row > 0) {
    $rows = $result->fetch_assoc();
    $_SESSION['id'] = $rows['id'];
  header('location:viwe_patient.php');
  }else{
  $error = 1 ;
  }
}

?>
<style>

  .for{
    margin-top: 10px;
    direction: rtl;
    text-align: right;
  }
  .bnn{
    margin-top: 10px;
    width: 100%;
    text-align: center;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" >
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="for">
          <label for="ser">ادخل رقم المريض :</label>
          <input type="text" required name="ser" id="ser" class="form-control">
          <div class="bnn">
            <input type="submit" value="go" class="btn btn-primary">
          </div>
        </form>
<br>
        
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">medical prescription cashed</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>prescription name</th>
                      <th>date</th>
                      <th>doctor name</th>
                      <th>show</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    
                    $id_phar = $_SESSION['id_ph'];
                    $sql8 = "SELECT * FROM rushta_sela WHERE id_phr = $id_phar ORDER BY date_add DESC";
                    $result8 = $con->query($sql8);
                    $x=0;
                      while ($row = $result8->fetch_assoc()) {
                        $x++;
                        $id_doctor = $row['id_doctor'];
                        $prescription_name = $row['prescription_name'];
                        $date_add = $row['date_add'];
                        $date_add = $row['date_add'];
                        $id = $row['id'];
                        ?>
                    
<tr>
  <td><?=$x?></td>
  <td><?=$prescription_name?></td>
  <td><?=$date_add?></td>
  <td><?php 
$sql7 = "SELECT * FROM doctor WHERE id = $id_doctor";
$result7 = $con->query($sql7);
$row7 = $result7->fetch_assoc();
echo $row7['name'];
?></td>
  <td><a href="rushta.php?id=<?=$id?>" class="btn btn-primary">show</a></td>
</tr>
<?php
                      }
?>
              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include('inc/desin/footer.php');
ob_end_flush();
?>