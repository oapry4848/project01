<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ระบบบันทึกเวลางาน</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user'] ;?> </a>
        </div>
      </div>

     


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">เมนู</li>
          <li class="nav-item">
            <a href="homeadmin.php" class="nav-link">
            <i class="nav-icon fa fa-home fa-fw" aria-hidden="true"></i>
              <p>
                หน้าแรก
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="emppage.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                จัดการพนักงาน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="work.php" class="nav-link">
            <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                สถานะการเข้างาน
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report.php" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
              <p>
              รายการปฏิบัติงาน
              </p>
            </a>
          </li>
          
          
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>