<?php
require "fungsi.php";
$id = $_GET['id'];
$member = mysqli_query($my,"SELECT * FROM member WHERE id_member='$id' ");
$row = mysqli_fetch_assoc($member);

date_default_timezone_set("Asia/Jakarta");
$tglbayar = date("Y-m-d H:i:s");
$biaya = $row['biaya'];
$paket = $row['paket'];
$keterangan = "lunas";

$br = mysqli_query($my,"UPDATE transaksi SET paket='$paket', tgl_bayar='$tglbayar',biaya='$biaya',ket='$keterangan' WHERE id_m='$id' ORDER BY id DESC LIMIT 1 ");
if($br){
    echo "
    <form action='../halaman/utama.php?page=transaksi' method='POST'> 
        <input type='hidden' value='$id' id='no_member' name='no_member'>  
      </form>
    ";
   
}else{
  echo"
  <script>
    alert('gagal');
   </script>
  ";
}


?>
<script>
  window.onload = function(){
    var button = document.getElementById('no_member');
    button.form.submit();
}
</script>