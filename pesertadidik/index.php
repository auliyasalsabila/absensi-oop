<?php

@session_start();
include '../config/database.php';
include '../library/controllers.php';
if (isset($_POST['login'])) {
		$username = @$_POST['username'];
		$jalan = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE nis='$_POST[user]'");
		$tampil = mysqli_fetch_array($jalan);
		$nama = @$b['nama'];
	if (mysqli_num_rows($jalan) > 0) {
		if ($_POST['pass'] == $_POST['user']) {
			$_SESSION['username'] = $_POST['user'];
			$_SESSION['password'] = $_POST['pass'];
			echo "<script>alert('Selamat Datang $nama');document.location.href='hal_peserta_didik.php?menu=home'</script>";
		}else{
			echo "<script>alert('Username dan Password Tidak Sama !!');document.location.href='index.php'</script>";
		}
	}
}

if (isset($_POST['batal'])) {
	echo "<script>document.location.href='../'</script>";
}

?>

<title>Login</title>
<form method="post">
	<table align="center">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="user"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="login" value="LOGIN">
				<input type="submit" name="batal" value="BATAL">
			</td>
		</tr>
	</table>
</form>

