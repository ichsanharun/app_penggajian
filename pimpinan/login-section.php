<?php

include ('../koneksi/koneksi.php');

$id = $_POST['userid'];
$password = $_POST['password'];
  $query = mysqli_query($mysqli, "SELECT * FROM pimpinan WHERE id_pimpinan = '$id' AND password_pimpinan='$password'");
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
    $_SESSION['id'] = $row['id_pimpinan'];
    $_SESSION['nama']= $row['nama_pimpinan'];
    $_SESSION['hak'] = "pimpinan";
    header('location:index.php');
  }




?>
