<?php
ob_start();
session_start();
if (!isset($_SESSION['login']) ) {
  header('location:index.php');
}
include('inc/desin/conn.php');
include('inc/desin/navbar.php');
include('inc/desin/sidebar.php');
?>
<div class="content-wrapper">
  <div class="col-sm-12">
        <!-- Content Header (Page header) -->
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">patient</a></li>
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
          include('inc/desin/allpatient.php');
        }else{
        if ($_GET['do'] == 'add') {
          include('inc/desin/date_patient.php');
        }
        if ($_GET['do'] == 'edit') {
          include('inc/desin/date_edit_patient.php');
        }}
      ?>

      </div><!-- /.container-fluid -->
    </section>
  </div>
  </div>

<?php
include('inc/desin/footer.php');
ob_end_flush();
?>