<div class="apps-content-item">
<?php

$aksi = $_GET['aksi'];
$hak = $_SESSION['hak'];


if ($aksi == 'detail') {
  ?>
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
               <th width="19%">E-Mail Karyawan</th>
               <td width="5%">:</td>
               <td><?php echo $email_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Tempat, Tanggal Lahir</th>
               <td width="5%">:</td>
               <td><?php echo $tempat_lahir_karyawan.", ".$tanggal_lahir_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Agama</th>
               <td width="5%">:</td>
               <td><?php echo $agama_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Alamat</th>
               <td width="5%">:</td>
               <td><?php echo $alamat_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Jenis Kelamin</th>
               <td width="5%">:</td>
               <td><?php echo $jk_karyawan; ?></td>
           </tr>

           <?php
         }
          ?>
   </table>
   <a href="index.php?p=d_karyawan" class="btn btn-default"><i class="fa fa-fw fa-arrow-circle-left" style="color:#000"></i>Kembali</a>
  <?php
}
elseif ($aksi == 'edit') {
  ?>
    <form action="konten/proses/d_karyawan_edit_aksi.php" method="post">
      <input type="hidden" name="tipe_edit" value="edit">
      <table id="tbl">
        <?php
        foreach ($sqledit_karyawan as $key) {
          extract($key);
          ?>
               <tr>
                   <th width="19%">ID Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>"><?php echo $id_karyawan; ?></td>
               </tr>

               <tr>
                   <th width="19%">Nama Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="nama_karyawan" value="<?php echo $nama_karyawan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">E-Mail Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="email_karyawan" value="<?php echo $email_karyawan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Tempat, Tanggal Lahir</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="tempat_lahir_karyawan" value="<?php echo $tempat_lahir_karyawan; ?>"><input type="date" name="tanggal_lahir_karyawan" value="<?php echo $tanggal_lahir_karyawan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Agama</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="agama_karyawan" value="<?php echo $agama_karyawan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Alamat</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="alamat_karyawan" value="<?php echo $alamat_karyawan; ?>"></td>
               </tr>

               <tr>
                   <th width="19%">Jenis Kelamin</th>
                   <td width="5%">:</td>
                   <td>
                     <select name="jk_karyawan">
                       <option value="<?php echo $alamat_karyawan; ?>">L/P</option>
                       <option value="L">Laki-laki</option>
                       <option value="P">Perempuan</option>
                     </select>
                   </td>
               </tr>

               <tr>
                   <th width="19%">Jabatan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="id_jabatan" value="<?php echo $id_jabatan; ?>"></td>
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
    <form action="konten/proses/d_karyawan_edit_aksi.php" method="post">
      <input type="hidden" name="tipe_edit" value="tambah">
      <table id="tbl">

               <tr>
                   <th width="19%">ID Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="id_karyawan" value=""></td>
               </tr>

               <tr>
                   <th width="19%">Nama Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="nama_karyawan" value=""></td>
               </tr>

               <tr>
                   <th width="19%">E-Mail Karyawan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="email_karyawan" value=""></td>
               </tr>

               <tr>
                   <th width="19%">Tempat, Tanggal Lahir</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="tempat_lahir_karyawan" value="" style="width:20% !important;"><input type="date" name="tanggal_lahir_karyawan" value="<?php echo $tanggal_lahir_karyawan; ?>" style="width:20% !important;"></td>
               </tr>

               <tr>
                   <th width="19%">Agama</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="agama_karyawan" value=""></td>
               </tr>

               <tr>
                   <th width="19%">Alamat</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="alamat_karyawan" value=""></td>
               </tr>

               <tr>
                   <th width="19%">Jenis Kelamin</th>
                   <td width="5%">:</td>
                   <td>
                     <select name="jk_karyawan">
                       <option value="">L/P</option>
                       <option value="L">Laki-laki</option>
                       <option value="P">Perempuan</option>
                     </select>
                   </td>
               </tr>

               <tr>
                   <th width="19%">Jabatan</th>
                   <td width="5%">:</td>
                   <td><input type="text" name="id_jabatan" value=""></td>
               </tr>
       </table>
       <div class="label">
         <button class="btn-login" type="submit">SIMPAN</button>
       </div>
    </form>
  <?php
}
elseif ($aksi == 'hapus') {
  $sqlhapus = "DELETE FROM karyawan WHERE id_karyawan='$id'";
  if ($mysqli->query($sqlhapus)) {
    ?>
      <script>
      alert('Data Berhasil Dihapus!');
      window.location.href="index.php?p=d_karyawan";
      </script>
    <?php
  }
  else {
    ?>
      <script>
      alert('Data TIDAK Berhasil Dihapus!');
      window.location.href="index.php?p=d_karyawan";
      </script>
    <?php
  }
}



 ?>
</div>
