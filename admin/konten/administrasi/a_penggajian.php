<?php
$tunjangan_bpjs = 0;
$tunjangan_konsumsi = 0;
$tunjangan_transport = 0;
$tunjangan_keluarga = 0;
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


 ?>
<form method="post" action="konten/proses/a_penggajian_aksi.php">
<table id="tbl" width="100%">
  <tr>
    <th>No.</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Opsi</th>

  </tr>

  <tr>
    <th colspan="5">Karyawan</th>
  </tr>
<?php
$querycari_gaji = "SELECT * FROM karyawan INNER JOIN jabatan INNER JOIN slip_gaji ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` AND `karyawan`.`id_karyawan` = `slip_gaji`.`id_karyawan` WHERE `slip_gaji`.`periode` = '$periode' order by `slip_gaji`.`id_karyawan` asc";
$sqlcari_gaji = mysqli_query($mysqli,$querycari_gaji);
if (mysqli_num_rows($sqlcari_gaji) > 0) {
  $sql_slip = mysqli_query($mysqli,$querycari_gaji);
  $tipe_aksi="Update";
}else {
  $queryslip = "SELECT * FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` order by id_karyawan asc";
  $sql_slip = mysqli_query($mysqli,$queryslip);
  $tipe_aksi="Insert";
}
$no1 = 0;
foreach ($sql_slip as $key) {
  extract($key);
  $querytunjangan = "SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'";
  $sql_tunjangan = mysqli_query($mysqli,$querytunjangan);
  $tunjangan = $sql_tunjangan->fetch_array();
$no1++;
?>
<tr text-align="center">
  <td><?php echo $no1; ?></td>
  <td><?php echo $id_karyawan; ?></td>
  <td><?php echo $nama_karyawan; ?></td>
  <td><?php echo $nama_jabatan; ?></td>
  <td>
    <input type="hidden" name="gaji[<?php echo $id_karyawan; ?>][id_jabatan]" value="<?php echo $id_jabatan; ?>">
    <input type="checkbox" name="gaji[<?php echo $id_karyawan; ?>][tunjangan_bpjs]" value="<?php echo $tunjangan['tunjangan_bpjs']; ?>" <?php if ($tipe_aksi == "Update" AND $tunjangan_bpjs != 0 ) {echo "checked";}else {} ?>>Tunjangan BPJS<br>
    <input type="checkbox" name="gaji[<?php echo $id_karyawan; ?>][tunjangan_konsumsi]" value="<?php echo $tunjangan['tunjangan_konsumsi']; ?>" <?php if ($tipe_aksi == "Update" AND $tunjangan_konsumsi != 0 ) {echo "checked";}else {} ?>>Tunjangan Konsumsi<br>
    <input type="checkbox" name="gaji[<?php echo $id_karyawan; ?>][tunjangan_transport]" value="<?php echo $tunjangan['tunjangan_transport']; ?>" <?php if ($tipe_aksi == "Update" AND $tunjangan_transport != 0 ) {echo "checked";}else {} ?>>Tunjangan Transportasi<br>
    <input type="checkbox" name="gaji[<?php echo $id_karyawan; ?>][tunjangan_keluarga]" value="<?php echo $tunjangan['tunjangan_keluarga']; ?>" <?php if ($tipe_aksi == "Update" AND $tunjangan_keluarga != 0 ) {echo "checked";}else {} ?>>Tunjangan Keluarga<br>
    <input type="hidden" name="gaji[<?php echo $id_karyawan; ?>][gaji_pokok]" value="<?php echo $gaji_pokok; ?>">
    Potongan<input type="number" name="gaji[<?php echo $id_karyawan; ?>][potongan_gaji]" value="<?php if ($potongan_gaji != 0 AND $tipe_aksi == "Update") {echo $potongan_gaji;}else {echo "0";} ?>">
  </td>
</tr>
<?php } ?>
  <input type="hidden" name="periode" value="<?php echo $periode; ?>">
  <input type="hidden" name="tipe_aksi" value="<?php echo $tipe_aksi; ?>">
</table><hr>
<button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save" style="color:green"></i>Simpan</button>
</form>
<?php } ?>
