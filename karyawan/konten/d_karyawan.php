<div class="apps-content-item">
<table id="tbl" width="100%">
  <tr>
    <th>No.</th>
    <th>ID</th>
    <th>Nama</th>
    <th>E-Mail</th>
    <th>JK</th>
    <th>Jabatan</th>


  </tr>
  <?php
  $no = 0;
  foreach ($sql_karyawan as $key) {
    extract($key);
  $no++;
  ?>
  <tr text-align="center">
    <td><?php echo $no; ?></td>
    <td><?php echo $id_karyawan; ?></td>
    <td><?php echo $nama_karyawan; ?></td>
    <td><?php echo $email_karyawan; ?></td>
    <td><?php echo $jk_karyawan; ?></td>
    <td><?php echo $id_jabatan; ?></td>
  </tr>
<?php } ?>
</table>



</div>
