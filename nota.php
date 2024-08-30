<?php $koneksi = new mysqli("localhost","root","","rdhshop");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="shop.css">
    <title>Nota</title>
</head>
<body>
<Section class="navbar navbar-default" id="header">
    <h1>RDH</h1>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            
        </ul>  
</section>
<section class="konten">
    <div class="container">
    <h2>Nota Pembelian</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=  $ambil->fetch_assoc();

$amb=$koneksi->query("SELECT * FROM pembelian JOIN ongkir 
ON pembelian.id_ongkir=ongkir.id_ongkir
WHERE pembelian.id_pembelian='$_GET[id]'");
$det= $amb->fetch_assoc();
?>


<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>
    Tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
    Total: <?php echo number_format($detail['total_pembelian']);?>
</p>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail ['nama_pelanggan'];?></strong><br>
        <p>
            <?php echo $detail['telepon_pelanggan'];?> <br>
            <?php echo $detail['email_pelanggan'];?>
        </p>  
        </div>
        <div class="col-md-4">
            <h3>Pengiriman</h3>
            <strong><?php echo $det['nama_kota'];?></strong>
            <p>
                Ongkos kirim Rp. <?php echo number_format($det['tarif']);?><br>
                Alamat: <?php echo $detail['alamat_pengiriman'];?>
            </p>
        </div>
</div>
<table class="table table bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subharga</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query
        ("SELECT * FROM pembelian_produk JOIN produk 
        ON pembelian_produk.id_produk=produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo number_format($pecah['harga_produk']);?></td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td>
                <?php echo number_format($pecah['harga_produk']* $pecah['jumlah']);?>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Silahkan lakukan pembayaran Rp.<?php echo number_format($detail['total_pembelian']);?>
                ke <br>
                <strong>BANK BSI 130-008292-9309 AN. Sukaryo</strong>
            </p>
        </div>
    </div>
</div>
    </div>
</section>
</body>
</html>