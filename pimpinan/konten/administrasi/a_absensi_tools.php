
<?php

$id = $_GET['id'];
$periode = $_GET['periode'];
$query_dabsensi = "SELECT * FROM absensi WHERE id_karyawan = '$id' AND tanggal_absensi = '$periode'";
$sql_dabsensi = mysqli_query($mysqli,$query_dabsensi);
  ?>
  <a href="index.php?p=d_administrasi&k=a_absensi" class="btn btn-default"><i class="fa fa-fw fa-arrow-circle-left" style="color:#000"></i>Kembali</a>
      <table id="tbl">
        <tr>
            <th>Tanggal Absensi</th>
            <th>Kehadiran</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($sql_dabsensi as $key) {
          extract($key);?>
        <tr>
          <th><?php echo $tanggal_absensi; ?></th>
          <th><?php echo $kehadiran; ?></th>
          <th><?php echo $waktu_masuk; ?> Masuk</th>
          <th><?php echo $waktu_keluar; ?> Keluar</th>
          <th><?php echo $keterangan; ?></th>
        </tr>
        <?php } ?>
      </table>
