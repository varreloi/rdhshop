<?php
session_start();



$koneksi = new mysqli("localhost","root","","rdhshop");
echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>

<!--Navbar-->
<?php include'menu.php';?>


<section class="konten">
    <div class="container">
        <h1>Keranjang</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1;?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
                <?php 
                $ambil=$koneksi->query("SELECT * FROM produk
                    WHERE id_produk = '$id_produk'");
                $pecah=$ambil->fetch_assoc();
                $subharga=$pecah['harga_produk']*$jumlah;
               
                 ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama_produk'];?></td>
                    <td>Rp. <?php echo number_format ($pecah['harga_produk']);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>
                        Rp. <?php echo number_format ($subharga);?>
                    </td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
                    </td>
                </tr>
                <?php $nomor++;?>
                <?php endforeach?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
</section>


    
</body>
</html>