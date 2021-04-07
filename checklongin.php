<?php
session_start();
include("connection.php");
if (isset($_POST['username'])) {
    //connection
    include("connection.php");
    //รับค่า user & password
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    //query 
    $sql = "SELECT * FROM member Where username='" . $username . "' and password='" . $password . "' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION['id_emp'] = $row['id_emp'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['User_role'] = $row['role'];

        if ($_SESSION["User_role"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
            include("connection.php");
            header("Location: homeadmin.php");
        }

        if ($_SESSION["User_role"] == "employee") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            include("connection.php");
            header("Location: member.php");
        }
        if ($_SESSION["User_role"] == "ceo") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            include("connection.php");
            header("Location: ceo.php");
        }
    } else {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {


    Header("Location: login.php"); //user & password incorrect back to login again

}
?>



