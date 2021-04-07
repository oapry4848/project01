
<?php 

session_start();

include_once 'connection.php';

if (isset($_POST['submit'])) {

    $id_emp = $_POST['id_emp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $user_check = "SELECT * FROM member WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        

        $query = "INSERT INTO member (id_emp, username, password, role)
                    VALUE ('$id_emp', '$username', '$password', '$role')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: login.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: login.php");
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>


<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="login.html" class="h1"><b>Register</b><br>Prefabhouse</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form method="post" >
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ID " name="id_emp">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div class="icheck-primary">
                <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Admin
                </label>
              </div>
            </div>
            <div class="col-3">
              <div class="icheck-primary">
                <input class="form-check-input" type="radio" name="role" value="employee" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Employee
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>



        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- jQuery -->
  <script src=plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src=plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src=dist/js/adminlte.min.js"></script>
</body>

</html>