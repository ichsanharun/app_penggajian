
<!-- saved from url=(0061)http://student.nusamandiri.ac.id/cetak_khs.aspx?id=1502098062 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <?php
  session_start();
  include ('../../../koneksi/koneksi.php');
  include ('../../../controller.php');
  if (!empty($_GET['data'])) {
    $data = $_GET['data'];
    if ($data == "absensi") {
      if (!empty($_GET['periode-bl'])) {
        $periode = $_GET['periode-bl'];
      }
      else {
        $periode = "-";
      }
      include 'config_penanggalan.php';
      $sqltrans = "SELECT * FROM transaksi WHERE tanggal_transaksi like '%$periode%'";
      $querytrans = $mysqli->query($sqltrans);
      $judul = 'Data Laporan Absensi Periode Bulan '.$periode.' Tahun '.date("Y");
      //              $th = array('No','Kode Transaksi','Tanggal','ID Pel.','ID Pel.');
    }
    elseif ($data == "karyawan") {
      $sqldetail = "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan";
      $querydetail = $mysqli->query($sqldetail);
      $judul = 'Data Laporan Karyawan';
      $th = array('No','ID Karyawan','Nama Karyawan','E-Mail','TTL','Agama','JK','Jabatan');
    }
    elseif ($data == "gaji") {
      if (!empty($_GET['periode-bl'])) {
        $periode_bl = $_GET['periode-bl'];
      }
      else {
        $periode_bl = "-";
      }
      $periode = date("Y")."-".$periode_bl;
      $sqldetail = "SELECT * FROM slip_gaji INNER JOIN karyawan INNER JOIN jabatan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan` AND `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` WHERE `slip_gaji`.`periode` = '$periode'";
      $querydetail = $mysqli->query($sqldetail);
      $judul = 'Data Laporan Gaji Periode Bulan '.$periode_bl.' Tahun '.date("Y");

    }
  }

  //"UPDATE guru set nama_guru = ";
  ?>
<title>CETAK LAPORAN</title>
</head>
<body>

  <link rel="stylesheet" href="style.css" type="text/css"><p>
</p><div>
 <!-- Memulai Aplikasi Dari Sini -->
<div>
<div id="aplikasicetak">
  <div >
  <table  border="0">
    <tbody style="text-align:right">
      <tr>
        <td rowspan="3" width="10%">
          <img src="../../img/login.png" width="100%" style="border-radius:50%">
        </td>
        <td>
          <p>Jl. Cendrawasih Raya C Antilop Jaticempaka</p>
        </td>
      </tr>
      <tr>
        <td><p>Jatiwaringin, Pg. Gede, Bekasi</p>
        </td>
      </tr>
      <tr>
        <td><p>Telp. (021) 8002639</p>
        </td>
      </tr>
    </tbody>
  </table>

  </div>
		<div class="ahead"><hr><?php echo $judul; ?></hr></div>
    <hr>
    <?php
    if ($data == "absensi") {?>
      <table  cellspacing="0" cellpadding="0" width=80% id="tbl">

          <tr>
            <th rowspan="2">Nama</th>
            <th colspan="<?php echo $jumlahhari; ?>">Kehadiran Bulan Ini</th>
          </tr>
          <tr>
            <?php for ($i=1; $i <= $jumlahhari; $i++) {
              echo "<td>".$i."</td>";
            } ?>
          </tr>
          <?php
          $no = 0;
          foreach ($sql_karyawan as $key) {
            extract($key);
          $no++;
          ?>

          <tr>
            <th><a href="?p=d_administrasi&k=a_absensi_tools&id=<?php echo $id_karyawan; ?>&periode=<?php echo date("Y-m"); ?>" ><?php echo $nama_karyawan; ?></a></th>
              <?php $tanggal1 = date("Y-m-d"); ?>
              <?php for ($i=1; $i <= $jumlahhari; $i++) {
                if ($i <10 ) {
                  $j = '0'.$i;
                }
                else {
                  $j = $i;
                }
                $restgl = $tgl."-".$j;
                $querykehadiran = "SELECT * FROM `absensi` WHERE `absensi`.`id_karyawan` = '$id_karyawan' AND `absensi`.`tanggal_absensi` = '$restgl'";
                $sqlhadir=mysqli_query($mysqli,$querykehadiran);
                $datahadir=mysqli_fetch_array($sqlhadir);
                if (empty($datahadir['kehadiran'])) {
                  $keterangan = '-';
                }
                elseif (!empty($datahadir['kehadiran'])) {
                  if ($datahadir['kehadiran'] == 'Hadir') {
                    $keterangan = "V";
                  }
                  else {
                    $keterangan = "S";
                  }
                }
                $tanggalan = date('D', strtotime($restgl));
                if ($tanggalan == 'Sun' OR $tanggalan == 'Sat') {
                  echo "<td width=3.33334%>X</td>";
                }
                else {
                  echo "<td width=3.33334%>".$keterangan."</td>";
                }

              } ?>
          </tr>
          <?php } ?>

            <table width=100% style="margin-left:5%;">
              <hr>
              <tr>
                <td width=70%></td>
                <td width=30%>Mengetahui</td>
              </tr>
              <tr>
                <td><br><br><br></td>
                <td><br></td>
              </tr>
              <tr>
                <td></td>
                <td>Direktur</td>
              </tr>
            </table>
      </table>

<?php }
elseif ($data == "gaji") { ?>
<table cellspacing="0" cellpadding="0" width=100% id="tbl">
  <tr>
    <th rowspan="2">No.</th>
    <th rowspan="2">Nama Karyawan</th>
    <th rowspan="2">Jabatan</th>
    <th rowspan="2">Gaji Pokok</th>
    <th colspan="4">Tunjangan</th>
    <th rowspan="2">Gaji Diterima</th>
  </tr>
  <tr>

    <th>BPJS</th>
    <th>Konsumsi</th>
    <th>Transport</th>
    <th>Keluarga</th>
  </tr>
  <?php
  $no = 0;
    foreach ($querydetail as $key) {
      extract($key);
      $no++;
     ?>
    <tr>
      <td><?php echo $no; ?></td>

      <td><?php echo $nama_karyawan; ?></td>
      <td><?php echo $nama_jabatan; ?></td>
      <td><?php echo $gaji_pokok; ?></td>
      <td><?php echo $tunjangan_bpjs; ?></td>
      <td><?php echo $tunjangan_konsumsi; ?></td>
      <td><?php echo $tunjangan_transport; ?></td>
      <td><?php echo $tunjangan_keluarga; ?></td>
      <td><?php echo $gaji_diterima; ?></td>
    </tr>
    <?php } ?>

</table>
<hr>
  <table width=100% style="margin-left:5%;">
    <tr>
      <td width=70%></td>
      <td width=30%>Mengetahui</td>
    </tr>
    <tr>
      <td><br><br><br></td>
      <td><br></td>
    </tr>
    <tr>
      <td></td>
      <td>Direktur</td>
    </tr>
  </table>
<?php
}
elseif ($data == "karyawan") { ?>
<table cellspacing="0" cellpadding="0" width=100% id="tbl">
    <tr>
      <?php foreach ($th as $value) {
        echo "<th>".$value."</th>";
      } ?>
    </tr>
  <?php
  $no = 0;
    foreach ($querydetail as $key) {
      extract($key);
      $no++;
     ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $id_karyawan;?></td>
      <td><?php echo $nama_karyawan;?></td>
      <td><?php echo $email_karyawan;?></td>
      <td><?php echo $tempat_lahir_karyawan.", ".$tanggal_lahir_karyawan;?></td>
      <td><?php echo $agama_karyawan;?></td>
      <td><?php echo $jk_karyawan;?></td>
      <td><?php echo $nama_jabatan;?></td>
    </tr>
    <?php } ?>

</table>
<hr>
  <table width=100% style="margin-left:5%;">
    <tr>
      <td width=70%></td>
      <td width=30%>Mengetahui</td>
    </tr>
    <tr>
      <td><br><br><br></td>
      <td><br></td>
    </tr>
    <tr>
      <td></td>
      <td>Direktur</td>
    </tr>
  </table>
<?php
}
?>
</td>
</tr>
</tbody></table>


</body></html>
