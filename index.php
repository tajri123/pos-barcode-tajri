<?php
include_once("config/database.php");
session_start();

if(isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql ="SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
    $check = $pdo->prepare($sql);
    $check->execute();

    $row = $check->fetch(PDO::FETCH_ASSOC);
    

   

    if(is_array($row)){
        //CHECK IF ROLE ADMIN
        if($row['username']==$username AND $row['password']==$password AND $row['role']=="admin"){
            //CATCH IF ROLE ADMIN SESSION
            $_SESSION['username'] = $row['username'];
            $_SESSION['role']= $row['role'];
            echo $notif = "success Login";
            header('refresh:2;view/dashboard/admin_dashboard.php');
       //CHECK IF ROLE OPERATOR
        }elseif($row['username']==$username AND $row['password']==$password AND $row['role']=="operator"){
            echo $notif = "Success Login";
            header('refresh:2;view/dashboard/operator_dashboard.php');
        }
    }else{
        echo $notif = "username / password salah";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | BARCODE </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>POS</b>BARCODE</a>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan username anda" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Masukan Password Anda" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" name="btn_login" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>
</html>