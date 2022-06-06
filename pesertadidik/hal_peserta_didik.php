<?php

@session_start();

include '../config/database.php';
include '../library/controllers.php';

$perintah = new oop();

$perintah->tampil("tbl_siswa WHERE nis = '$_SESSION[username]'");
if (empty($_SESSION['username'])) {
	echo "<script>alert('Silahkan Login Terlebih Dahulu');document.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Absen Halaman Peserta Didik</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
</head>
<body>
	<div id="utama">
		<ul class="menu">
			<li><a href="home.php?menu=home">Home</a></li>
			<li><a href="#">Data Diri</a>
				<ul>
					<li><a href="lihat_data.php?menu=lihat_data">Lihat</a></li>
					<li><a href="edit_data_diri.php?menu=edit_data&nis=<?php echo $_SESSION['username']; ?>">Edit</a></li>
				</ul>
			</li>
			<li><a href="#">Laporan</a>
				<ul>
					<li><a target="_blank" href="laporan_today.php?menu=laporan&nis=<?php echo $_SESSION['username']?>">Lihat</a></li>
				</ul>
			</li>
			<li><a href="logout.php" onclick="return confirm('Anda Yakin Ingin Keluar ?')">Keluar</a></li>
		</ul>
		<div class="konten">
			<?php
			switch (@$_GET['menu']) {
				case 'home':
					include 'home.php';
					break;
				
				case 'lihat_data':
					include 'lihat_data.php';
					break;
				
				case 'edit_data':
					include 'edit_data.php';
					break;
				
			}
			?>
		</div>
	</div>
</body>
</html>