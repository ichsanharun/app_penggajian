<?php
include '../../../koneksi/koneksi.php';

$id_karyawan = $_POST['id_karyawan'];
$perihal_keluhan = $_POST['perihal_keluhan'];
$keluhan = $_POST['keluhan'];
$tanggal_keluhan = date("Y-m-d");


if (
  !empty($id_karyawan) AND
  !empty($perihal_keluhan) AND
  !empty($keluhan)
) {

      $queryinsert_keluhan = "INSERT INTO keluhan
      (
        id_karyawan,
        perihal_keluhan,
        tanggal_keluhan,
        keluhan
      )
      VALUES
      (
        '$id_karyawan',
        '$perihal_keluhan',
        '$tanggal_keluhan',
        '$keluhan'
      )
        ";
      $sqlinsert_keluhan = $mysqli->query($queryinsert_keluhan);
      ?>
        <script>
          alert('Data Berhasil Disimpan!');
          window.location.href="../../index.php?p=d_administrasi";
        </script>
      <?php


}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=d_administrasi";
  </script>
  <?php
}

?>
