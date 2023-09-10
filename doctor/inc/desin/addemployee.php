<form action="do_add_employee.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">name :</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email :</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">pass :</label>
    <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone :</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
  </div>
  <input type="submit" class="btn btn-primary mb-3 pl-5 pr-5" value="SAVE">
</form> 