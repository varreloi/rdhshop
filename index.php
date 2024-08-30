<?php
session_start();
//koneksi ke database
$koneksi=new mysqli("localhost","root","","rdhshop");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDH Shop</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>

<!-- Navbar-->
<?php include'menu.php';?>

<!--Banner-->
<section id="banner">
    <div id="container">
        <h4>Trade-in-offer</h4>
        <h2>Harga Super Meriah!</h2>
        <h1>Kerupuk Jempolan</h1>
        <p>Klaim diskon 20% untuk pembelian pertama</p>
        <button>Shop Now</button>
    </div>
</section>

<!--konten-->
<section class="konten">
    <div class="container">
        <h1>Produk Utama</h1>

        <div class="row ">

            <?php $ambil=$koneksi->query("SELECT * FROM produk");?>
            <?php while ($perproduk=$ambil->fetch_assoc()) {;?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="">
                    <div class="caption">
                        <h3><?php echo $perproduk['nama_produk'];?></h3>
                        <h5>Rp.<?php echo $perproduk['harga_produk'];?></h5>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                        <!--<a href="detail.php?id=<?php //echo $perproduk['id_produk'];?>" class="btn btn-default">Detail</a>-->
                    <img src="" alt="">
                    </div>
                </div>
            </div>
            <?php }?>

            
        </div>
    </div>

</section>
</body>
</html>