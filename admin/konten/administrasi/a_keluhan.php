<form action="konten/proses/a_keluhan_aksi.php" method="post">
  <input type="hidden" name="tipe_edit" value="edit">
  <table id="tbl">
    <?php
    foreach ($sqldetail_keluhan as $key) {
      extract($key);
      ?>
           <tr>
               <th width="19%">ID Karyawan</th>
               <td width="5%">:</td>
               <td><?php echo $id_karyawan; ?></td>
           </tr>

           <tr>
               <th width="19%">Perihal</th>
               <td width="5%">:</td>
               <td><?php echo $perihal_keluhan; ?></td>
           </tr>

           <tr>
               <th width="19%">Tanggal</th>
               <td width="5%">:</td>
               <td><?php echo $tanggal_keluhan; ?></td>
           </tr>

           <tr>
               <th width="19%">Keluhan</th>
               <td width="5%">:</td>
               <td><?php echo $keluhan; ?></td>
           </tr>



           <?php
         }
          ?>
   </table>
   <a href="index.php?p=d_administrasi&k=a_keluhan_list" class="btn btn-default"><i class="fa fa-fw fa-arrow-circle-left" style="color:#000"></i>Kembali</a>
</form>
