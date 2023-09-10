
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img  src="assets/dist/img/rt.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span  class="brand-text font-weight-light">RUSHTA PRO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dash_bord_phor.php?das" class="nav-link  <?php 
          if (isset($_GET['das'])) {
            echo "active";
          }
            ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php?pro" class="nav-link  <?php 
          if (isset($_GET['pro'])) {
            echo "active";
          }
            ?> ">
            <i class="fas fa-solid fa-user mr-1"></i>
              <p>
                profile 
                <span class="right badge badge-danger"> <span> </span> </span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="logout.php" class="nav-link">
            <i class="fas fa-reply mr-2"> </i>
              <p>
                log out
              </p>
            </a>
          </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    