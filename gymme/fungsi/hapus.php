<?php 

include "fungsi.php";
$id = $_GET['id'];

if( DelPetugas($id) > 0){
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = '../halaman/utama.php?page=petugas';
    </script>";
}elseif(DelMember($id) > 0){
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = '../halaman/utama.php?page=member';
    </script>";
}
else{
    echo "
    <script>
    alert('data tidak berhasil dihapus!');
    document.location.href = '../halaman/utama.php?page=petugas';
    </script>";
}

?>
