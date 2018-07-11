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
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=d_administrasi&k=a_ubah_profil&id=<?php echo $_SESSION['id']; ?>";
  </script>
  <?php
}

?>
