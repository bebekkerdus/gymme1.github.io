<?php 
 $my = mysqli_connect("localhost","root","Mindyourhead77","gymme");

 function query($query){
    global $my;
    $hasil = mysqli_query($my,$query);
    $row = mysqli_fetch_all($hasil,MYSQLI_ASSOC);
    return $row;
 }
 

 //-------------------------------------------------------------------------------
//member
function RegisMember($data){
  global $my;

  $nama = htmlspecialchars($data['nama']);
  $NIK = htmlspecialchars($data['NIK']);
  $gender = $data['gender'];
  $paket = $data['paket'];
  $msk = date("Y-m-d");

  function klr($bln){
    date_default_timezone_set("Asia/Jakarta");
    $k = date("Y-m-d", strtotime($bln));
    return $k;
  }

  //paket
  switch ($paket) {
    case '1':
      $klr = klr("+1 month");
      $biaya = "100000";
      break;
    case '2':
      $klr = klr("+3 month");
      $biaya = "300000";
      break;
    case '3':
      $klr = klr("+6 month");
      $biaya = "600000";
      break;
    case '4':
      $klr = klr("+1 year");
      $biaya = "1000000";
      break;
  }

  mysqli_query($my,("INSERT INTO MEMBER(nama,gender,NIK,paket,tgl_msk,tgl_klr,biaya) 
                     VALUES('$nama','$gender','$NIK','$paket','$msk','$klr','$biaya')"));

 
  $dm = mysqli_fetch_array(mysqli_query($my,"SELECT id_member FROM member ORDER BY id_member DESC LIMIT 1"));
  $idmember = $dm['id_member'];

  mysqli_query($my,"INSERT INTO transaksi(id_m) VALUES ('$idmember')");

  return mysqli_affected_rows($my);
}

function DelMember($id){
  global $my;
   mysqli_query($my,"DELETE FROM member WHERE id_member='$id'");

   return mysqli_affected_rows($my);
}

function CariMember($keyword){
  $query = "SELECT * FROM member WHERE id_member LIKE '$keyword' OR nama LIKE '%$keyword%'";
  return query($query);
}

function UbahMember($data){
  global $my;
  $id = $data['id'];
  $paket = $data['paket'];
  $msk = date("Y-m-d");

  function klrb($bln){
    date_default_timezone_set("Asia/Jakarta");
    $k = date("Y-m-d", strtotime($bln));
    return $k;
  }

  //paket
  switch ($paket) {
    case '1':
      $klr = klrb("+1 month");
      $biaya = "100000";
      break;
    case '2':
      $klr = klrb("+3 month");
      $biaya = "300000";
      break;
    case '3':
      $klr = klrb("+6 month");
      $biaya = "600000";
      break;
    case '4':
      $klr = klrb("+1 year");
      $biaya = "1000000";
      break;
  }

   mysqli_query($my,"UPDATE member SET paket='$paket', tgl_msk='$msk', tgl_klr='$klr', biaya='$biaya' WHERE id_member='$id' ");
   
   $dm = mysqli_fetch_array(mysqli_query($my,"SELECT * FROM member WHERE id_member='$id' LIMIT 1"));
   $idmember = $dm['id_member'];
 
   mysqli_query($my,"INSERT INTO transaksi(id_m) VALUES ('$idmember')");


   return mysqli_affected_rows($my);
}
 

 // ----------------------------------------------------------------------------------------------------- 
 //petugas
 function upload(){
  $name = $_FILES['gambar']['name'];
  $ukuran = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp = $_FILES['gambar']['tmp_name'];

  if($error === 4){
    echo "
    <script>
    alert('pilih gambar terlebih dahulu!');
    document.location.href = '../halaman/utama.php?page=register_p';
    </script>";
    return false;
  }

  $ekstensiGambatValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.',$name);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambatValid)){
      echo "
  <script>
  alert('hanya bisa jpg,jpeg,png!');
  document.location.href = '../halaman/utama.php?page=register_p';
  </script>";
      return false;
  }

  if($ukuran > 2000000){
      echo "
  <script>
  alert('ukuran gambar terlalu besar!');
  document.location.href = '../halaman/utama.php?page=register_p';
  </script>";
      return false;
  }

  $namaFile = uniqid();
  $namaFile .= '.';
  $namaFile .= $ekstensiGambar; 
 move_uploaded_file($tmp, '../foto_karyawan/'. $namaFile); 

 return $namaFile;
}

 function RegisPetugas($data){
   global $my;

   $ids = htmlspecialchars($data['id_kar']);
   $nama = htmlspecialchars($data['nama']);
   $pass = htmlspecialchars($data['pass']);
   $email = htmlspecialchars($data['email']);
   $tgl = $data['tgl'];
   $foto = upload();
   $petugas = $data['petugas'];
   
   $pass = password_hash($pass, PASSWORD_DEFAULT);
   
   $cek =  mysqli_query($my, "SELECT id_kar FROM petugas WHERE id_kar='$ids'");

   if ($petugas == "l") {
    echo "
        <script>
        alert('pilih petugas!');
        </script>";
        return false;
        
   }

    if( mysqli_fetch_assoc($cek)){
        echo "
        <script>
        alert('id sudah ada!');
        </script>";
        return false;
        
    }

   if($foto == false){
    exit;
   }

   mysqli_query($my,"INSERT INTO petugas(id_kar,foto,nama,password,email,tgl_lahir,petugas) VALUES('$ids','$foto', '$nama', '$pass','$email','$tgl','$petugas')");

   return mysqli_affected_rows($my);
 }

 function DelPetugas($id){
  global $my;
   mysqli_query($my,"DELETE FROM petugas WHERE id='$id'");

   return mysqli_affected_rows($my);
  
}
function CariPetugas($keyword){
  $query = "SELECT * FROM petugas WHERE id_kar LIKE '$keyword'";
  return query($query);
}

function UbahPetugas($data){
  global $my;
  $id = $data['id'];
  $gambarLama = htmlspecialchars($data['gambarLama']);
  $email = htmlspecialchars($data['email']);
  $pass = htmlspecialchars($data['pass']);
  

  if($_FILES['gambar']['error'] === 4){
      $gambar = $gambarLama;
  }else{
      $gambar = upload();  
  }

  $pass = password_hash($pass, PASSWORD_DEFAULT);

   mysqli_query($my,"UPDATE petugas SET foto='$gambar',  password='$pass',
    email='$email' WHERE id='$id' ");
  return mysqli_affected_rows($my);
}

//-------------------------------------------------------------------------------------
//transaksi

function CariTransaksi($no){
  $query = "SELECT * FROM member WHERE id_member='$no'";
  return query($query);
}

//-----------------------------------------------------------
//umur
function umur($tgl){
  $tgl_lahir = $tgl;
  $tgl_lahir = explode("-", $tgl_lahir);
  $age = (date("md", date("U", mktime(0, 0, 0, $tgl_lahir[1], $tgl_lahir[2], $tgl_lahir[0]))) > date("md")
    ? ((date("Y") - $tgl_lahir[0]) - 1)
    : (date("Y") - $tgl_lahir[0]));
  return $age;
}
?>