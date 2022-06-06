<?php
@session_start();
include '../config/database.php';
include '../library/controllers.php';

$jalan = mysqli_query($konek, "SELECT * FROM query_siswa WHERE nis = '$_SESSION[username]'");
$tampil = mysqli_fetch_array($jalan);

if (empty($_SESSION['username'])) {
	echo "<script>alert('Anda Belum Melakukan Login');document.location.href='index.php'</script>";
}

	if ($tampil['jk'] == "L") {
		$l = "checked";
	}else{
		$p = "checked";
	}
	$date = explode("-", $tampil['tgl_lahir']);
	$thn = $date[0];
	$bln = $date[1];
	$tgl = $date[2];

$perintah = new oop();
$table = "tbl_siswa";
$tanggal = @$_POST['thn'] . "-" . @$_POST['bln'] . "-" . @$_POST['tgl'];
$field = array('nama'=>@$_POST['nama'], 'jk'=>@$_POST['jk'], 'id_rayon'=>@$_POST['rayon'], 'id_rombel'=>@$_POST['rombel'], 'tgl_lahir'=>$tanggal);
@$where = "nis = $_GET[nis]";
$redirect = "?menu=lihat_data";

if (isset($_POST['ubah'])) {
	echo $perintah->ubah($table, $field, $where, $redirect);
}

?>
<a href="hal_peserta_didik.php">Kembali</a>
<title>Form Siswa</title>
<form method="post">
	<table align="center">
		<tr>
			<td></td>
			<td><img border="5" height="175" width="155" src="../foto/<?php echo $tampil['foto']; ?>"></td>
			<td></td>
		</tr>
	</table>
	<table align="center">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><?php echo @$tampil['nis']; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo @$tampil['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="L" <?php echo @$l; ?>>Laki-laki
			<input type="radio" name="jk" value="P" <?php echo @$p;?>>Perempuan
			</td>
		</tr>
		<tr>
			<td>Rayon</td>
			<td>:</td>
			<td>
				<select name="rayon">
					<option value="<?php echo @$tampil['id_rayon']; ?>"><?php echo @$tampil['rayon']; ?></option>
					<?php
					@session_start();
					include '../config/database.php';
					$E = mysqli_query($konek, "SELECT * FROM tbl_rayon");
					while ($r = mysqli_fetch_array($E)){
					?>
					<option value="<?php echo @$r[0]; ?>"><?php echo @$r[1]; ?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Rombel</td>
			<td>:</td>
			<td>
				<select name="rombel">
					<option value="<?php echo @$tampil['id_rombel']; ?>"><?php echo @$tampil['rombel']; ?></option>
					<?php
					@session_start();
					include '../config/database.php';
					$E = mysqli_query($konek, "SELECT * FROM tbl_rombel");
					while ($r = mysqli_fetch_array($E)){
					?>
					<option value="<?php echo @$r[0]; ?>"><?php echo @$r[1]; ?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
				<select name="tgl">
					<option value="<?php echo @$tgl; ?>"><?php echo @$tgl; ?></option>
					<option value="">-------</option>
					<?php
					for ($tgl=1; $tgl <=31; $tgl++) { 
						if ($tgl <= 9) {
					?>
						<option value="<?php echo "0" . @$tgl; ?>"><?php echo "0" . @$tgl; ?></option>
					<?php
						}else{
							;
							?>
						<option value="<?php echo @$tgl; ?>"><?php echo @$tgl; ?></option>
					<?php
						}
					}
					?>
				</select>
				<select name="bln">
					<option value="<?php echo @$bln; ?>"><?php echo @$bln; ?></option>
					<option value="">-------</option>
					<?php
					for ($bln=1; $bln <= 12; $bln++) { 
						if ($bln <= 9) {
							?>
							<option value="<?php echo "0" . @$bln; ?>"><?php echo "0" . @$bln; ?></option>
					<?php }else{ ?>
							<option value="<?php echo @$bln; ?>"><?php echo @$bln; ?></option>
					<?php	}
					}
					?>
				</select>
				<select name="thn">
					<option value="<?php echo @$thn; ?>"><?php echo @$thn; ?></option>
					<option value="">-------</option>
					<?php
					for ($thn=1990; $thn<=2012; $thn++){
					?>
					<option value="<?php echo @$thn; ?>"><?php echo @$thn; ?></option>
					<?php
					} 
						
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="ubah" value="Ubah">
			</td>
		</tr>
	</table>
	<br/>
</form>

