<?php
include '../../../koneksi/koneksi.php';
session_start();
$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$email_karyawan = $_POST['email_karyawan'];
$tempat_lahir_karyawan = $_POST['tempat_lahir_karyawan'];
$tanggal_lahir_karyawan = $_POST['tanggal_lahir_karyawan'];
$agama_karyawan = $_POST['agama_karyawan'];
$alamat_karyawan = $_POST['alamat_karyawan'];
$jk_karyawan = $_POST['jk_karyawan'];
$password_karyawan = $_POST['password_karyawan'];
$konfirmasi_password_karyawan = $_POST['konfirmasi_password_karyawan'];

if (
  !empty($id_karyawan) AND
  !empty($nama_karyawan) AND
  !empty($email_karyawan) AND
  !empty($tempat_lahir_karyawan) AND
  !empty($tanggal_lahir_karyawan) AND
  !empty($agama_karyawan) AND
  !empty($alamat_karyawan) AND
  !empty($jk_karyawan)
) {
  $ekstensi_diperbolehkan	= array('png','jpg');
  $nama = $_FILES['foto_karyawan']['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['foto_karyawan']['size'];
  $file_tmp = $_FILES['foto_karyawan']['tmp_name'];
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1044070){
      move_uploaded_file($file_tmp, '../../img/karyawan/'.$nama);

    if ($password_karyawan == $konfirmasi_password_karyawan) {

      $queryupdate_karyawan = "UPDATE karyawan SET
        nama_karyawan = '$nama_karyawan',
        email_karyawan = '$email_karyawan',
        tempat_lahir_karyawan = '$tempat_lahir_karyawan',
        tanggal_lahir_karyawan = '$tanggal_lahir_karyawan',
        alamat_karyawan = '$alamat_karyawan',
        agama_karyawan = '$agama_karyawan',
        jk_karyawan = '$jk_karyawan',
        password_karyawan = '$password_karyawan' WHERE id_karyawan = '$id_karyawan'";
      $sqlupdate_karyawan = $mysqli->query($queryupdate_karyawan);
      if ($sqlupdate_karyawan = $mysqli->query($queryupdate_karyawan)) {
        ?>
        <script>
        alert('Data Berhasil Disimpan!');
        window.location.href="../../index.php?p=d_administrasi&k=a_ubah_profil&id=<?php echo $_SESSION['id']; ?>";
        </script>
        <?php
      }
    }
    else {
      ?>
        <script>
          alert('Mohon masukkan password dengan benar!');
          window.location.href="../../index.php?p=d_administrasi&k=a_ubah_profil&id=<?php echo $_SESSION['id']; ?>";
        </script>
      <?php
    }
  }
  else{
    ?>
      <script>
        alert('UKURAN FILE TERLALU BESAR!');
        window.location.href="../../index.php?p=d_karyawan";
      </script>
    <?php
  }
}
else{
  ?>
    <script>
      alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!');
      window.location.href="../../index.php?p=d_karyawan";
    </script>
  <?php
}

}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=d_administrasi&k=a_ubah_profil&id=<?php echo $_SESSION['id']; ?>";
  </script>
  <?php
}

?>
