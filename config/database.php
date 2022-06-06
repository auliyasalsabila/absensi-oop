<?php
	$konek = mysqli_connect("localhost", "root", "", "db_absensi");
	if (mysqli_connect_errno()) {
	echo "Koneksi Gagal " . mysqli_connect_errno();
	}

?> 