<div class="apps-content-item">
<table id="tbl" width="100%">
  <tr>
    <th>No.</th>
    <th>Nama</th>
    <th>E-Mail</th>
    <th>JK</th>


  </tr>
  <?php
  $no = 0;
  foreach ($sql_pimpinan as $key) {
    extract($key);
  $no++;
  ?>
  <tr text-align="center">
    <td><?php echo $no; ?></td>
    <td><?php echo $nama_pimpinan; ?></td>
    <td><?php echo $email_pimpinan; ?></td>
    <td><?php echo $jk_pimpinan; ?></td>

  </tr>
<?php } ?>
</table>
<!--a href="index.php?p=d_pimpinan_tools&aksi=tambah" class="btn btn-default"><i class="fa fa-fw fa-plus" style="color:#000"></i>Tambah</a-->


</div>
