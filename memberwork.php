<?php

session_start();
include'connection.php';
include 'thaidate.php';
$m_id = $_SESSION['id_emp'];


if ($_SESSION['User_role'] != 'employee') {
  header("location: login.php");
} else {

?>
  <?php 

$queryemp = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                    LEFT JOIN emp_address c on b.id_emp = c.id_emp 
                                    where a.id_emp = $m_id";
$resultm = mysqli_query($conn, $queryemp) or die ("Error in query: " . mysqli_error());
$rowm = mysqli_fetch_array($resultm);

//เวลาที่บันทึก เวลาปัจจุบัญ
$timenow = date('H:i:s');
$datenow = date('y-m-d');

// echo $timenow;
// echo $datenow;

$queryworkio = "SELECT MAX(workdate) as lastdate, workin, workout FROM timework WHERE id_emp=$m_id AND workdate='$datenow' ";
$resultio = mysqli_query($conn, $queryworkio) ;
$rowio = mysqli_fetch_array($resultio);
// print_r($rowio); ใว้เช็คค่าว่าส่งมาไหม


  
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
        <div class="co"></div><nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="member.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="memberwork.php">ลงเวลาเข้างาน</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="singout.php">ออกจากระบบ</a></li>
                </ol>
              </nav>
            </div>
          </nav></div>
        <div class="col col-sm-9 ">
          <h4 class="mt-5">  <?php $strDate = $datenow;
                                    echo "ลงเวลาเข้า-ออกงานประจำวันที่  " . DateThai($strDate); ?></h4>
          <form action="save.php"  method="post" class="form-horizontal">
            <div class="form-group row">
              <div class="col col-sm-4">
                <label for="m_id">ชื่อ-นามสกุล</label>
                <input type="hidden" name="status" value="1"> 
                <input type="text" class="form-control"   name="username_id"   placeholder="ชื่อ-นามสกุล"   value="<?php echo $rowm['fname']?>&nbsp;<?php echo $rowm['lname']?>"  readonly>
                <input type="hidden" class="form-control"   name="m_id"   placeholder="รหัสพนักงาน"   value="<?php echo $rowm['id_emp'];?>"  readonly>
              </div>
              <div class="col col-sm-4">
                <label for="m_id">เข้า</label>
                <?php if(isset($rowio['workin'])){ ?>
                <input type="text" class="form-control"   name="workin"   value="<?php echo $rowio['workin'];?>"  disabled>
                <?php }else{ ?>
                <input type="text" class="form-control"   name="workin"   value="<?php echo date('H:i:s');?>"  readonly>
                <?php  } ?>
              </div>
              <div class="col col-sm-4">
                <label for="m_id">ออก</label>
                <?php
                if($timenow > '17:00:00'){
                if(isset($rowio['workout'])){ ?>
                <input type="text" class="form-control"   name="workout"  value="<?php echo $rowio['workout'];?>"  disabled>
                <?php }else{ ?>
                <input type="text" class="form-control"   name="workout"  value="<?php echo date('H:i:s');?>"  readonly>
                <?php
                } //if(isset($rowio['workout'])){
                }else{  //if($timenow > '11:00:00'){
                echo '<br><font color="red"> หลัง 17.00 น. </font>';
                } ?>
              </div>
              <div class="col col-sm-3">
                  <br>
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
            </div>
          </form>
          <br>
          <h3>บันทึกลงเวลางาน</h3>
          <?php
          $querylist = "SELECT * FROM timework WHERE id_emp = $m_id ORDER BY workdate DESC";
          $resultlist = mysqli_query($conn, $querylist)  ;
          echo "
          <table class='table table-bordered table-striped'>
          <thead>
            <tr class='table-danger'>
              <td>วันที่</td>
              <td>เวลาเข้างาน</td>
              <td>เวลาออกงาน</td>
            </tr>
            </thead>
            ";

            foreach ($resultlist as $value) {
            echo "<tr>";
              echo "<td>" .$value["workdate"] .  "</td> ";
              echo "<td>" .$value["workin"] .  "</td> ";
              echo "<td>" .$value["workout"] .  "</td> ";
            echo "</tr>";
            }
          echo '</table>';
          ?>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php } ?>