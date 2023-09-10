
<?php
$id_doctor = $_SESSION['id_do'];
?>
<style>
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #343a40;
  color: white;
}
</style>


<a href="patient.php?do=add" class="btn btn-primary mb-3"> Add patient </a>

<table id="customers">
  <tr>
    <th>#</th>
    <th>name</th>
    <th>phone</th>
    <th>status</th>
    <th>date</th>
    <th>action</th>
  </tr>
  
  <?php
$sql ="SELECT * FROM revealed WHERE id_doctor = $id_doctor ORDER BY date_p DESC";
$result = $con->query($sql);
$x = 0;
while ($row = $result->fetch_assoc()) {
  $x++;
  $id_pat = $row['id_patient'];
  ?>
  <tr>
  <td><?=$x ?></td>
  <!-- name patient  -->
  <td><?php
  $sql0 ="SELECT * FROM patient WHERE id = $id_pat";
   $result0 = $con->query($sql0);
   while ($row0 = $result0->fetch_assoc()) {
  echo $row0['name'];
  $patient_id = $row0['name'];
  }
    ?>
</td>
<!-- name phone  -->
  <td><?php
  $sql0 ="SELECT * FROM patient WHERE id = $id_pat";
  $result0 = $con->query($sql0);
  while ($row0 = $result0->fetch_assoc()) {
  echo $row0['phone'];
  }
    ?></td>
<!-- name status  -->
  <td><?php
  $id = $row['statu'];
  $sql0 ="SELECT * FROM ststu WHERE id = $id";
  $result0 = $con->query($sql0);
  while ($row0 = $result0->fetch_assoc()) {
  echo $row0['name'];
  }
    ?></td>

    <!-- date  -->
    <td><?=$row['date_p'] ?></td>
  <td>
    
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal<?=$row['id'] ?>">
      delete
    </button>


<!-- The Modal -->
<div class="modal" id="myModal<?=$row['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">are you sure delete : <?php
  $sql0 ="SELECT * FROM patient WHERE id = $id_pat";
  $result0 = $con->query($sql0);
  while ($row0 = $result0->fetch_assoc()) {
  echo $row0['name'];
  $patient_id = $row0['name'];
  }
    ?></h4>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      are you sure delete : <?php
  $sql0 ="SELECT * FROM patient WHERE id = $id_pat";
  $result0 = $con->query($sql0);
  while ($row0 = $result0->fetch_assoc()) {
  echo $row0['name'];
  $patient_id = $row0['name'];
  }
    ?>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="inc/fun/deletepat.php?id=<?=$row['id'] ?>"><button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">yes</button></a>
        
        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">no</button>
      </div>
      
    </div>
  </div>
</div>

<a href="?do=edit&id=<?=$row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
<a href="viwe_patient.php?patient_id=<?php
  $sql0 ="SELECT * FROM patient WHERE id = $id_pat";
  $result0 = $con->query($sql0);
  while ($row0 = $result0->fetch_assoc()) {
  echo $row0['id'];
  }
    ?>" class="btn btn-primary btn-sm"> show</a>
</td>
</tr>

<?php
}
?>

</table>