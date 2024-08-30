<!-- Navbar-->

<Section class="navbar navbar-default" id="header">
    <h1>RDH</h1>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <!--jika sudak login maka keluar session pelanggan -->
            <?php if (isset($_SESSION["pelanggan"])):?>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
            <!--selain itu/blm login tidak ada session pelanggan-->   
            <?php else:?>
                <li><a href="login.php">Login</a></li>
                <li><a href="daftar.php">Daftar</a></li>
            <?php endif?>
            <li><a href="checkout.php">Checkout</a></li>
            
        </ul>  
</section>
<!--

class="navbar navbar-default"

class="container"

class="nav navbar-nav"
-->