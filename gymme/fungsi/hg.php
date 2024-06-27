<?php
include "fungsi.php";
$id = $_GET['id'];
$hal = $_GET['halaman'];

if($id){
    echo "
    <form action='../halaman/utama.php?page=transaksi&halaman=$hal' method='POST'> 
        <input type='hidden' value='$id' id='no_member'  name='no_member'>
      </form>
    ";
   
}
?>
<script>
    window.onload = function(){
    var button = document.getElementById('no_member');
    button.form.submit();
    }
    </script>