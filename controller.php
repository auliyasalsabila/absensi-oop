<?php
	class oop {
		function simpan($c, $table, array $field, $redirect) {
			$sqli = "INSERT INTO $table SET";
			foreach ($field as $key => $value) {
				$sqli.=" $key = '$value',";
			}
			$sqli = rtrim($sqli, ',');
			$jalan = mysqli_query($c, $sqli);
			if ($jalan) {
				echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysqli_error();
			}
		}
		function tampil ($c, $table) {
			$sqli = "SELECT * FROM $table";
			$tampil = mysqli_query($c, $sqli);
			while ($data = mysqli_fetch_array ($tampil)) 
				$isi[] = $data;
			return $isi;
		}
		function hapus ($c, $table, $where, $redirect) {
			$sqli = "DELETE FROM $table WHERE $where";
			$jalan = mysqli_query($c, $sqli);
			if ($jalan) {
				echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysqli_error();
			}
		}
		function edit ($c, $table, $where) {
			$sqli = "SELECT * FROM $table WHERE $where";
			$jalan = mysqli_fetch_array(mysqli_query($c, $sqli));
			return $jalan;	
		}
		function ubah ($c, $table, array $field, $where, $redirect) {
			$sqli = "UPDATE $table SET";
			foreach ($field as $key => $value) {
				$sqli.=" $key = '$value',";
			}
			$sqli = rtrim($sqli, ',');
			$sqli.= "WHERE $where";
			$jalan = mysqli_query($c, $sqli);
			if ($jalan) {
				echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysqli_error();
			}
		}
		function upload($foto, $tempat) {
			$alamat = $foto['tmp_name'];
			$namafile = $foto['name'];
			move_uploaded_file($alamat, $tempat.'/'.$namafile);
			return $namafile;
		}

		function login ($c, $table, $username, $password, $nama_form) {
			@session_start();
			$sqli = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
			$jalan = mysqli_query($c, $sqli);
			$tampil = mysqli_fetch_array($jalan);
			$cek = mysqli_num_rows($jalan);
			if ($cek > 0) {
				// session_register($tampil[username]);
				// session_register($tampil[password]);
				$_SESSION['username'] = $username;
				echo "<script>alert('berhasil');document.location.href='$nama_form'</script>";
			} else {
				echo "<script>alert('Login gagal, cek kembali username dan password !!!');</script>";
			}
		}
	}
?>