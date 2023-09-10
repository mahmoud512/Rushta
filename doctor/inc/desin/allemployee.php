
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


<a href="?do=add" class="btn btn-primary mb-3"> Add New Employee</a>

<table id="customers">
  <tr>
    <th>#</th>
    <th>name</th>
    <th>phone</th>
    <th>action</th>
  </tr>
  
  <?php
  $id_doctor = $_SESSION['id_do'];
$sql ="SELECT * FROM employes WHERE id_doctor = $id_doctor";
$result = $con->query($sql);
$x = 0;
while ($row = $result->fetch_assoc()) {
  $x++;
  ?>
<tr>
  <td><?=$x ?></td>
  <td><?=$row['name'] ?></td>
  <td><?=$row['phone'] ?></td>
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
        <h4 class="modal-title">are you sure delete : <?=$row['name'] ?></h4>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      are you sure delete : <?=$row['name'] ?>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="inc/desin/dodeletemplo.php?id= <?=$row['id'] ?>"><button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">yes</button></a>
        
        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">no</button>
      </div>
      
    </div>
  </div>
</div>

<a href="?do=edit&id=<?=$row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
</td>
</tr>
<?php
}
?>

</table>
