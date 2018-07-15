
<!-- saved from url=(0061)http://student.nusamandiri.ac.id/cetak_khs.aspx?id=1502098062 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <?php
  session_start();
  include ('../../../koneksi/koneksi.php');

  $periode = $_GET['periode'];
  $sqldetail = "SELECT * FROM slip_gaji INNER JOIN karyawan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `slip_gaji`.`periode` = '$periode' AND `slip_gaji`.`id_karyawan` = '$_SESSION[id]'";
  $querydetail = $mysqli->query($sqldetail);
  //"UPDATE guru set nama_guru = ";
  ?>
<title>CETAK KARTU</title>
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
          <img src="../../img/login.png" width="100%">
        </td>
        <td>
          <p>Jl. Jengki Cipinang Asem Rt.02/12 No.11C</p>
        </td>
      </tr>
      <tr>
        <td><p>Kebon Pala Makasar, Jakarta Timur</p>
        </td>
      </tr>
      <tr>
        <td><p>Telp. (021) 8002639</p>
        </td>
      </tr>
    </tbody>
  </table>

  </div>
		<div class="ahead"><hr>SLIP GAJI</hr></div>
    <?php foreach ($querydetail as $key) {
      extract($key);
    ?>
    <table border="0" cellspacing="0" cellpadding="0" width=100%>
      <tr colspan="6">
        <td width=10%>ID</td>
        <td width=2%>:</td>
        <td width=38%><?php echo $id_karyawan; ?></td>
        <td width=10%>Jabatan</td>
        <td width=2%>:</td>
        <td width=38%><?php echo $id_jabatan; ?></td>
      </tr>
      <tr colspan="6">
        <td width=10%>Nama</td>
        <td width=2%>:</td>
        <td width=38%><?php echo $nama_karyawan; ?></td>
        <td width=10%>Periode</td>
        <td width=2%>:</td>
        <td width=38%><?php echo date("M Y"); ?></td>
      </tr>
    </table>
    <hr></hr>
		<table cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td colspan="3" align="left"><strong><font face="Verdana, Arial, Helvetica, sans-serif" color="#000000" size="-1">&nbsp;</font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1">Gaji Pokok</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $gaji_pokok; ?></font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1">TUNJANGAN KONSUMSI</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $tunjangan_konsumsi; ?></font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1">TUNJANGAN TRANSPORT</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $tunjangan_transport; ?></font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1">TUNJANGAN BPJS</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $tunjangan_bpjs; ?></font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1">TUNJANGAN KELUARGA</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $tunjangan_keluarga; ?></font></strong></td>
        </tr>
        <tr style="border-bottom:2px #000 solid;">
          <td width="33%" align="left"><font size="-1">POTONGAN</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1">:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><?php echo $potongan_gaji; ?></font></strong></td>
        </tr>
        <tr>
          <td width="33%" align="left"><font size="-1"><hr>GAJI BERSIH</font></td>
          <td width="2%" align="left"><strong><font color="#000000" size="-1"><hr>:</font></strong></td>
          <td width="65%" align="right"><strong><font color="#000000" size="-1"><hr><?php echo $gaji_diterima; ?></font></strong></td>
        </tr>

              </div></td>
            </tr>
            </tbody></table>
      <table width=100% style="margin-left:5%;">
        <tr>
          <td width=70%>Penerima</td>
          <td width=30%>Mengetahui</td>
        </tr>
        <tr>
          <td><br><br><br></td>
          <td><br></td>
        </tr>
        <tr>
          <td><?php echo $nama_karyawan;?></td>
          <td>Direktur</td>
        </tr>
      </table>
<?php } ?>
</td>
</tr>
</tbody></table>


</body></html>
