<h2>Data Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>email</th>
            <th>password</th>
            <th>nama</th>
            <th>no.telp</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM pelanggan");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah ['email_pelanggan'];?></td>
            <td><?php echo $pecah ['password_pelanggan'];?></td>
            <td><?php echo $pecah ['nama_pelanggan'];?></td>
            <td><?php echo $pecah ['telepon_pelanggan'];?></td>
            <td>
                <a href="" class="btn-danger btn">Hapus</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>
<a href="index.php?halaman=tambahpel" class="btn btn-primary">Tambah Data</a>