<?php
include_once 'connection.php';


//รับค่่าตัวแปรตารางที่1
$id_emp = $_POST['id_emp'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$status = "0";

//รับค่่าตัวแปรตารางที่2
$position = $_POST['position'];
$perfix = $_POST['perfix'];
$nname = $_POST['nname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$b_date = $_POST['b_date'];

//รับค่่าตัวแปรตารางที่3

$hose = $_POST['hose'];
$supdistrict = $_POST['supdistrict'];
$district = $_POST['district'];
$province = $_POST['province'];
$PostalCode = $_POST['PostalCode'];
    //เพิ่มข้อมูลตาราง 1 
    $sql1 = "INSERT into member (id_emp,username,password,role,status) values('$id_emp','$username','$password','$role','$status')";
    $result1 = mysqli_query($conn, $sql1) or die("Error in query sql1" . mysqli_error($conn));

    //เพิ่มข้อมูลตาราง 2 
    $sql2 = "INSERT into emp_standard (id_emp,position,perfix,nname,fname,lname,tel,b_date) values('$id_emp','$position','$perfix','$nname','$fname','$lname','$tel','$b_date')";
    $result2 = mysqli_query($conn, $sql2) or die("Error in query sql2" . mysqli_error($conn));

    //เพิ่มข้อมูลตาราง 3

    $sql3 = "INSERT into emp_address (id_emp,hose,supdistrict,district,province,PostalCode) values('$id_emp','$hose','$supdistrict','$district','$province','$PostalCode')";
    $result3 = mysqli_query($conn, $sql3) or die("Error in query sql3" . mysqli_error($conn));


mysqli_close($conn);

if ($result1 && $result2 && $result3) {
    header("Location:emppage.php");
    echo "Success";
} else {
    header("Location:emppage.php");
    echo "Error";
}
