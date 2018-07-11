<div class="apps-content-item">
<table id="tbl" width="100%">
  <tr>
    <th>No.</th>
    <th>ID</th>
    <th>Nama</th>
    <th>E-Mail</th>
    <th>JK</th>
    <th>Jabatan</th>
    <th>Opsi</th>

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
    <td>
     <a href="index.php?p=d_karyawan_tools&id=<?php echo $id_karyawan; ?>&aksi=detail" class="fa fa-fw fa-arrow-circle-right" title="Rincian Profile"></a>
     <a href="index.php?p=d_karyawan_tools&id=<?php echo $id_karyawan; ?>&aksi=edit" class="fa fa-fw fa-edit" title="edit" title="Ubah Data karyawan"></a>
     <a href="index.php?p=d_karyawan_tools&id=<?php echo $id_karyawan; ?>&aksi=hapus" title="hapus"
       onclick="javascript: return confirm('Anda yakin akan menghapus data karyawan <?php echo $id_karyawan; ?>?')"
       class="fa fa-fw fa-trash" style="color:red"></a>
    </td>
  </tr>
<?php } ?>
</table>


<a href="index.php?p=d_karyawan_tools&aksi=tambah" class="btn btn-default"><i class="fa fa-fw fa-plus" style="color:#000"></i>Tambah</a>
</div>
