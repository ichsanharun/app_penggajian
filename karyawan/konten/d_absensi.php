<?php
$tanggal_absensi = date("Y-m-d");
$id = $_SESSION['id'];
$queryabsen = "SELECT * FROM `absensi` INNER JOIN `karyawan` ON `absensi`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `absensi`.`id_karyawan` = '$id' AND `absensi`.`tanggal_absensi` = '$tanggal_absensi'";
$sql_absensi = mysqli_query($mysqli,$queryabsen);
$absensi = mysqli_fetch_array($sql_absensi);
 ?>
<div class="apps-content-item">
  <form action="konten/proses/cek_absen.php" method="post">
    <table id="tbl" width="100%">
      <tr>
        <th colspan="4">Cek Absen</th>
      </tr>
      <tr>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Absen Masuk</th>
        <th>Absen Keluar</th>
      </tr>
      <tr>
        <th><?php echo date("d-m-Y"); ?></span>
        <th><span id="js_clock"></span>
          <script type="text/javascript">
        js_clock();

        </script></th>
        <td width="310px" align="center">
          <?php
          if ($absensi['kehadiran'] == 'Hadir') {
            echo "<h4>Telah melakukan absensi Masuk</h4>";
          }
          else {

            ?>
            <button type="submit" name="absensi" value="Hadir" class="btn-login">Hadir</button>
            <?php
          }?>
        </td>
        <td width="310px" align="center">
          <?php
          if ($absensi['waktu_keluar'] != '') {
            echo "<h4>Telah melakukan absensi Keluar</h4>";
          }
          else {
            ?>
            <button type="submit" name="keluar" value="Keluar" class="btn-login">Keluar</button>
            <?php
          }?>
        </td>
      </tr>
    </table>
  </form>
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

  ?>

    <br>
    <table id="tbl">

        <tr>
            <th colspan="<?php echo $jumlahhari; ?>">Kehadiran Bulan Ini</th>
        </tr>
        <tr>
          <?php for ($i=1; $i <= $jumlahhari; $i++) {
            //echo "<th><a href='?page=absen_ubah&d=$i&m=$bulan&y=$tahun'>".$i."</a></th>";
            echo "<th>".$i."</th>";
          } ?>
        </tr>




        <tr>
            <?php $tanggal1 = date("Y-m-d"); ?>
            <?php for ($i=1; $i <= $jumlahhari; $i++) {
              if ($i <10 ) {
                $j = '0'.$i;
              }
              else {
                $j = $i;
              }
              $restgl = $tgl."-".$j;
              $querykehadiran = "SELECT * FROM `absensi` INNER JOIN `karyawan` ON `absensi`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `absensi`.`tanggal_absensi` = '$restgl' AND `absensi`.`id_karyawan` = '$_SESSION[id]'";
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



    </table>


  </div>
