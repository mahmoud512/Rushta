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
              <li class="breadcrumb-item"><a href="#">Employee</a></li>
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
        
      <?php
        if (!isset($_GET['do'])) {
          include('inc/desin/allemployee.php');
        }else{
        if ($_GET['do'] == 'add') {
          include('inc/desin/addemployee.php');
        }
        if ($_GET['do'] == 'edit') {
          include('inc/desin/editemplo.php');
        }}
      ?>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include('inc/desin/footer.php');
?>