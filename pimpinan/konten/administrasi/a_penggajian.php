<?php
if (!isset($_POST['periode'])) {
  ?>
  <form action="" method="post">
    <h3>Pilih Tanggal</h3>
    <select name="periode_bulan">
      <?php
      $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      $jlh_bln=count($bulan);
      for($c=0; $c<$jlh_bln; $c+=1){
        $b = $c+1;
        if ($b<10) {
          $b = "0".$b;
        }
        echo"<option value=$b> $bulan[$c] </option>";
      } ?>
    </select>
    <select name="periode_tahun">
      <?php
      $tahun_sekarang = date("Y");
      for($x=2000; $x<=$tahun_sekarang; $x+=1){
        if ($x == $tahun_sekarang) {
          echo"<option value=$x selected> $x </option>";
        }
        else {
          echo"<option value=$x> $x </option>";
        }
      } ?>
    </select>
    <button type="submit" name="periode" value="Cari">Cari</button>
  </form>
  <?php
}
else {
  $periode = $_POST['periode_tahun']."-".$_POST['periode_bulan'];
  $query_slipgaji = "SELECT * FROM slip_gaji INNER JOIN karyawan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `slip_gaji`.`periode` = '$periode'";
  $sql_slipgaji = mysqli_query($mysqli,$query_slipgaji);
 ?>
<form action="konten/proses/a_penggajian_aksi.php" method="post">
<table id="tbl" width="100%">
  <tr>
    <th rowspan="2">No.</th>
    <th colspan="2">ID Karyawan</th>
    <th rowspan="2">Jabatan</th>
    <th rowspan="2">Gaji Pokok</th>
    <th colspan="4">Tunjangan</th>
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
    <td><?php echo $id_jabatan; ?></td>
    <td><?php echo $gaji_pokok; ?></td>
    <td><?php echo $tunjangan_bpjs; ?></td>
    <td><?php echo $tunjangan_konsumsi; ?></td>
    <td><?php echo $tunjangan_transport; ?></td>
    <td><?php echo $tunjangan_keluarga; ?></td>
    <td>
      <?php if ($keterangan == 'Disetujui') {
        echo "Telah Disetujui";
      }else {
        ?><button type="submit" name="acc[<?php echo $id_karyawan ?>]" value="Disetujui" class="btn btn-default"><i class="fa fa-fw fa-check" style="color:#000"></i>Setujui</a>
         <input type="hidden" name="periode" value="<?php echo $periode; ?>" ><?php
      } ?>

    </td>
  </tr>
<?php } ?>
</table>
<button type="submit" name="acc_semua" value="Disetujui" class="btn btn-login"><i class="fa fa-fw fa-check" style="color:#000"></i>Setujui Semua</a>
</form>
<?php } ?>
