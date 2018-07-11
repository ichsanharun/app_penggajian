<form action="konten/proses/a_keluhan_aksi.php" method="post">
  <input type="hidden" name="tipe_edit" value="edit">
  <table id="tbl">
    <?php
    foreach ($sqledit_karyawan as $key) {
      extract($key);
      ?>
          <tr>
              <th width="19%">Isi sebagai</th>
              <td width="5%">:</td>
              <td><input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>"><?php echo $nama_karyawan; ?></td>
          </tr>

          <tr>
             <th width="19%">Perihal</th>
             <td width="5%">:</td>
             <td><input type="text" name="perihal_keluhan" value="" maxlength="50"></td>
          </tr>

          <tr>
             <th width="19%">Isi Keluhan</th>
             <td width="5%">:</td>
             <td><textarea name="keluhan" class="form-control"></textarea></td>
          </tr>

           <?php
         }
          ?>
   </table>
   <div class="label">
     <button class="btn-login" type="submit">SIMPAN</button>
   </div>
</form>
