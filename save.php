<meta charset="utf-8">
<?php
include'connection.php';


// print_r($_POST);

//save workin
if (isset($_POST["workin"])) {
    include("connection.php");
    $workdate = date('Y-m-d');
    $m_id = mysqli_real_escape_string($conn, $_POST["m_id"]);
    $workin = mysqli_real_escape_string($conn, $_POST["workin"]);
    
    $status="1";
    $sql = "INSERT INTO timework (id_emp,workin,workdate) VALUES ('$m_id','$workin','$workdate')";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($sql));
    $sql1 = "UPDATE member SET status ='$status' WHERE id_emp=$m_id";
    $result1 =mysqli_query($conn, $sql1) or die("Error in query: $sql1 " . mysqli_error($sql1));
    mysqli_close($conn);
    
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ลงเวลาเข้าทำงานเรียบร้อย');";
        echo "window.location = 'memberwork.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error');";
        echo "window.location = 'memberwork.php'; ";
        echo "</script>";
    }

    //save workout			
} elseif (isset($_POST["workout"])) {

    // echo $_POST["workout"];

    // exit;

    $workdate = date('Y-m-d');
    $m_id = mysqli_real_escape_string($conn, $_POST["m_id"]);
    $workout = mysqli_real_escape_string($conn, $_POST["workout"]);


    $sql2 = "UPDATE timework SET 
			workout='$workout'
			WHERE id_emp=$m_id  AND workdate='$workdate'
			";
    $result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error($sql2));

    $sql3 = "SELECT `workin`,`workout` FROM `timework` WHERE id_emp=$m_id  AND workdate='$workdate'";
    $result3 = mysqli_query($conn, $sql3) or die("Error in query: $sql3 " . mysqli_error($sql3));
    $arr = mysqli_fetch_array($result3);

    $start_time = $arr['workin'];
    $end_time = $arr['workout'];

    $data = array($start_time);
    $date = new DateTime($end_time);
    $h = 0;
    $m = 0;
    $s = 0;

    foreach ($data as $time) {
        $a = explode(":", $time);
        $h = $h - $a[0];
        $m = $m - $a[1];
        $s = $s - $a[2];
    }
    $date->modify("$h hour $m min");
    $sum = $date->format('H');
    // var_dump($sum);

    $sql4 = "UPDATE timework SET ttime='$sum' WHERE id_emp=$m_id  AND workdate='$workdate'";
    $result4 = mysqli_query($conn, $sql4) or die("Error in query: $sql4 " . mysqli_error($sql4));


    $status = 0 ;
    $sql5 = "UPDATE member SET status ='$status' WHERE id_emp=$m_id ";
    $result5 = mysqli_query($conn, $sql5) or die("Error in query: $sql5 " . mysqli_error($sql5));






    mysqli_close($conn);
    if ($result2) {
        echo "<script type='text/javascript'>";
        echo "alert('ลงเวลาเลิกงานเรียบร้อย');";
        echo "window.location = 'member.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error');";
        echo "window.location = 'memberwork.php'; ";
        echo "</script>";
    }
} //}elseif (isset(($_POST["workout"])) {
else {
    echo "<script type='text/javascript'>";
    echo "alert('คุณได้บันทึกเวลาเข้า-ออกงานวันนี้เรียบร้อยแล้ว');";
    echo "window.location = 'member.php'; ";
    echo "</script>";
}




?>