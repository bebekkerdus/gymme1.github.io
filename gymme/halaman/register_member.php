<?php
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
}

require "../fungsi/fungsi.php";

if (isset($_POST['regis'])) {
    if(RegisMember($_POST) > 0){
        echo "
    <script>
    alert('member baru berhasil ditambahkan!');
    document.location.href = 'utama.php?page=member';
    </script>";
    }else{
        echo mysqli_error($my);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GYMMY</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
#form{
    height: 707px;
    width: 500px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
#form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label:not([Class]){
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
button{
    margin-top: 30px;
    width: 100%;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover{
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}
select {
    background-color: orange;
    width:420px;
    padding: 8px;
    border-radius:15px;
}

    </style>
</head>
<body>
    <div id="form">
    <form action="" method="post">
        <div style="font-size:28px; margin-left:150px;">REGISTER</div>
        <label for="nama">NAMA</label>
        <input type="text" name="nama" id="nama" required>

        <label for="nik">NIK</label>
        <input type="text" name="NIK" id="nik" minlength="16" maxlength="16" required>

        <label for="gender">GENDER</label>
        <select name="gender" id="gender">
            <option value="laki-laki">laki-laki</option>
            <option value="perempuan">perempuan</option>
        </select>
        
        <br>
        <label for="paket">PILH PAKET</label>
        <select name="paket" id="paket">
            <option value="1">1 BULAN - 100RB</option>
            <option value="2">3 BULAN - 300RB</option>
            <option value="3">6 BULAN - 600RB</option>
            <option value="4">12 BULAN - 1JT</option>
        </select>
        <button class="regis" name="regis" type="input">REGISTER</button>
    </form>
    <form action="utama.php?page=member" method="post">
          <button type="submit">Batal</button>
        </form>
    </div>
</body>
</html>
  
</body>
</html>
