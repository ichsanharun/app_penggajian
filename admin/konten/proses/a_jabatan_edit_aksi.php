<?php
include '../../../koneksi/koneksi.php';
$tipe_edit = $_POST['tipe_edit'];
$id_jabatan = $_POST['id_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan_konsumsi = $_POST['tunjangan_konsumsi'];
$tunjangan_bpjs = $_POST['tunjangan_bpjs'];
$tunjangan_keluarga = $_POST['tunjangan_keluarga'];
$tunjangan_transport = $_POST['tunjangan_transport'];


if (
  !empty($id_jabatan) AND
  !empty($nama_jabatan) AND
  !empty($gaji_pokok) AND
  !empty($tunjangan_konsumsi) AND
  !empty($tunjangan_transport) AND
  !empty($tunjangan_keluarga) AND
  !empty($tunjangan_transport)
) {
    if ($tipe_edit == 'edit') {

      $queryupdate_jabatan = "UPDATE jabatan SET
        id_jabatan = '$id_jabatan',
        nama_jabatan = '$nama_jabatan',
        gaji_pokok = '$gaji_pokok',
        tunjangan_konsumsi = '$tunjangan_konsumsi',
        tunjangan_bpjs = '$tunjangan_bpjs',
        tunjangan_keluarga = '$tunjangan_keluarga',
        tunjangan_transport = '$tunjangan_transport' WHERE id_jabatan = '$id_jabatan'";
        //$sqlupdate_jabatan = ;
      if ($mysqli->query($queryupdate_jabatan)) {
        ?>
          <script>
            alert('Data Ubah Berhasil Disimpan!');
            window.location.href="../../index.php?p=d_administrasi&k=a_jabatan";
          </script>
        <?php
      }

    }
    elseif ($tipe_edit == 'tambah') {
      $queryinsert_jabatan = "INSERT INTO jabatan
      (
        id_jabatan,
        nama_jabatan,
        gaji_pokok,
        tunjangan_konsumsi,
        tunjangan_bpjs,
        tunjangan_keluarga,
        tunjangan_transport
      )
      VALUES
      (
        '$id_jabatan',
        '$nama_jabatan',
        '$gaji_pokok',
        '$tunjangan_konsumsi',
        '$tunjangan_bpjs',
        '$tunjangan_keluarga',
        '$tunjangan_transport'
      )
      ";
      //$sqlinsert_jabatan = ;
      if ($mysqli->query($queryinsert_jabatan)) {
        ?>
          <script>
            alert('Data Tambah Berhasil Disimpan!');
            window.location.href="../../index.php?p=d_administrasi&k=a_jabatan";
          </script>
        <?php
      }
    }

}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="../../index.php?p=d_administrasi&k=a_jabatan";
  </script>
  <?php
}

?>
