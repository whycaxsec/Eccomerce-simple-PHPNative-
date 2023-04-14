
<h2>Daftar Pengiriman</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Pembelian</th>
			<th>Total Pembelian</th>
			<th>Status Belanja</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian. id_pelanggan=pelanggan.id_pelanggan ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_pelanggan']?></td>
			<td><?php echo date("d F Y", strtotime($pecah['tanggal_pembelian']))?></td>
			<td>Rp. <?php echo number_format($pecah['total_pembelian'])?></td>
			<td><?php echo $pecah['status_pembelian']?></td>
			<td>
            <a href="index.php?halaman=ubahpengiriman&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-danger btn-sm">Ubah</a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>

