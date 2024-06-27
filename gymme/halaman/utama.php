<?php 
session_start();

$ids = $_SESSION['ids'];
$my = mysqli_connect("localhost","root","Mindyourhead77","gymme");
$query = mysqli_query($my,"SELECT * FROM petugas WHERE id_kar='$ids'");
$data = mysqli_fetch_all($query,MYSQLI_ASSOC);

//Data Petugas
$dp = mysqli_query($my,"SELECT * FROM petugas WHERE NOT petugas='admin'");

//Data Member
$dm = mysqli_query($my,"SELECT * FROM member ");

if(!isset($_SESSION['login'])){
    header("Location:../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>PLANET GYM</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="shortcut icon" href="../img/Untitled.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" />
</head>
<body>
  <?php foreach($data as $dta): ?>
   <?php $nama = explode(" ",$dta['nama']);?>  
	<div class= 'container'>
        <div class="container_outer_img">
          <div class="img-inner">
            <?php
             if(isset($_GET['page'])){
              $page = $_GET['page'];
              switch ($page) {
                case 'register_m':
                  include "register_member.php";
                  break;
                case 'petugas' :
                  include "daftar_petugas.php";
                  break;
                case 'member':
                  include "daftar_member.php";
                  break;
                case 'register_p':
                  include 'register_petugas.php';
                  break;
                case 'ubah_p':
                  include 'ubah_petugas.php';
                  break;
                case 'ubah_m':
                  include 'ubah_member.php';
                  break;
                case 'transaksi':
                  include 'transaksi.php';
                  break;
                case 'laporan' :
                  include 'laporan.php';
                  break;
                default:
                  include "utama.php";
                  break;
              }
             }
             
            ?>
            <?php if(!isset($_GET['page'])): ?>
            <h2>Welcome TO PLANET GYM</h2>
            <p><?= $dta['nama'] ?></p>
            <?php endif; ?>
          </div>
        </div>
  </div>
    <div class="overlay"></div>
    <!-- side bar -->
<div id="nav-bar" >
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><a id="nav-title" href="utama.php" target="_self">PLANET GYM</a>
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button" ><i class="fas fa-home"></i><span><a href="utama.php">Home</a></span></div>
    <?php if($dta['petugas'] === 'admin'): ?>
      <div class="nav-button"><i class="fas fa-user"></i><a href="utama.php?page=petugas"><span>daftar petugas</span></a></div>
      <?php endif; ?>  
      <div class="nav-button"><i class="fas fa-users"></i><span><a href="utama.php?page=member">daftar member</a></span></div>
    <div class="nav-button"><i class="fas fa-credit-card"></i><span><a href="utama.php?page=transaksi">transaksi</a></span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-arrow-right"></i><span><a href="../fungsi/logout.php" onclick="return confirm('anda yakin sudah selesai kerjanya?')">Logout</a></span></div>
      <div class="data">
      <?php if($dta['petugas'] == 'admin'):?>
          <div class="operator">
            <h5 style="float: right;"> <?= mysqli_num_rows($dp) ?></h5>
            <h5 style="float: left;"><i class="fas fa-user"> operator</i></h5>
          </div><br>
      <?php endif; ?> 
          <div class="member">
            <h5 style="float: right;"> <?= mysqli_num_rows($dm) ?></h5>
            <h5 style="float: left;"><i class="fas fa-users"> member</i></h5>
          </div>
      </div>
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar"><img src="../foto_karyawan/<?= $dta['foto'] ?>"/></div>
      <div id="nav-footer-titlebox">
      <a id="nav-footer-title" target="_blank"><?= $nama[0] ?></a>
      <span id="nav-footer-subtitle"><?= $dta['petugas'] ?></span>
    </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
  </body>
  <script src="javascript.js"></script>
</html>