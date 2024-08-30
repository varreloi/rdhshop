<?php 
session_start();
$koneksi= new mysqli("localhost","root","","rdhshop");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font.awesom.css">
    <link rel="stylesheet" href="asstes/css/custom.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
</head>
<body>

    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Admin</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <br/>
                            <div class="form-group input-group"></div>
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="user">
                            <div method="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                
                            </div>
                        </form>
                    <?php
                    if(isset($_POST['login']))
                    {
                        $ambil=$koneksi->query("SELECT * FROM `admin` WHERE username='$_POST[user]'
                            AND password = '$_POST[password]'");
                        $yangcocok = $ambil->num_rows;
                        if ($yangcocok==1)
                        {
                            $_SESSION=$ambil->fetch_assoc();
                            echo"<div class='alert alert-info'>Login Sukses</div>";
                            echo"<meta http-equiv='refresh' content='1;url=index.php'>";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>Login Gagal</div>";
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
                
    </div>