<?php
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}

include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="inc/fun/add_patient.php" method="post" class=" p-3">
    <div class="mb-3">
      <label >name :</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3">
      <label >phone :</label>
      <input type="text" class="form-control" placeholder="Enter phone" name="phone">
    </div>
    <div class="mb-3">
      <label>age :</label>
      <input type="text" class="form-control" placeholder="Enter age" name="age">
    </div>
    <div class="mb-3">
      <label>address :</label>
      <input type="text" class="form-control" placeholder="Enter address" name="address">
    </div>
    <div class="mb-3">
      <label for="descri">description patient  :</label>
      <textarea name="descri" id="descri" placeholder="description of the patient's " class="form-control" rows="4" ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include('inc/desin/footer.php');
?>