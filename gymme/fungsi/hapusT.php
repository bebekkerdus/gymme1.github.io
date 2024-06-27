<?php
include "fungsi.php";
$id = $_GET['id'];
$idm = $_GET['idm'];

$hps = mysqli_query($my,"DELETE FROM transaksi WHERE id='$id' LIMIT 1");
if($hps){
    echo "
    <form action='../halaman/utama.php?page=transaksi' method='POST'> 
        <input type='hidden' value='$idm' id='no_member'  name='no_member'>
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