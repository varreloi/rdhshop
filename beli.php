<?php
session_start();
// mendapatkan id_produk dari url
$id_produk = $_GET['id'];

//jika ada produk dikeranjang produk+1
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu belum ada di keranjang, mk diangap beli 1
else
{
    $_SESSION['keranjang'][$id_produk] = 1;
}


//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//dipindah ke keranjang
echo "<script>alert('produk telah disimpan di keranjang');</script>";
echo "<script>location='keranjang.php'</script>";
?>