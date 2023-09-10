<?php
$patient_id = $_SESSION['id'];

$sql = "SELECT * FROM `patient` WHERE id = $patient_id";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
  
?>
<div class="imges mt-3" style="text-align: center; width: 100%;">
  <img src="assets/dist/img/avatar5.png" style="border-radius: 50%; border: 5px solid #343a40; box-shadow: 5px 5px 10px #343a40;" alt="">
</div>


<div class="container mt-3" style="text-align: right;" dir="rtl">
  <h2 class="mb-3">  اسم المريض : <span> <?=$row['name']?></span></h2>
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
          بيانات المريض
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
        <div class="card-body" >
        <i class="fas fa-reply mr-2"> </i>    رقم المحمول : <span> <?=$row['phone']?></span>
        <br>
        <br>
        <i class="fas fa-reply mr-2"> </i>    عمر المريض : <span> <?=$row['age']?> </span>
        <br>
        <br>
        <i class="fas fa-reply mr-2"> </i>    عنوان المريض : <span> <?=$row['address']?> </span>
        <br>
        <br>
        <i class="fas fa-reply mr-2"> </i>    معلومات عن حالة المريض : <span> <?=$row['descr']?> </span>
        
      </div>
      </div>
    </div>
  
  </div>
</div>
<?php } ?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">medical prescription</h3>
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
                    

                    $sql8 = "SELECT * FROM rushta WHERE id_patient = $patient_id";
                    
                    $result8 = $con->query($sql8);
                    $x=0;
                      while ($row = $result8->fetch_assoc()) {
                        $x++;
                        $doctor_id = $row['id_doctor'];
                        ?>
<tr>
  <td><?=$x?></td>
  <td> <?=$row['prescription_name'] ?> </td>
  <td><?=$row['date_add'] ?></td>
  <td>
  <?php 
$sql7 = "SELECT * FROM doctor WHERE id = $doctor_id";

$result7 = $con->query($sql7);
$row7 = $result7->fetch_assoc();
echo $row7['name'];

?>
  </td>
  <td><a href="rushta.php?id=<?=$row['id'] ?>" class="btn btn-primary">show</a></td>
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