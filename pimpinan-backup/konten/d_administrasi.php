<?php
$id = $_SESSION['id'];
 ?>
<div class="apps-content-item">
  <ul class="adm">
    <li><a href="?p=d_administrasi&k=k_penggajian"><i class="fa fa-fw fa-money-bill-alt"></i> Slip Gaji</a></li>
    <li><a href="?p=d_administrasi&k=k_absensi"><i class="fa fa-fw fa-user"></i> Data Absensi</a></li>
    <li><a href="?p=d_administrasi&k=k_ubah_profil&id=<?php echo $id; ?>"><i class="fa fa-fw fa-user"></i> Ubah Profil</a></li>
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
        include 'konten/administrasi/k_absensi.php';
      }
     ?>
  </div>
</div>
