<?php

include ('koneksi/koneksi.php');

$id = $_POST['userid'];
$password = $_POST['password'];
$akses = $_POST['akses'];
if ($akses == 'admin') {
  $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin = '$id' AND password_admin='$password'");
}
elseif ($akses == 'karyawan') {
  $query = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id_karyawan = '$id' AND password_karyawan='$password'");
}
elseif ($akses == 'pimpinan') {
  $query = mysqli_query($mysqli, "SELECT * FROM pimpinan WHERE id_pimpinan = '$id' AND password_pimpinan='$password'");
}
else{
  ?>
  <script>
  alert('Anda harus mengisi data dengan benar !');
  window.location.href="index.php?p=login";
  </script>
  <?php
}

$ceklogin=mysqli_num_rows($query);
if ($ceklogin == 0) {
  ?>
  <script>
  alert('Data yang anda masukkan SALAH! Coba lagi!');
  window.location.href="index.php?p=login";
  </script>
  <?php
}
else{
  $row = $query->fetch_array();
  if ($akses == 'admin') {
    session_start();
    $_SESSION['id'] = $row['id_admin'];
    $_SESSION['nama']= $row['nama_admin'];
    $_SESSION['hak'] = "admin";
    header('location:admin/index.php');
  }
  elseif ($akses == 'karyawan') {
    session_start();
    $_SESSION['id'] = $row['id_karyawan'];
    $_SESSION['nama']= $row['nama_karyawan'];
    $_SESSION['hak'] = "karyawan";
    header('location:karyawan/index.php');
  }
  elseif ($akses == 'pimpinan') {
    session_start();
    $_SESSION['id'] = $row['id_pimpinan'];
    $_SESSION['nama']= $row['nama_pimpinan'];
    $_SESSION['hak'] = "pimpinan";
    header('location:pimpinan/index.php');
  }
  else {
    ?>
    <script>
    alert('Kesalahan pada Database! Hubungi DBA?Programmer Untuk Fixasi!');
    window.location.href="index.php?p=login";
    </script>
    <?php
  }
}


?>
