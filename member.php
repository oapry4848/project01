<?php

session_start();
include'connection.php';
$m_id = $_SESSION['id_emp'];


if ($_SESSION['User_role'] != 'employee') {
  header("location: login.php");
} else {

?>
  <?php 

$queryemp = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                    LEFT JOIN emp_address c on b.id_emp = c.id_emp 
                                    where a.id_emp = $m_id";
$resultm = mysqli_query($conn, $queryemp) or die ("Error in query: " . mysqli_error($conn));
$rowm = mysqli_fetch_array($resultm);




  
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  
</head>

<body class=bg-light>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 mt-5 pt-5">
        <div class="row z-depth-3">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="member.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="memberwork.php">ลงเวลางาน</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="singout.php">ออกจากระบบ</a></li>
                </ol>
              </nav>
            </div>
          </nav>
          <div class="col-sm-4 bg-info rounded-left">
            <div class="card-block text-center text-white">
              <i class="fas fa-user-tie fa-7x mt-5"></i>
              <h2 class="font-weight-bold mt-4"><?php echo $rowm['fname']?>&nbsp;<?php echo $rowm['lname']?></h2>
              <p><?php echo $rowm['position'] ?></p>
              <i class="far fa-edit fa-2x mb-4"></i>
            </div>
          </div>
          <div class="col-sm-8 bg-white rounded-right">
            <h3 class="mt-3 text-center">ข้อมูลพนักงาน</h3>
            <hr class="badge-primary mt-0 w-100">
            <div class="row">
              <div class="col-sm-6">
                <p class="font-weight-bold">รหัสพนักงาน :</p>
                <h6 class="text-muted"><?php echo $rowm['id_emp'] ?></h6>
              </div>
              <div class="col-sm-6">
                <p class="font-weight-bold">ตำแหน่ง :</p>
                <h6 class="text-muted"><?php echo $rowm['position'] ?></h6>
              </div>
            </div>
            <h4 class="mt-3">ข้อมูลพื้นฐาน</h4>
            <hr class="badge-primary mt-0 w-100">
            <div class="row">
              <div class="col-sm-6">
                <p class="font-weight-bold">ชื่อ :</p>
                <h6 class="text-muted"><?php echo $rowm['fname']?>&nbsp;<?php echo $rowm['lname']?></h6>
              </div>
              <div class="col-sm-6">
                <p class="font-weight-bold">เบอร์โทรศัพท์ :</p>
                <h6 class="text-muted"><?php echo $rowm['tel']?></h6>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <p class="font-weight-bold">ที่อยู่ :</p>
                <h6 class="text-muted"><?php echo $rowm['hose']?>&nbsp;<?php echo $rowm['supdistrict']?>&nbsp;
                <?php echo $rowm['district']?>&nbsp;&nbsp;<?php echo $rowm['province']?>&nbsp;<?php echo $rowm['PostalCode']?>&nbsp;</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- ปิดกลุ่มแรก -->


 
    


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php } ?>