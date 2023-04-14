<h2>Data Retur</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>jumlah</th>
			<th>No Resi</th>
            <th>Tanggal</th>
			<th>Bukti</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1  ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pengembalian");  ?>
		<?php while($pecah =$ambil->fetch_assoc()){ ?>
		<tr>
			<td> <?php echo $nomor;?> </td>
			<td> <?php echo $pecah['nama_pengembalian']; ?></td>
			<td> <?php echo $pecah['jumlah_pengembalian']; ?></td>
			<td> <?php echo $pecah['resi_pengembalian']; ?></td>
            <td> <?php echo $pecah['tanggal_pengembalian']; ?></td>
			<td>
				<img src="../<?php echo $pecah['bukti_pengembalian'];  ?>" width="100">
			</td>
			
			
		
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
