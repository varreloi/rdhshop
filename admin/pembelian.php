<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama_pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Alamat Pengeriman</th>
            <th>Total</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
        ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_pelanggan'];?></td>
            <td><?php echo $pecah['tanggal_pembelian'];?></td>
            <td><?php echo $pecah['alamat_pengiriman'];?></td>
            <td><?php echo $pecah['total_pembelian'];?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-info">detail</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>