<?php 
    include 'connection.php';
    
$id = $_POST['id'];
$query1 = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                    LEFT JOIN emp_address c on b.id_emp = c.id_emp 
                                    where a.id_emp = $id";

$result = mysqli_query($conn,$query1);

$row = mysqli_fetch_array($result);
echo json_encode($row);



?>