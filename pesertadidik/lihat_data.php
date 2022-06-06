<?php
@session_start();

include '../config/database.php';

$jalan = mysqli_query($konek, "SELECT * FROM query_siswa WHERE nis = '$_SESSION[username]'");
$tampil = mysqli_fetch_array($jalan);

if (empty($_SESSION['username'])) {
	echo "<script>alert('Anda Belum Melakukan Login');document.location.href='index.php'</script>";
}
?>

<title>Form Siswa</title>
<h1 align="center">Berikut Data Diri Anda : </h1>
<table align="center">
	<tr>
		<td></td>
		<td><img src="../foto/<?php echo $tampil['foto']; ?>" border="5" height="175" width="155"></td>
	</tr>
</table>
<table align="center">
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $tampil['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $tampil['nama']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $tampil['jk']; ?></td>
	</tr>
	<tr>
		<td>Rayon</td>
		<td>:</td>
		<td><?php echo $tampil['rayon']; ?></td>
	</tr>
	<tr>
		<td>Rombel</td>
		<td>:</td>
		<td><?php echo $tampil['rombel']; ?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?php echo $tampil['tgl_lahir']; ?></td>
	</tr>
</table>
<br/>