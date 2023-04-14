<h2>Ubah Status</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>
<form method="post">
	<div class="form-group">
		<label>Status Pengiriman</label>
		<input type="text" name="pembelian" value=" <?php echo $pecah['status_pembelian'];?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah Status</button>
</form>

<?php 
if (isset($_POST['ubah']))
{
	$koneksi->query("UPDATE pembelian SET status_pembelian='$_POST[pembelian]' WHERE id_pembelian='$_GET[id]'");
	echo "<script>alert('status sudah diubah');</script>";
	echo "<script>location='index.php?halaman=pengiriman';</script>";


}



?>