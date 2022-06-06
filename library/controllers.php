<?php
include '../config/database.php';

class oop{
	function simpan($table, array $field, $redirect){
		include '../config/database.php';
		$sql = "INSERT INTO $table SET";
		foreach ($field as $key  => $value){
			$sql.=" $key = '$value',"; 
		}
		$sql = rtrim($sql, ',');
		$jalan = mysqli_query($konek, $sql);
		if ($jalan) {
			echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
		}else{
			echo mysqli_error();
		}
	}

	function tampil($table){
		include '../config/database.php';
		$tampil = mysqli_query($konek, "SELECT * FROM $table");
		while($data = mysqli_fetch_array($tampil))
			$isi[] = $data;
		return @$isi;
	}

	function hapus($table, $where, $redirect){
		include '../config/database.php';
		$jalan = mysqli_query($konek, "DELETE FROM $table WHERE $where");
		if ($jalan) {
			echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
		}else{
			echo mysqli_error();
		}
	}

	function edit($table, $where){
		include '../config/database.php';
		$jalan = mysqli_query($konek, "SELECT * FROM $table WHERE $where");
		$tampil = mysqli_fetch_array($jalan);
		return $tampil;
	}

	function ubah($table, array $field, $where, $redirect){
		include '../config/database.php';
		$sql = "UPDATE $table SET";
		foreach ($field as $key => $value){
			$sql.=" $key = '$value',";
		}
		$sql = rtrim($sql, ',');
		$sql.="WHERE $where";
		$jalan = mysqli_query($konek, $sql);
		if ($jalan) {
			echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
		}
	}

	function upload($foto, $tempat) {
		$alamat = $foto['tmp_name'];
		$namafile = $foto['name'];
		move_uploaded_file($alamat, "$tempat/$namafile");
		return $namafile;
	}

	function login($table, $username, $password, $nama_form){
		include '../config/database.php';
		@session_start();

		$jalan = mysqli_query($konek, "SELECT * FROM $table WHERE username = '$username' and password = '$password'");
		$tampil = mysqli_fetch_array($jalan);
		if (mysqli_num_rows($jalan) > 0) {
			$_SESSION['username'] = $username;
			echo "<script>alert('Login Berhasil');document.location.href='$nama_form'</script>";
		}else{
			echo "<script>alert('Login gagal cek username dan password !!');</script>";
		}
	}
}

?>