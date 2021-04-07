<?php 

include_once 'connection.php';


 $id_emp = $_POST["id_emp"];


 $nname = $_POST["nname"];
 $position = $_POST["position"];
 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $tel = $_POST["tel"];
 $hose = $_POST["hose"];
 $supdistrict = $_POST["supdistrict"];
 $district = $_POST["district"];
$province = $_POST["province"];
$PostalCode = $_POST["PostalCode"];

    $sql = "UPDATE emp_standard a INNER JOIN emp_address b ON a.id_emp = b.id_emp SET a.nname='$nname',a.position='$position',a.fname='$fname',a.lname='$lname',a.tel='$tel',b.hose='$hose',b.supdistrict='$supdistrict',b.district='$district',b.province='$province',b.PostalCode='$PostalCode' WHERE a.id_emp ='$id_emp'";
    $result = mysqli_query($conn, $sql) or die("Error in query sql" . mysqli_error($conn));
    mysqli_close($conn);

if ($result) {
    header("Location:emppage.php");
    echo "แก้ไขข้อมูลสำเร็จ";
    exit(0);
} else {
    header("Location:emppage.php");
    echo "แก้ไขข้อมูลไม่สำเร็จกรุณาลองใหม่อีกครั้ง". mysqli_error($conn);
    exit(0);
}
