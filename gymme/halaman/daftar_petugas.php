<?php

require "../fungsi/fungsi.php";
if(!isset($_SESSION['login'])){
  header("Location:../index.php");
}
if ($dta['petugas'] != "admin") {
  header("location: utama.php");
}

$JmlHlmDt = 4;
$JmlDT = count(query("SELECT * FROM petugas"));
$JMLHlm = ceil($JmlDT/$JmlHlmDt);
$HlmAktf = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awal = ($JmlHlmDt * $HlmAktf)- $JmlHlmDt;

$data = query("SELECT * FROM petugas ORDER BY id_kar ASC LIMIT $awal, $JmlHlmDt");
if (isset($_POST['cari'])) {
      $data = CariPetugas($_POST['keyword']);
      if (empty($data)) {
          echo "<script>alert('Hasil pencarian tidak ditemukan'); window.location.href = 'utama.php?page=petugas';</script>";
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
    .bt {
          padding: 10px;
          margin-left: 32%;
          font-size: 20px;
        }
      .cl{
        background-color:blue;
      }
      form{
        position: absolute;
        z-index: 1;
        margin-top: 20px;
      }
      .tambah{
        margin-left: 1045px ;
        z-index: 2;
        background-color: green;
       text-decoration: none;
       color: white;
       padding:2px 15px 8px 15px;
       border-radius: 10px;
       font-size: 30px;
       margin-right: 10px;
       text-decoration: none;
      }
      .tambah:hover{
        background-color: black;
      }
   </style>
  </head>
  <body>
    <h3>Petugas</h3>
    <div class="slideup">
    <form action="" method="post">
      <input type="text" name="keyword" autofocus autocomplete="off" placeholder="id_karyawan/petugas" required/>
      <button type="submit" name="cari">cari</button>
    </form>
    <a class="tambah" href="utama.php?page=register_p">+</a>
    <br><br>
    <div >
      <table class="petugas" >
        <tr class="th">
          <th style="border-radius: 10px 0 0 0;">id</th>
          <th>petugas</th>
          <th>nama</th>
          <th>email</th>
          <th>umur</th>
          <th>masuk</th>
          <th>keluar</th>
          <th style="border-radius: 0 10px 0 0;">edit</th>
        </tr>
        <?php foreach($data as $dt): ?>
        <tr class="cl">
          <td><?= $dt['id_kar'] ?></td>
          <td><?= $dt['petugas'] ?></td>
          <td><?= $dt['nama'] ?></td>
          <td><?= $dt['email'] ?></td>
          <td><?= umur($dt['tgl_lahir']);  ?></td>
          <td><?= $dt['wkt_msk'] ?></td>
          <td><?= $dt['wkt_klr'] ?></td>
          <td><a class="ubah"  href="utama.php?page=ubah_p&id=<?php echo $dt['id'] ?>">ubah</a>  
          <a class="hapus" href="../fungsi/hapus.php?id=<?php echo $dt['id'] ?>" onclick="return confirm('anda yakin?')">hapus</a></td>
        </tr>
        <?php endforeach; ?>
      </table><br>
          <?php if($HlmAktf > 1) : ?>
              <a class="geser" href="utama.php?page=petugas&halaman=<?php echo $HlmAktf - 1; ?>">&lt;</a>
          <?php endif; ?>   
          <?php for($i = 1; $i <= $JMLHlm; $i++) : ?>
              <?php if($i == $HlmAktf) : ?>
                  <a class="ges" href="utama.php?page=petugas&halaman=<?php echo $i; ?>"  ><?php echo $i; ?></a>
              <?php else : ?>
                  <a class="geser" href="utama.php?page=petugas&halaman=<?php echo $i; ?>"  ><?php echo $i; ?></a>
              <?php endif; ?>
          <?php endfor; ?>
          <?php if($HlmAktf < $JMLHlm) : ?>
              <a class="geser" href="utama.php?page=petugas&halaman=<?php echo $HlmAktf + 1; ?>">&gt;</a>
          <?php endif; ?>
    </div>
    </div>
  </body>
</html>
