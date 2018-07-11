<?php
$query_karyawan = "SELECT * FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` order by id_karyawan asc";
$sql_karyawan = mysqli_query($mysqli,$query_karyawan);

$queryslip_karyawan = "SELECT id_karyawan,nama_karyawan,nama_jabatan FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` order by id_karyawan asc";
$sqlslip_karyawan = mysqli_query($mysqli,$queryslip_karyawan);


$query_pimpinan = "SELECT * FROM pimpinan";
$sql_pimpinan = mysqli_query($mysqli,$query_pimpinan);



$query_admin = "SELECT * FROM admin";
$sql_admin = mysqli_query($mysqli,$query_admin);

$query_jabatan = "SELECT * FROM jabatan";
$sql_jabatan = mysqli_query($mysqli,$query_jabatan);
if (!empty($_GET['idjab'])) {
  $idjab = $_GET['idjab'];
  $queryedit_jabatan = "SELECT * FROM jabatan WHERE id_jabatan = '$idjab' order by id_jabatan asc";
  $sqledit_jabatan = $mysqli->query($queryedit_jabatan);
}

$query_keluhan = "SELECT * FROM keluhan";
$sql_keluhan = mysqli_query($mysqli,$query_keluhan);
if (!empty($_GET['kel']) ) {
  $id_keluh = $_GET['kel'];
  $querydetail_keluhan = "SELECT * FROM keluhan WHERE ID = '$id_keluh'";
  $sqldetail_keluhan = mysqli_query($mysqli,$querydetail_keluhan);
}
$query_penggajian = "SELECT * FROM slip_gaji INNER JOIN karyawan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan`";
$sql_penggajian = mysqli_query($mysqli,$query_penggajian);

if ((!empty($_GET['id'])) OR (!empty($_POST['id_karyawan']))) {
  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
  }
  elseif (!empty($_POST['id_karyawan'])) {
    $id = $_POST['id_karyawan'];
  }
  $queryedit_karyawan = "SELECT * FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` WHERE `karyawan`.`id_karyawan` = '$id' order by id_karyawan asc";
  $sqledit_karyawan = $mysqli->query($queryedit_karyawan);
  $queryedit_pimpinan = "SELECT * FROM pimpinan WHERE id_pimpinan = '$id' order by id_pimpinan asc";
  $sqledit_pimpinan = $mysqli->query($queryedit_pimpinan);
}


  if (!empty($_GET['id_adm'])) {
    $id = $_GET['id_adm'];
    $queryedit_admin = "SELECT * FROM admin WHERE id_admin = '$id' order by id_admin asc";
    $sqledit_admin = $mysqli->query($queryedit_admin);
  }



$queryabsen = "SELECT * FROM `absensi` INNER JOIN `karyawan` ON `absensi`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `absensi`.`tanggal_absensi` like '%-06-%'";
$sql_absensi = mysqli_query($mysqli,$queryabsen);
?>
