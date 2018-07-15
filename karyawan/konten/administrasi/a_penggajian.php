<?php
  $periode = date("Y-m");
  $query_slipgaji = "SELECT * FROM slip_gaji INNER JOIN karyawan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `slip_gaji`.`periode` = '$periode' AND `slip_gaji`.`id_karyawan` = '$_SESSION[id]'";
  $sql_slipgaji = mysqli_query($mysqli,$query_slipgaji);
 ?>
<form action="konten/proses/a_penggajian_aksi.php" method="post">
<table id="tbl" width="100%">
  <tr>
    <th rowspan="2">No.</th>
    <th colspan="2">ID Karyawan</th>
    <th rowspan="2">Gaji Pokok</th>
    <th colspan="4">Tunjangan</th>
    <th rowspan="2">Gaji Bersih</th>
    <th rowspan="2">Opsi</th>
  </tr>
  <tr>
    <th>ID</th>
    <th>Nama Karyawan</th>
    <th>BPJS</th>
    <th>Konsumsi</th>
    <th>Transport</th>
    <th>Keluarga</th>
  </tr>
  <?php
  $no = 0;
  foreach ($sql_slipgaji as $key) {
    extract($key);
  $no++;
  ?>
  <tr text-align="center">
    <td><?php echo $no; ?></td>
    <td><?php echo $id_karyawan; ?></td>
    <td><?php echo $id_karyawan; ?></td>
    <td><?php echo $gaji_pokok; ?></td>
    <td><?php echo $tunjangan_bpjs; ?></td>
    <td><?php echo $tunjangan_konsumsi; ?></td>
    <td><?php echo $tunjangan_transport; ?></td>
    <td><?php echo $tunjangan_keluarga; ?></td>
    <td><?php echo $gaji_diterima; ?></td>
    <td>
      <?php if ($keterangan == 'Disetujui') {
        ?>
        <a href="konten/administrasi/cetak.php?data=slip&periode=<?php echo $periode; ?>" class="fa fa-fw fa-print" title="Cetak Laporan"></a>
        <?php
      }else {
        echo "Pending";
      } ?>

    </td>
  </tr>
<?php } ?>
</table>
</form>
