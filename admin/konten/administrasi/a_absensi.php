<?php

$tanggal = date("d M Y");
$bulan = date("m");//$_GET['bulan'];
$tahun = '2018';//$_GET['tahun'];
if ($bulan < 10) {
  $tgl = $tahun.'-'.$bulan;
}else {
  $tgl = $tahun.'-'.$bulan;
}

$day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari= $dayList[$day];

$tahun = date("Y");
$bulan = date("m");
$th = (int)$tahun;
$penanggalan = array(
    '01' => '31',
    '02' => '28',
    '03' => '31',
    '04' => '30',
    '05' => '31',
    '06' => '30',
    '07' => '31',
    '08' => '31',
    '09' => '30',
    '10' => '31',
    '11' => '30',
    '12' => '31'
);
$kabisat = $th % 4;
if ($th % 4) {
  $penanggalan['02'] = '28';
}
else{
  $penanggalan['02'] = '29';
}
$jumlahhari = $penanggalan[$bulan];

?>

  <br>
  <table id="tbl" style="font-size:0.7em !important;">

      <tr>
          <th rowspan="2">Nama</th>
          <th colspan="<?php echo $jumlahhari; ?>">Kehadiran Bulan Ini</th>
      </tr>
      <tr>
        <?php for ($i=1; $i <= $jumlahhari; $i++) {
          //echo "<th><a href='?page=absen_ubah&d=$i&m=$bulan&y=$tahun'>".$i."</a></th>";
          echo "<th>".$i."</th>";
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
              echo "<td width=3.33334% bgcolor='red'>".$keterangan."</td>";
            }
            else {
              echo "<td width=3.33334%>".$keterangan."</td>";
            }

          } ?>
     </tr>
<?php } ?>


  </table>
