<?php
session_start();
require "../fungsi/fungsi.php";

$data = query("SELECT * FROM member ");

$ops = $_SESSION['ids'];
  $opr = mysqli_query($my,"SELECT * FROM petugas WHERE id_kar='$ops'");
  $operator = mysqli_fetch_all($opr,MYSQLI_ASSOC);

if(!isset($_SESSION['login'])){
  header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      .operator{
        border: none;
      }
      table{
        width: 100%;
      }
      .member,
      .th {
        border: 1px solid rgb(165, 165, 165);
        border-collapse: collapse;
        padding: 10px;
      }
      @media print{
			.print{
				display: none;
			}
		}
     
    </style>
  </head>
  <body>
    <h1>Daftar Member</h1>
    <hr>
      <table class="member">
        <tr>
          <th class="th"><h3>NO</h3></th>
          <th class="th"><h3>ID</h3></th>
          <th class="th"><h3>NAMA</h3></th>
          <th class="th"><h3>KELAMIN</h3></th>
          <th class="th"><h3>NIK</h3></th>
          <th class="th"><h3>PAKET</h3></th>
          <th class="th"><h3>tgl_masuk</h3></th>
          <th class="th"><h3>tgl_keluar</h3></th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data as $d): ?>
        <tr>
          <td class="th"><?= $i  ?></td>
          <td class="th"><?= $d['id_member'] ?></td>
          <td class="th"><?= $d['nama'] ?></td>
          <td class="th"><?= $d['gender'] ?></td>
          <td class="th"><?= $d['NIK'] ?></td>
          <td class="th"><?= $d['paket'] ?></td>
          <td class="th"><?= $d['tgl_msk'] ?></td>
          <td class="th"><?= $d['tgl_klr'] ?></td>   
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </table>

    <table class="operator" border="0" >
    <?php foreach($operator as $p): ?>    
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Jakarta, <?= date('d/m/Y') ?> <br/>
      <?= $p['nama'] ?> ,
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