<?php

@session_start();

include '../config/database.php';
include '../library/controllers.php';

$perintah = new oop;

$perintah->tampil("tbl_user WHERE username = '$_SESSION[username]'");

if (empty($_SESSION['username'])) {
	echo "<script>alert('Silahkan login terlebih dahulu');document.location.href='index.php'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ABSEN</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
</head>
<body>
		<div id="utama">
		<ul class="menu">
			<li><a href="home.php?menu=home">Home</a></li>
			<li><a href="#">Input</a>
				<ul>
					<li><a href="siswa.php?menu=siswa">Siswa</a></li>
					<li><a href="rayon.php?menu=rayon">Rayon</a></li>
					<li><a href="rombel.php?menu=rombel">Rombel</a></li>
				</ul>
			</li>
			<li><a href="#">Absensi</a>
				<ul>
					<li><a href="absen.php?menu=absen">Absen</a></li>
					<li><a href="absensi_ubah.php?menu=ubahabsen">Ubah Absen</a></li>
				</ul>
			</li>
			<li><a href="laporan.php?menu=laporan">Laporan</a></li>
			<li><a href="logout.php" onclick="return confirm('Anda Yakin Ingin Keluar ?')">Keluar</a></li>
		</ul>
		<div class="konten">
			<?php
			switch ($_GET) {
				case "home":
					include "home.php";
					break;
				
				case "siswa":
					include "siswa.php";
					break;
				
				case "rombel":
					include "rombel.php";
					break;
				
				case "rayon":
					include "rayon.php";
					break;
				
				case "absen":
					include "absen.php";
					break;
				
				case "ubahabsen":
					include "absensi_ubah.php";
					break;
				
				case "laporan":
					include "laporan.php";
					break;
			}
			?>
		</div>
	</div>
</body>
</html>