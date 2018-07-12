<?php

include ('../koneksi/koneksi.php');

$id = $_POST['userid'];
$password = $_POST['password'];

  $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin = '$id' AND password_admin='$password'");


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
    $_SESSION['id'] = $row['id_admin'];
    $_SESSION['nama']= $row['nama_admin'];
    $_SESSION['hak'] = "admin";
    header('location:index.php');

}


?>
