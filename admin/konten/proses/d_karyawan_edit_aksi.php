<?php
include '../../../koneksi/koneksi.php';
$tipe_edit = $_POST['tipe_edit'];
$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$email_karyawan = $_POST['email_karyawan'];
$tempat_lahir_karyawan = $_POST['tempat_lahir_karyawan'];
$tanggal_lahir_karyawan = $_POST['tanggal_lahir_karyawan'];
$agama_karyawan = $_POST['agama_karyawan'];
$alamat_karyawan = $_POST['alamat_karyawan'];
$jk_karyawan = $_POST['jk_karyawan'];
$id_jabatan = $_POST['id_jabatan'];

if (
  !empty($id_karyawan) AND
  !empty($nama_karyawan) AND
  !empty($email_karyawan) AND
  !empty($tempat_lahir_karyawan) AND
  !empty($tanggal_lahir_karyawan) AND
  !empty($agama_karyawan) AND
  !empty($alamat_karyawan) AND
  !empty($jk_karyawan) AND
  !empty($id_jabatan)
) {
    if ($tipe_edit == 'edit') {

      $queryupdate_karyawan = "UPDATE karyawan SET
        nama_karyawan = '$nama_karyawan',
        email_karyawan = '$email_karyawan',
        tempat_lahir_karyawan = '$tempat_lahir_karyawan',
        tanggal_lahir_karyawan = '$tanggal_lahir_karyawan',
        alamat_karyawan = '$alamat_karyawan',
        agama_karyawan = '$agama_karyawan',
        jk_karyawan = '$jk_karyawan',
        id_jabatan = '$id_jabatan' WHERE id_karyawan = '$id_karyawan'";
      $sqlupdate_karyawan = $mysqli->query($queryupdate_karyawan);
      ?>
        <script>
          alert('Data Berhasil Disimpan!');
          window.location.href="../../index.php?p=d_karyawan";
        </script>
      <?php
    }
    elseif ($tipe_edit == 'tambah') {
      $queryinsert_karyawan = "INSERT INTO karyawan
      (
        id_karyawan,
        nama_karyawan,
        email_karyawan,
        tempat_lahir_karyawan,
        tanggal_lahir_karyawan,
        agama_karyawan,
        alamat_karyawan,
        password_karyawan,
        jk_karyawan,
        id_jabatan
      )
      VALUES
      (
        '$id_karyawan',
        '$nama_karyawan',
        '$email_karyawan',
        '$tempat_lahir_karyawan',
        '$tanggal_lahir_karyawan',
        '$agama_karyawan',
        '$alamat_karyawan',
        '$tanggal_lahir_karyawan',
        '$jk_karyawan',
        '$id_jabatan'
      )
      ";
      $sqlinsert_karyawan = mysqli_query($mysqli,$queryinsert_karyawan);
      ?>
        <script>
          alert('Data Berhasil Disimpan!');
          window.location.href="../../index.php?p=d_karyawan";
        </script>
      <?php
    }

}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=d_karyawan";
  </script>
  <?php
}

?>
