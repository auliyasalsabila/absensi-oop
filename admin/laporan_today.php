<?php
include '../config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Laporan Absen</title>
</head>
<body>
	<style type="text/css">
		.utama{
			margin: 0 auto;
			border: thin solid #000;
			width: 700px;
		}
		.print{
			margin: 0 auto;
			width: 700px;
		}
		a{
			text-decoration: none;
		}
	</style>
	<a href="#" target="_blank" onclick="document.getElementById('print').style.display='none';window.print();">
		<img src="../images/print-icon.png" id="print" width="25" height="25" border="0">
	</a>
	<div class="utama">
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top: 10px;">
			<tr>
				<td width="7%" rowspan="3" align="center" valign="top">
					<img src="../images/logo.png" width="55" height="55">
				</td>
				<td width="93%" valign="top"><strong>&nbsp;LAPORAN KEHADIRAN</strong></td>
			</tr>
			<tr>
				<td valign="top">&nbsp;SMK Wikrama Kota Bogor</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><hr></td>
			</tr>
		</table>
		<table cellspacing="1" align="center" border="1">
			<tr align="center">
				<td rowspan="2">No</td>
				<td rowspan="2" width="100">NIS</td>
				<td rowspan="2" width="150">Nama</td>
				<td rowspan="2" width="100">Rombel</td>
				<td colspan="4">Keterangan</td>
				<td rowspan="2" width="50">Bulan</td>
				<td rowspan="2">Lihat</td>
			</tr>
			<tr align="center">
				<td width="25">H</td>
				<td width="25">S</td>
				<td width="25">I</td>
				<td width="25">A</td>
			</tr>
			<?php
			include '../config/database.php';
			$jalan = mysqli_query($konek, "SELECT * FROM query_absen");
			$data = mysqli_fetch_array($jalan);
			$bulan_sekarang_db = $data['tgl_absen'];
			$ambil_bulan = substr($bulan_sekarang_db, 5, 2);
			$bulan_sekarang = date('Y-m-d');
			$bulan = substr($bulan_sekarang, 5, 2);

			if ($bulan == $ambil_bulan) {
				include '../config/database.php';
				@$sql = mysqli_query($konek, "SELECT SUM(hadir) AS hadir, SUM(sakit) AS sakit, SUM(ijin) AS izin, SUM(alpa) AS alpa, nis, nama, rombel, tgl_absen, id_rombel FROM query_absen WHERE id_rombel='$_GET[rombel]' GROUP BY nis");
			$no = 0;
			while ($r = mysqli_fetch_array($sql)){
				$no++;
			?>
			<tr align="center">
				<td><?php echo $no; ?></td>
				<td><?php echo $r['nis']; ?></td>
				<td><?php echo $r['nama']; ?></td>
				<td><?php echo $r['rombel']; ?></td>
				<td><?php echo $r['hadir']; ?></td>
				<td><?php echo $r['sakit']; ?></td>
				<td><?php echo $r['izin']; ?></td>
				<td><?php echo $r['alpa']; ?></td>
				<td><?php echo date('M'); ?></td>
				<td><a target="_blank" href="laporan_rombel_detil.php?rombel=<?php echo $r['id_rombel']; ?>&nis=<?php echo $r['nis']; ?>&tgl<?php echo $r['tgl_absen']; ?>">Detail</a></td>
			</tr>
			<?php
			}
			}
			?>
		</table>
		<br>
	</div>
</body>
<center><p>&copy; <?php echo date('Y'); ?> SMK WIKRAMA BOGOR</p></center>
</html>