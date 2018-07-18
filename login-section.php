<?php

include ('koneksi/koneksi.php');

$id = $_POST['userid'];
$password = $_POST['password'];
if (!empty($id) AND !empty($password)) {

  $query = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id_karyawan = '$id' AND password_karyawan='$password'");

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
    session_start();
    $_SESSION['id'] = $row['id_karyawan'];
    $_SESSION['nama']= $row['nama_karyawan'];
    $_SESSION['hak'] = "karyawan";
    header('location:karyawan/index.php');
}
}
else {
  ?>
  <script>
  alert('Data tidak boleh kosong!');
  window.location.href="index.php?p=login";
  </script>
  <?php
}

?>
