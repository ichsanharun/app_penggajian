<table id="tbl" width="100%">
  <tr>
    <th rowspan="2">No.</th>
    <th rowspan="2">Jabatan</th>
    <th rowspan="2">Gaji Pokok</th>
    <th colspan="4">Tunjangan</th>
    <th rowspan="2">Opsi</th>
  </tr>
  <tr>
    <th>BPJS</th>
    <th>Konsumsi</th>
    <th>Transport</th>
    <th>Keluarga</th>
  </tr>
  <?php
  $no = 0;
  foreach ($sql_jabatan as $key) {
    extract($key);
  $no++;
  ?>
  <tr text-align="center">
    <td><?php echo $no; ?></td>
    <td><?php echo $nama_jabatan; ?></td>
    <td><?php echo $gaji_pokok; ?></td>
    <td><?php echo $tunjangan_bpjs; ?></td>
    <td><?php echo $tunjangan_konsumsi; ?></td>
    <td><?php echo $tunjangan_transport; ?></td>
    <td><?php echo $tunjangan_keluarga; ?></td>
    <td>
     <a href="index.php?p=d_administrasi&k=a_jabatan_tools&idjab=<?php echo $id_jabatan; ?>&aksi=edit" class="fa fa-fw fa-edit" title="edit" title="Ubah Data pimpinan"></a>
     <a href="index.php?p=d_administrasi&k=a_jabatan_tools&idjab=<?php echo $id_jabatan; ?>&aksi=hapus" title="hapus"
       onclick="javascript: return confirm('Anda yakin akan menghapus data pimpinan <?php echo $id_pimpinan; ?>?')"
       class="fa fa-fw fa-trash" style="color:red"></a>
    </td>
  </tr>
<?php } ?>
</table>
<a href="index.php?p=d_administrasi&k=a_jabatan_tools&aksi=tambah" class="btn btn-default"><i class="fa fa-fw fa-plus" style="color:#000"></i>Tambah</a>
