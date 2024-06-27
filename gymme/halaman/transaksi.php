<?php 
require "../fungsi/fungsi.php";
if(!isset($_SESSION['login'])){
  header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/transaksi.css">
    <title>TRANSAKSI</title>
</head>
<body>
    <h3>TRANSAKSI</h3>
    <div class="formulir">
    <form action="" method="post"> 
        <label for="no_member">ID MEMBER
        <input type="text" id="no_member" name="no_member" required>
        <input type="submit" name="submit" value="cari">
      </form> 
    </div>
    <?php if(isset($_POST['no_member']) ): ?>
    <?php
      $no = $_POST['no_member']; 
      $data = CariTransaksi($no);
      if(empty($data)){
        echo "<script>alert('Hasil pencarian tidak ditemukan'); window.location.href ='utama.php?page=transaksi';</script>";
      }
     ?> 
    <?php foreach($data as $dt): ?>
      <?php 
        $JmlHlmDt = 2;
        $JmlDT = count(query("SELECT * FROM transaksi WHERE id_m='$dt[id_member]'"));
        $JMLHlm = ceil($JmlDT/$JmlHlmDt);
        $HlmAktf = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
        $awal = ($JmlHlmDt * $HlmAktf)- $JmlHlmDt;
        $sql = mysqli_query($my,"SELECT * FROM transaksi WHERE id_m='$dt[id_member]' ORDER BY id DESC LIMIT $awal, $JmlHlmDt ");
        $bayar = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        ?>
      <?php if( $no != "" && $no == $dt['id_member']) :?>
    <div id="container">
        <div class="table_member">
            <table border="1" style="width:40%">
                <tr class="th">
                  <th colspan="4">member</th>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><?= $dt['nama']; ?></td>
                </tr>
                <tr>
                  <td>ID member</td>
                  <td><?= $dt['id_member'] ?></td>
                </tr>
                <tr>
                  <td>Paket</td>
                  <td><?= $dt['paket'] ?></td>
                </tr>
                <tr>
                  <td>tanggal masuk</td>
                  <td><?= $dt['tgl_msk'] ?></td>
                  </tr>
                  <tr>
                  <td>tanggal keluar</td>
                  <td><?= $dt['tgl_klr'] ?></td>
                  </tr>
                <tr >
                  <td colspan="3">
                    <a id="a1" href="../fungsi/proses_transaksi.php?id=<?php echo $dt['id_member'] ?>">bayar</a>
                  </td>
                </tr>
              </table>
              <?php endif; ?>
                <table border="1" style="width: 40%;" class="table">
                  <tr class="th">
                    <th>tanggal bayar</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>cetak</th>
                  </tr>
                  <?php $a = 1 ?>
                  <?php foreach($bayar as $byr): ?>
                    <tr>
                      <td><?= $byr['tgl_bayar'] ?></td>
                      <?php if(empty($byr['biaya'])):  ?>
                      <td><?= $byr['biaya'] ?></td>
                      <?php else: ?>
                      <td><?= number_format($byr['biaya']) ?></td>
                      <?php endif; ?>
                      <td><?= $byr['ket'] ?></td>
                      <td>
                        <a class="cetak" target="_blank" href="../laporan/kuitansi.php?id=<?php echo $byr['id'] ?>">cetak</a>
                        <a class="hapus" href="../fungsi/hapusT.php?id=<?php echo $byr['id'] ?>&idm=<?php echo $byr['id_m'] ?>" onclick="return confirm('anda yakin?')" >hapus</a>
                      </td>
                    </tr>
                    <?php $a++ ?>
                    <?php endforeach; ?>
                  </table>
                  <?php if($HlmAktf > 1) : ?>
                      <a class="geser" href="../fungsi/hg.php?id=<?php echo $byr['id_m'] ?>&halaman=<?php echo $HlmAktf - 1; ?>">&lt;</a>
                    <?php endif; ?>   
                    <?php for($i = 1; $i <= $JMLHlm; $i++) : ?>
                        <?php if($i == $HlmAktf) : ?>
                            <a class="ges" href="../fungsi/hg.php?id=<?php echo $byr['id_m'] ?>&halaman=<?php echo $i; ?>"  ><?php echo $i; ?></a>
                        <?php else : ?>
                            <a class="geser" href="../fungsi/hg.php?id=<?php echo $byr['id_m'] ?>&halaman=<?php echo $i; ?>"  ><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($HlmAktf < $JMLHlm) : ?>
                        <a class="geser" href="../fungsi/hg.php?id=<?php echo $byr['id_m'] ?>&halaman=<?php echo $HlmAktf + 1; ?>">&gt;</a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?php elseif(!isset($_POST['no_member'])): ?>
                    <table border="1" >
                      <tr>
                          <th colspan="2"><h4>LAPORAN</h4></th>
                      </tr>
                      <tr>
                          <td>LAPORAN PEMBAYARAN</td>
                          <td >
                             <form action="../laporan/laporan_transaksi.php" method="POST" target="_blank" >
			                       Mulai Tanggal <input  type="date" name="tgl1" value="<?= date('Y-m-d') ?>"> <br>
			                       Sampai Tanggal <input  type="date" name="tgl2" value="<?= date('Y-m-d') ?>"> <br>
			                       <button class="btn btn-success btn-lg" type="submit" name="tampil">Tampilkan</button>
		                       </form>
                          </td>
                      </tr>
                    </table>
                <?php endif; ?>
          </div>
      </div>
</body>
</html>