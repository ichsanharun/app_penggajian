<?php
include '../../../koneksi/koneksi.php';
session_start();
if (isset($_POST['acc'])) {
  $acc = $_POST['acc'];
  $periode = $_POST['periode'];
  foreach ($acc as $key => $value) {
    $querysimpan_penggajian = "UPDATE slip_gaji SET keterangan = 'Disetujui' WHERE periode = '$periode' AND id_karyawan = '$key'";
    $sqlsimpan_penggajian = $mysqli->query($querysimpan_penggajian);
  }
  ?>
    <script>
      alert('Data Berhasil Disimpan!');
      window.location.href="../../index.php?p=d_administrasi&k=a_penggajian";
    </script>
  <?php
}
else {
  $periode = $_POST['periode'];
  $querysimpan_penggajian = "UPDATE slip_gaji SET keterangan = 'Disetujui' WHERE periode = '$periode'";
  $sqlsimpan_penggajian = $mysqli->query($querysimpan_penggajian);
  ?>
    <script>
      alert('Data Berhasil Disimpan!');
      window.location.href="../../index.php?p=d_administrasi&k=a_penggajian";
    </script>
  <?php
}
