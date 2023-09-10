<?php
$id = $_GET['id'];

$sql = "SELECT * FROM `employes` WHERE id = $id";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
?>
<form action="inc/desin/do_update_employee.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">name :</label>
    <input type="text" class="form-control" value="<?=$row['name'] ?>" id="name" placeholder="Enter name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email :</label>
    <input type="email" class="form-control" value="<?=$row['email'] ?>"  id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone :</label>
    <input type="text" class="form-control" value="<?=$row['phone'] ?>"  id="phone" placeholder="Enter phone" name="phone">
  </div>
  <input type="hidden" name="id" value="<?=$row['id'] ?>">
  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 

<?php
}

?>

