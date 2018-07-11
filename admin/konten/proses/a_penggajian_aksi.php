<?php
include '../../../koneksi/koneksi.php';
session_start();
$gaji = $_POST['gaji'];
$periode = $_POST['periode'];
$tipe_aksi = $_POST['tipe_aksi'];
$id_admin = $_SESSION['id'];

foreach ($gaji as $key => $value) {
  $tunjangan_bpjs = 0;
  $tunjangan_konsumsi = 0;
  $tunjangan_transport = 0;
  $tunjangan_keluarga = 0;
  $potongan_gaji = 0;
  extract($value);
  echo $tunjangan_konsumsi;
  if ($potongan_gaji == '') {
    $potongan_gaji = 0;
  }
  if ($tipe_aksi == "Insert") {
    $query_karyawan = "SELECT id_karyawan,nama_karyawan,nama_jabatan,karyawan.id_jabatan,gaji_pokok FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` WHERE `karyawan`.`id_karyawan` = '$key'";
    $sql_karyawan = $mysqli->query($query_karyawan);
    $karyawan = $sql_karyawan->fetch_array();
    //extract($karyawan);
    //print_r($value);
    $gaji_diterima = ($gaji_pokok*90/100) + $tunjangan_bpjs + $tunjangan_keluarga + $tunjangan_konsumsi + $tunjangan_transport - $potongan_gaji;
    $querygaji = "INSERT INTO slip_gaji
                  (
                    id_karyawan,
                    periode,
                    id_jabatan,
                    gaji_pokok,
                    tunjangan_bpjs,
                    tunjangan_konsumsi,
                    tunjangan_transport,
                    tunjangan_keluarga,
                    pajak,
                    potongan_gaji,
                    gaji_diterima,
                    id_admin,
                    keterangan
                  )
                  VALUES
                  (
                    '$key',
                    '$periode',
                    '$id_jabatan',
                    '$gaji_pokok',
                    '$tunjangan_bpjs',
                    '$tunjangan_konsumsi',
                    '$tunjangan_transport',
                    '$tunjangan_keluarga',
                    '10%',
                    '$potongan_gaji',
                    '$gaji_diterima',
                    '$id_admin',
                    'pending'
                  )
    ";

  }
  elseif ($tipe_aksi == "Update") {
    $gaji_diterima = ($gaji_pokok*90/100) + $tunjangan_bpjs + $tunjangan_keluarga + $tunjangan_konsumsi + $tunjangan_transport - $potongan_gaji;
    $querygaji = "UPDATE slip_gaji SET
                    id_karyawan = '$key',
                    periode = '$periode',
                    id_jabatan = '$id_jabatan',
                    gaji_pokok = '$gaji_pokok',
                    tunjangan_bpjs = '$tunjangan_bpjs',
                    tunjangan_konsumsi = '$tunjangan_konsumsi',
                    tunjangan_transport = '$tunjangan_transport',
                    tunjangan_keluarga = '$tunjangan_keluarga',
                    pajak = '10%',
                    potongan_gaji = '$potongan_gaji',
                    gaji_diterima = '$gaji_diterima',
                    id_admin = '$id_admin',
                    keterangan = 'pending'
                  WHERE id_karyawan = '$key' AND periode = '$periode'
                  ";

  }

  $sql_gaji = $mysqli->query($querygaji);
  ?>
    <script>
      alert('Data Berhasil Disimpan!');
      window.location.href="../../index.php?p=d_administrasi&k=a_penggajian";
    </script>
  <?php
}
?>
