<div class="apps-content-item">
<?php

$aksi = $_GET['aksi'];
$hak = $_SESSION['hak'];
$query = "SELECT max(id_jabatan) as maxKode FROM jabatan";
$hasil = $mysqli->query($query);
$data  = mysqli_fetch_array($hasil);
$kodeTrans = $data['maxKode'];
$noUrut = (int) substr($kodeTrans, 3, 2);
$noUrut++;
$char = "JBT";
$id_kr = $char . sprintf("%02s", $noUrut);

if ($aksi == 'edit') {
  ?>
    <form action="konten/proses/a_jabatan_edit_aksi.php" method="post">
      <input type="hidden" name="tipe_edit" value="edit">
      <table id="tbl">
        <?php
        foreach ($sqledit_jabatan as $key) {
          extract($key);
          ?>
               <tr>
                   <th width="19%">ID Jabatan</th>
                   <td width="5%">:</td>
                   <td><input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>"><?php echo $id_jabatan; ?></td>
               </tr>

               <tr>
                   <th width="19%">Nama Jabatan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="nama_jabatan" value="<?php echo $nama_jabatan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Gaji Pokok</th>
                   <td width="5%">:</td>
                   <td><input type="number" name="gaji_pokok" value="<?php echo $gaji_pokok; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Tunjangan BPJS</th>
                   <td width="5%">:</td>
                   <td><input type="number" name="tunjangan_bpjs" value="<?php echo $tunjangan_bpjs; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Tunjangan Konsumsi</th>
                   <td width="5%">:</td>
                   <td><input type="number" name="tunjangan_konsumsi" value="<?php echo $tunjangan_konsumsi; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Tunjangan Keluarga</th>
                   <td width="5%">:</td>
                   <td><input type="number" name="tunjangan_keluarga" value="<?php echo $tunjangan_keluarga; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Tunjangan Transportasi</th>
                   <td width="5%">:</td>
                   <td><input type="number" name="tunjangan_transport" value="<?php echo $tunjangan_transport; ?>"></td>
               </tr>

               <?php
             }
              ?>
       </table>
       <div class="label">
         <button class="btn-login" type="submit">SIMPAN</button>
       </div>
    </form>
  <?php
}
elseif ($aksi == 'tambah') {
  ?>
    <form action="konten/proses/a_jabatan_edit_aksi.php" method="post">
      <input type="hidden" name="tipe_edit" value="tambah">
      <table id="tbl">
        <tr>
            <th width="19%">ID Jabatan</th>
            <td width="5%">:</td>
            <td><input type="text" name="id_jabatan" value="<?php echo $id_kr; ?>" readonly></td>
        </tr>

        <tr>
            <th width="19%">Nama Jabatan</th>
            <td width="5%">:</td>
            <td><input type="text" name="nama_jabatan" value=""></td>
        </tr>

        <tr>
            <th width="19%">Gaji Pokok</th>
            <td width="5%">:</td>
            <td><input type="number" name="gaji_pokok" value=""></td>
        </tr>

        <tr>
            <th width="19%">Tunjangan BPJS</th>
            <td width="5%">:</td>
            <td><input type="number" name="tunjangan_bpjs" value=""></td>
        </tr>

        <tr>
            <th width="19%">Tunjangan Konsumsi</th>
            <td width="5%">:</td>
            <td><input type="number" name="tunjangan_konsumsi" value=""></td>
        </tr>

        <tr>
            <th width="19%">Tunjangan Keluarga</th>
            <td width="5%">:</td>
            <td><input type="number" name="tunjangan_keluarga" value=""></td>
        </tr>

        <tr>
            <th width="19%">Tunjangan Transportasi</th>
            <td width="5%">:</td>
            <td><input type="number" name="tunjangan_transport" value=""></td>
        </tr>
       </table>
       <div class="label">
         <button class="btn-login" type="submit">SIMPAN</button>
       </div>
    </form>
  <?php
}
elseif ($aksi == 'hapus') {
  $sqlhapus = "DELETE FROM jabatan WHERE id_jabatan='$_GET[idjab]'";
  if ($mysqli->query($sqlhapus)) {
    ?>
      <script>
      alert('Data Berhasil Dihapus!');
      window.location.href="index.php?p=d_administrasi&k=a_jabatan";
      </script>
    <?php
  }
  else {
    ?>
      <script>
      alert('Data TIDAK Berhasil Dihapus!');
      window.location.href="index.php?p=d_administrasi&k=a_jabatan";
      </script>
    <?php
  }
}



 ?>
</div>
