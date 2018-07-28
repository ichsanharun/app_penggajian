<?php

$tanggal = date("d M Y");
$bulan = date("m");//$_GET['bulan'];
$tahun = date("Y");//$_GET['tahun'];

  $tgl = $tahun.'-'.$periode;


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
$jumlahhari = $penanggalan[$periode];

?>
