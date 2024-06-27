<?php 
session_start();
	require "../fungsi/fungsi.php";
    $data = query("SELECT transaksi.*,member.NIK,member.nama
                   FROM transaksi INNER JOIN member ON transaksi.id_m=member.id_member
                   WHERE tgl_bayar BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'
                   ORDER BY tgl_bayar DESC");

if(!isset($_SESSION['login'])){
    header("Location:../index.php");
  }

  $ops = $_SESSION['ids'];
  $opr = mysqli_query($my,"SELECT * FROM petugas WHERE id_kar='$ops'");
  $operator = mysqli_fetch_all($opr,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h1>PLANET GYM</h1>
	<br/>
	<hr/>
	Tanggal <?= $_POST['tgl1']." -- ".$_POST['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NIK</th>
		<th>NAMA</th>
		<th>PAKET</th>
		<th>TANGGAL PEMBAYARAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$i=1;
	$total = 0;
	foreach($data as $dt):
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dt['id_m'] ?></td>
		<td align="center"><?= $dt['NIK'] ?></td>
		<td align=""><?= $dt['nama'] ?></td>
		<td align=""><?= $dt['paket'] ?></td>
		<td align=""><?= $dt['tgl_bayar'] ?></td>
		<td align="right">Rp<?= number_format($dt['biaya']) ?></td>
		<td align="center"><?= $dt['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php $total += $dt['biaya']?>

<?php endforeach; ?>
<tr>
		<td colspan="7" align="right">TOTAL</td>
		<td align="right"><b>Rp<?= number_format($total) ?></b></td>
		<td></td>
	</tr>
	</table>
<table width="100%">
    <?php foreach($operator as $p): ?>    
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p> Jakarta, <?= date('d/m/Y') ?> <br/>
			<?= $p['nama'] ?>,</p>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
    <?php endforeach; ?>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>