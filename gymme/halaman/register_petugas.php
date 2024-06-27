<?php
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
}
if ($dta['petugas'] != "admin") {
  header("location: utama.php");
}

require "../fungsi/fungsi.php";

if (isset($_POST['regis'])) {
    if(RegisPetugas($_POST) > 0){
        echo "
    <script>
    alert('user baru berhasil ditambahkan!');
    document.location.href = 'utama.php?page=petugas';
    </script>";
    }else{
        echo mysqli_error($my);
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GYMMY</title>
    <link rel="stylesheet" href="style/regisp.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="containere">
      <div class="content">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="title">Registrasi</div>
        <div class="kandang">
            <label for="gambar">
              <div class="overlaye">
                <div class="icon">&#x270E;</div>
              </div>
            </label>
        <img id="output" src="../foto_karyawan/user.png" width="100" /><br />
        <input hidden type="file" name="gambar" id="gambar" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />
      </div>
          <div class="user-details">
            <div class="input-box">
              <span class="details">NAMA</span>
              <input type="text" name="nama" placeholder="Masukkan Nama" required />
            </div>
            <div class="input-box">
              <span class="details">ID</span>
              <input type="text" name="id_kar" placeholder="Masukkan ID" maxlength="4" required />
            </div>
            <div class="input-box">
              <span class="details">E-MAIL</span>
              <input type="text" name="email" placeholder="Masukkan E-Mail" required />
            </div>
            <div class="input-box">
              <span class="details">PASSWORD</span>
              <input type="text" name="pass" placeholder="Masukkan Password" required />
            </div>
            <div class="input-box">
              <span class="details">TANGGAL LAHIR</span>
              <input type="date" name="tgl" required />
            </div>
            <div class="input-box">
              <span class="details">Petugas</span>
              <select name="petugas">
                <option value="l">-------</option>
                <option value="operator">Operator</option>
                <option value="admin">Admin</option>
              </select>
            </div>
          </div><br><br>
          <div class="button">
            <input type="submit" name="regis" value="Register" />
          </div>
          <div class="button">
             
          </div>
        </form>
        <form action="utama.php?page=petugas" method="post">
        <div class="button">
        <input type="submit" name="batal" value="Batal" />
        </div>
        </form>
      </div>
    </div>
  </body>
</html>
