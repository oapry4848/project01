<?php 
include_once 'connection.php';
$id = $_POST['id'];


$sql = "DELETE member FROM member LEFT JOIN emp_standard ON member.id_emp = emp_standard.id_emp
                                  LEFT JOIN emp_address ON emp_standard.id_emp = emp_address.id_emp
                                  WHERE member.id_emp = $id";

$result=mysqli_query($conn,$sql);



?>
