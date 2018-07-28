<?php
$tanggal = date("d M Y");
$bulan = date("m");//$_GET['bulan'];
$tahun = date("Y");//$_GET['tahun'];
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

$periode = date("Y-m");
  ?>
  <!--a href="index.php?p=d_administrasi&k=a_absensi" class="btn btn-default"><i class="fa fa-fw fa-arrow-circle-left" style="color:#000"></i>Kembali</a-->
      <table id="tbl">
        <tr>
            <th>Tanggal Absensi</th>
            <th>Kehadiran</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Keterangan</th>
        </tr>
        <?php
        for ($i=1; $i <= $jumlahhari; $i++) {
          // code...
        if ($i < 10) {
          $j = date("Y-m")."-0".$i;
        }
        else {
          $j = date("Y-m")."-".$i;
        }
        $query_dabsensi = "SELECT * FROM absensi WHERE id_karyawan = '$_SESSION[id]' AND tanggal_absensi = '$j'";
        $sql_dabsensi = mysqli_query($mysqli,$query_dabsensi);
        $abs = $sql_dabsensi->fetch_assoc();
        //extract($abs);
        ?>
        <tr>
          <th><?php echo date("d M Y", strtotime($j)); ?></th>
          <th><?php echo $abs['kehadiran']; ?></th>
          <th><?php echo $abs['waktu_masuk']; ?> </th>
          <th><?php echo $abs['waktu_keluar']; ?> </th>
          <th><?php echo $abs['keterangan']; ?></th>
        </tr>
        <?php } ?>
      </table>
