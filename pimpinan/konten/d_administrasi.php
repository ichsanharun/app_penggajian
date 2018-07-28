<div class="apps-content-item">
  <ul class="adm">
    <li><a href="?p=d_administrasi&k=a_jabatan"><i class="fa fa-fw fa-home"></i> Kelola Jabatan</a></li>
    <li><a href="?p=d_administrasi&k=a_penggajian"><i class="fa fa-fw fa-money-bill-alt"></i> Penggajian</a></li>
    <li><a href="?p=d_administrasi&k=a_keluhan_list"><i class="fa fa-fw fa-list"></i> Data Keluhan</a></li>
    <li><a href="?p=d_administrasi&k=a_absensi"><i class="fa fa-fw fa-user"></i> Data Absensi</a></li>
    <li><a href="?p=d_administrasi&k=a_ubah_profil"><i class="fa fa-fw fa-user"></i> Ubah Profil</a></li>
    <li><a href="?p=d_administrasi&k=cetaktrans"><i class="fa fa-fw fa-print"></i> Lap. Rekap Absen</a></li>
    <li><a href="konten/administrasi/cetak_tr.php?data=karyawan"><i class="fa fa-fw fa-print"></i> Lap. Karyawan</a></li>
    <li><a href="?p=d_administrasi&k=cetakgaji"><i class="fa fa-fw fa-print"></i> Lap. Gaji</a></li>
  </ul>
  <div class="adm-content">
    <?php
      if (!empty($_GET['k'])) {
        $k = $_GET['k'];
        if (file_exists("konten/administrasi/$k.php")) {
          include 'konten/administrasi/'.$k.'.php';
        }
        else {
          include 'not_found.php';
        }
      }
      elseif (empty($_GET['k'])) {
        include 'konten/administrasi/a_jabatan.php';
      }
     ?>
  </div>
</div>
