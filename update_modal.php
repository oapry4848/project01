<?php
require_once 'connection.php';
$id = $_GET['id'];
$query1 = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                    LEFT JOIN emp_address c on b.id_emp = c.id_emp 
                                    where a.id_emp = $id";

$result = mysqli_query($conn, $query1); #
$row = mysqli_fetch_array($result);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>admin</title>
</head>

<body>
    <div class="container">


        <h1 class="mt-5">แก้ไขข้อมูลพื้นฐานพนักงานรหัส : <?php echo $row['id_emp'] ?></h1>
        <div class="row mt-5">
            <div class="card">
            <form method="post" action ="update_save.php">
            <div class="row mt-2">
            <h4>ข้อมูลส่วนตัว</h4>
                    <input type="hidden" class="form-control" name="id_emp" value="<?php echo $row['id_emp']; ?>" />
                    <input type="hidden"  class="form-control" name="standard_id" value="<?php echo $row['standard_id']; ?>" />
                    <input type="hidden" class="form-control"  name="add_id"  value="<?php echo $row['add_id']; ?>" />
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" value="<?php echo $row['fname'] ?>" name="fname">
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" value="<?php echo $row['lname'] ?>" name="lname">
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" value="<?php echo $row['hose'] ?>" name="hose">
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">ตำบล</label>
                        <input type="text" class="form-control" value="<?php echo $row['supdistrict'] ?>" name="supdistrict">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อเล่น</label>
                        <input type="text" class="form-control" value="<?php echo $row['nname'] ?>" name="nname">
                    </div>
                    <div class="col-3">
                    <label for="exampleFormControlInput1" class="form-label">ตำแหน่งงาน</label>
                    <select class="form-select" aria-label="Default select example" name="position"">
                        <option value="<?php echo $row['position'] ?>"><?php echo $row['position'] ?></option>
                        <option value="ช่างเชื่อม">ช่างเชื่อม</option>
                        <option value="สถาปัตยกรรม">สถาปัตยกรรม</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="บัญชี">บัญชี</option>
                        <option value="ผู้บริหาร">ผู้บริหาร</option>
                    </select>
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">อำเภอ</label>
                        <input type="text" class="form-control" value="<?php echo $row['district'] ?>" name="district">
                    </div>
                    <div class="col-3">
                        <label for="exampleFormControlInput1" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" value="<?php echo $row['province'] ?>" name="province">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="text" class="form-control" value="<?php echo $row['tel'] ?>" name="tel">
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" value="<?php echo $row['PostalCode'] ?>" name="PostalCode">
                    </div>
                </div>
                <hr>
                <input type="submit" value="Update" class="btn btn-success">
                <a href="emppage.php" class="btn btn-primary">Back</a>
                
            
            </form>
            <br>


            </div>

        </div>
    </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>