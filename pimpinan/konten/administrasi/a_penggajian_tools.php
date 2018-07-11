
<?php

$aksi = "detail";
$hak = $_SESSION['hak'];

  ?>
<form method="post" action="konten/proses/a_penggajian_aksi.php">
  <table id="tbl">
    <?php
    foreach ($sqledit_karyawan as $key) {
      extract($key);
      ?>
           <tr>
               <th width="19%">ID Karyawan</th>
               <td width="5%">:</td>
               <td><?php echo $id_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Nama Karyawan</th>
               <td width="5%">:</td>
               <td><?php echo $nama_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Jabatan</th>
               <td width="5%">:</td>
               <td><?php echo $nama_jabatan; ?></td>
           </tr>

           <tr>
               <th width="19%">Pilih tunjangan yang didapat</th>
               <td width="5%">:</td>
               <td>
                 <input type="hidden" name="id_karyawan" value="<?php echo $_GET['id']; ?>">Tunjangan BPJS<br>
                 <input type="checkbox" name="gaji[]" value="tunjangan_bpjs">Tunjangan BPJS<br>
                 <input type="checkbox" name="gaji[]" value="tunjangan_konsumsi">Tunjangan Konsumsi<br>
                 <input type="checkbox" name="gaji[]" value="tunjangan_transport">Tunjangan Transportasi<br>
                 <input type="checkbox" name="gaji[]" value="tunjangan_keluarga">Tunjangan Keluarga<br>
                 Potongan<input type="number" name="potongan" value="">
               </td>
           </tr>

           <?php
         }
          ?>
  </table><hr>
  <a href="index.php?p=d_administrasi&k=a_penggajian" class="btn btn-default"><i class="fa fa-fw fa-arrow-circle-left" style="color:#000"></i>Kembali</a>
  <button type="submit" class="btn btn-default"><i class="fa fa-fw fa-save" style="color:green"></i>Simpan</button>
</form>
