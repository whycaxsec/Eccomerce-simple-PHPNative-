<?php
session_start();
require('koneksi.php');
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pengembalian</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="log/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="log/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/css/util.css">
	<link rel="stylesheet" type="text/css" href="log/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php include 'menu.php';?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="admin/assets/img/logo.jpg" alt="IMG">
				</div>

				<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-11">
									<input type="text" class="form-control" name="nama_pengembalian" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Jumlah</label>
								<div class="col-md-11">
									<input type="jumlah" class="form-control" name="jumlah_pengembalian" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No Resi</label>
								<div class="col-md-11">
									<input type="text" class="form-control" name="resi_pengembalian" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Bukti</label>
								<div class="col-md-11">
                                <input type="file" class="form-control" name="bukti_pengembalian" >
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="kirim">Kirim</button>
								</div>
							</div>
						</form>
						<?php 
						if (isset($_POST["kirim"])) {
						 	//mengabil issiian forrmulir
						 	$nama_pengembalian = $_POST["nama_pengembalian"];
						 	$jumlah_pengembalian = $_POST["jumlah_pengembalian"];
						 	$resi_pengembalian = $_POST["resi_pengembalian"];
						 	$bukti_pengembalian = $_POST["bukti_pengembalian"];
							$tanggal_pengembalian = date("Y-m-d");

						 	

						 	//cek email sudah dgunakan aatau belum
						 	$ambil = $koneksi->query("SELECT * FROM  pengembalian WHERE resi_pengembalian='$resi_pengembalian'");
						 	$yangcocok = $ambil->num_rows;
						 	if ($yangcocok==1) {
						 		echo "<script>alert('No resi sudah digunakan');</script>";
						 		echo "<script>location='pengembalian.php';</script>";
						 	}
						 	else{
						 		$koneksi->query("INSERT INTO pengembalian
						 			(nama_pengembalian,jumlah_pengembalian,resi_pengembalian,bukti_pengembalian,tanggal_pengembalian)
						 			VALUES ('$nama_pengembalian','$jumlah_pengembalian','$resi_pengembalian','$bukti_pengembalian','$tanggal_pengembalian')");
						 		echo "<script>alert('retur sukses dikirim');</script>";
						 		echo "<script>location='index.php';</script>";
						 	}
						 } ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="log/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/bootstrap/js/popper.js"></script>
	<script src="log/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="log/js/main.js"></script>

</body>
</html>