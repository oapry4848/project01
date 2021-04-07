<?php
include_once 'connection.php';
$sql = "SELECT * FROM  member WHERE role ='employee'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);



$result1=mysqli_query($conn,"SELECT count('status') as total from member WHERE status = 1");
$data=mysqli_fetch_assoc($result1);




$result3=mysqli_query($conn,"SELECT count('status') as total2 from member WHERE status = 0 AND role ='employee'");
$data2=mysqli_fetch_assoc($result3);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1 class="m-0">ระบบบันทึกเวลาการทำงานบริษัทน็อคดาวน์ เซ็นเตอร์ จำกัด </h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">



              <h3><?php echo $num; ?></h3>

              <p>จำนวนพนักงาน</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="emppage.php" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">

            <h3><?php echo $data['total']; ?></h3>

              <p>ออนไลน์</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-clock"></i>
            </div>
            <a href="work.php" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">

            <h3><?php echo $data2['total2']; ?></h3>

              <p>ออฟไลน์</p>
            </div>
            <div class="icon">
              <i class="fas fa-times-circle"></i>
            </div>
            <a href="offlinepage.php" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  
<!-- /.content-wrapper -->