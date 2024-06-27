<?php 
session_start();
require "../fungsi/fungsi.php";
$data = query("SELECT transaksi.*,member.nama
               FROM transaksi 
               INNER JOIN member ON transaksi.id_m=member.id_member
               WHERE id ='$_GET[id]' ORDER BY id DESC LIMIT 1"
               );

if(!isset($_SESSION['login'])){
  header("Location:../index.php");
}
$ids = $_SESSION['ids'];
$query = mysqli_query($my,"SELECT * FROM petugas WHERE id_kar='$ids'");
$p = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<html>
<head>
<title>KUITANSI</title>
<style>
 
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
@media print{
			.print{
				display: none;
			}
		}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<?php foreach($data as $dt): ?>

<center>
<table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='CENTER'>
<span style='color:black;'><b>PLANET GYM</b></span></br><br>
 
<span style='font-size:12pt; '><b><?= $dt['nama'] ?></b></span></br>

<span style='font-size:12pt'><b><?= $dt['id_m'] ?></b></span></br><br>

</td>
</table>
<table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
<tr align='center'>
  <tr>
  <td colspan='5'><hr></td>
  </tr>
  <tr>
  <td colspan = '4'><div style='text-align:center; color:black; font-family:Arial, Helvetica, sans-serif'>Paket : </div></td><td style=' font-size:12pt; color:black;'><?= $dt['paket']  ?> </td>
  </tr>
  <tr>
  <td colspan = '4'><div style='text-align:center; color:black; font-family:Arial, Helvetica, sans-serif'>Harga : </div></td><td style=' font-size:12pt; color:black;'>Rp<?= number_format($dt['biaya']) ?></td>
  </tr>
  
</tr>
<tr>
<td colspan='5'><hr></td>
</tr>
<tr>
  <td colspan = '4'><div style='text-align:center; color:black; font-family:Arial, Helvetica, sans-serif'><b>Total</b> : </div></td><td style=' font-size:12pt; color:black;'><b>Rp<?= number_format($dt['biaya']) ?></b></td>
</tr>
</table>
<?php foreach($p as $pt): ?>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='right'>Jakarta, <?= date("d/M/Y")?><br><?= $pt['nama'] ?></br></td></tr></table>
<?php endforeach; ?><br><br>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='right'>_________</br></td></tr></table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'><b>****** TERIMAKASIH ******</b></br></td></tr></table></center>
<?php endforeach; ?>
</body><br><br>

<a  href="#" style="margin-left:40%;" onclick="window.print();"><button class="print">CETAK</button></a>

</html>