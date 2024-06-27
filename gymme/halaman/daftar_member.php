<?php

require "../fungsi/fungsi.php";
if(!isset($_SESSION['login'])){
  header("Location:../index.php");
}

$JmlHlmDt = 4;
$JmlDT = count(query("SELECT * FROM member"));
$JMLHlm = ceil($JmlDT/$JmlHlmDt);
$HlmAktf = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awal = ($JmlHlmDt * $HlmAktf)- $JmlHlmDt;

$data = query("SELECT * FROM member ORDER BY tgl_klr DESC LIMIT $awal, $JmlHlmDt ");

if (isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  $data = CariMember($_POST['keyword']);
  if (empty($data)) {
      echo "<script>alert('Hasil pencarian tidak ditemukan'); window.location.href = 'utama.php?page=member';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      form{
        position: absolute;
        z-index: 1;
        margin-top: 20px;
      }
      .edit{
        margin-left: 875px ;
        z-index:2;
        list-style: none;
        display: flex;
      }
      .edit1{
       background-color: green;
       text-decoration: none;
       color: white;
       padding:2px 15px 8px 15px;
       border-radius: 10px;
       font-size: 30px;
       margin-right: 10px;
       text-decoration: none;
    }
    .edit1:hover{
      background-color: black;
    }
    .green{
      background-color: darkgreen;
    }
    .red{
      background-color: red;
    }
   
    </style>
  </head>
  <body>
    <h3>Daftar Member</h3>
  <div class="slideup">
    <form action="" method="post">
      <input type="text" name="keyword" autofocus autocomplete="off" placeholder="ID/Nama" required />
      <button type="submit" name="cari">cari</button>
    </form>
    <ul class="edit">
      <li>
      <a class="edit1" href="utama.php?page=register_m">+</a><br /><br />
      </li>
      <li >
      <a class="edit1" target="_blank" href="../laporan/laporan_member.php"><i class="fa fa-print"></i></a>
      </li>
    </ul>
    <div >
      <table class="table">
        <tr class="th">
          <th style="border-radius: 10px 0 0 0;">id</th>
          <th>nama</th>
          <th>kelamin</th>
          <th>NIK</th>
          <th>paket</th>
          <th>masuk</th>
          <th>keluar</th>
          <th>biaya</th>
          <th style="border-radius: 0 10px 0 0;">edit</th>
        </tr>
        <?php foreach($data as $d): ?>
        <?php if(date("Y-m-d") == $d['tgl_klr'] ): ?>
        <tr class="red">
        <?php elseif( date("Y-m-d") != $d['tgl_klr'] ): ?>  
        <tr class="green"> 
        <?php endif; ?>
          <td><?= $d['id_member'] ?></td>
          <td><?= $d['nama'] ?></td>
          <td><?= $d['gender'] ?></td>
          <td><?= $d['NIK'] ?></td>
          <td><?= $d['paket'] ?></td>
          <td><?= $d['tgl_msk'] ?></td>
          <td><?= $d['tgl_klr'] ?></td>
          <td><?= number_format($d['biaya']) ?></td>
          <td>
            <a class="ubah" href="utama.php?page=ubah_m&id=<?php echo $d['id_member'] ?>" >ubah</a> 
            <a class="hapus" href="../fungsi/hapus.php?id=<?php echo $d['id_member'] ?>" onclick="return confirm('anda yakin?')" >hapus</a>
          </td>        
        </tr>
        <?php endforeach; ?>
      </table><br>
       <?php if($JMLHlm == 1 || $JmlHlmDt < 4 ): ?>
          <p></p>
        <?php else : ?>
          <?php if($HlmAktf > 1) : ?>
              <a class="geser" href="utama.php?page=member&halaman=<?php echo $HlmAktf - 1; ?>">&lt;</a>
          <?php endif; ?>   
          <?php for($i = 1; $i <= $JMLHlm; $i++) : ?>
              <?php if($i == $HlmAktf) : ?>
                  <a class="ges" href="utama.php?page=member&halaman=<?php echo $i; ?>" ><?php echo $i; ?></a>
              <?php else : ?>
                  <a class="geser" href="utama.php?page=member&halaman=<?php echo $i; ?>" ><?php echo $i; ?></a>
              <?php endif; ?>
          <?php endfor; ?>
          <?php if($HlmAktf < $JMLHlm) : ?>
              <a class="geser" href="utama.php?page=member&halaman=<?php echo $HlmAktf + 1; ?>">&gt;</a>
          <?php endif; ?>
       <?php endif; ?>
    </div>
  </div>
  
  </body>
</html>