<table id="tbl" width="100%">
  <tr>
    <th>No.</th>
    <th>ID Karyawan</th>
    <th>Tanggal Keluhan</th>
    <th>Perihal Keluhan</th>
  </tr>
  <?php
  $no = 0;
  foreach ($sql_keluhan as $key) {
    extract($key);
  $no++;
  ?>
  <tr align="center">
    <td><?php echo $no; ?></td>
    <td><?php echo $id_karyawan; ?></td>
    <td><?php echo $tanggal_keluhan; ?></td>
    <td><a href="?p=d_administrasi&k=a_keluhan&kel=<?php echo $ID; ?>" class="form-control"><?php echo $perihal_keluhan; ?></a></td>
  </tr>
<?php } ?>

</table>
