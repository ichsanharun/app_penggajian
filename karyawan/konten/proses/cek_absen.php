<?php
include '../../../koneksi/koneksi.php';
session_start();

//$waktu_pemesanan = $_POST['waktu'];
$tanggal_absensi = date("Y-m-d");
$waktu_absensi = date("H:i:s");
$js = date("H");
$ms = date("i");
$ds = date("s");
$sj = $js - 8;
$ketelatan = $sj*60+$ms;
if ($ketelatan == 0) {
	$keterangan = "Tepat Waktu";
}
else {
	$keterangan = "Telat ".$ketelatan." Menit.";
}

$id = $_SESSION['id'];
	$queryabsen = "SELECT * FROM `absensi` INNER JOIN `karyawan` ON `absensi`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `absensi`.`id_karyawan` = '$id' AND `absensi`.`tanggal_absensi` = '$tanggal_absensi'";
$sql_absensi = mysqli_query($mysqli,$queryabsen);

if (!empty($_POST['absensi'])) {
	$absensi = $_POST['absensi'];
	if (mysqli_num_rows($sql_absensi) > 0) {
		$queryupdate_absensi = "UPDATE absensi SET
				kehadiran = 'Hadir'
				WHERE id_karyawan = '$id' AND tanggal_absensi = '$tanggal_absensi';
			";
	}
	else{
		$queryupdate_absensi = "INSERT INTO absensi
			(
				id_karyawan,
				tanggal_absensi,
				waktu_masuk,
				kehadiran,
				keterangan
			)
			VALUES
			(
				'$id',
				'$tanggal_absensi',
				'$waktu_absensi',
				'Hadir',
				'$keterangan'
			)
			";
	}
}
else {
	$keluar = $_POST['keluar'];
	if (mysqli_num_rows($sql_absensi) > 0) {
		$queryupdate_absensi = "UPDATE absensi SET
				waktu_keluar = '$waktu_absensi'
				WHERE id_karyawan = '$id' AND tanggal_absensi = '$tanggal_absensi';
			";
	}
	else{
		?>
			<script>
				alert('Silahkan melakukan absen masuk terlebih dahulu!');
				window.location.href="../../index.php?p=d_absensi";
			</script>
		<?php
	}
}



if ($sqlupdate_absensi = mysqli_query($mysqli,$queryupdate_absensi)) {

			?>
        <script>
          alert('Data Berhasil Disimpan!');
          window.location.href="../../index.php?p=d_absensi";
        </script>
      <?php

}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=beranda";
  </script>
  <?php
}
