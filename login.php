<?php
session_start();
$koneksi = new mysqli("localhost","root","","rdhshop");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>

<!--Navbar-->
<?php include'menu.php';?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group"></div>
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                            <div method="form-group">
                                <label for="">password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
                
    </div>
    <?php
    //fungsi untuk tombol login
    if(isset($_POST['login']))
    {
        //buat variabel email dan pass
        $email=$_POST["email"];
        $password=$_POST["password"];
        //cek query tabel pelanggan
        $ambil=$koneksi->query("SELECT * FROM pelanggan
        WHERE email_pelanggan='$email' AND password_pelanggan='$password'" );

        //hitung akun yang terambil
        $akuncocok=$ambil->num_rows;
        //jika 1 akun yang cocok, maka diloginkan
        if ($akuncocok==1)
        {
            $akun=$ambil->fetch_assoc();
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert('login Sukses, pintar juga lu goblok!');</script>";
            

            //jk sudah belanja
            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
            {
                echo "<script>location='checkout.php';</script>";
            }
            else
            {
                echo "<script>location='riwayat.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Gagal login, periksa akun goblok!');</script>";
            echo "<script>location='login.php';</script>";
        }
    }

    ?>
</body>
</html>