<?php 
require "../fungsi/fungsi.php";
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
  }
  if ($dta['petugas'] != "admin") {
    header("location: utama.php");
  }
  


if(isset($_POST['ubah'])){
    if(UbahPetugas($_POST) > 0){
        echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href = 'utama.php?page=petugas';
    </script>";
    }else{
        echo "
        <script>
        alert('data tidak berhasil diubah!');
        document.location.href = 'utama.php?page=petugas';
        </script>";
    }
}
$id = $_GET['id'];
$querys = mysqli_query($my,"SELECT * FROM petugas WHERE id='$id'");
$dt = mysqli_fetch_assoc($querys);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
      #form {
        background-color: rgba(255,255,255,0.13);
        width: 500px;
        text-align: justify;
        padding: 10px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.1);
        box-shadow: 0 0 40px rgba(8,7,16,0.6);
      }
      #form *{
       font-family: 'Poppins',sans-serif;
       letter-spacing: 0.5px;
       outline: none;
       border: none;
       color: #ffffff;
       }
      .kandang {
        max-width: 0;
      }

      #output {
        margin-left: 140px;
        display: block;
        width: 200px;
        height: 200px;
        cursor: pointer;
        border-radius: 100px;
      }

      .overlaye {
        margin-left: 140px;
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 100px;
        opacity: 0;
        transition: 0.3s ease;
        background-color: rgba(132, 0, 255, 0.329);
        cursor: pointer;
      }
      .icon {
        color: rgb(0, 0, 0);
        font-size: 100px;
        top: 90px;
        position: absolute;
        left: 100px;
        transform: translate(-50%, -50%);
        text-align: center;
       
      }

      .kandang:hover .overlaye {
        opacity: 1;
        
      }
      label{
       display: block;
       margin-top: 30px;
       font-size: 16px;
       font-weight: 500;
    }
    .h{
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
    margin-top: 20px;
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
    </style>
<body>
<div id="form">    
<form action="" method="post" enctype="multipart/form-data">
<div style="font-size:30px; font-weight: bolder;"  align="center">UBAH</div><br>
        <input type="hidden" name="id" id="id" value="<?php echo $dt['id'] ?>">
        <input type="hidden" name="gambarLama" value="<?php echo $dt['foto'] ?>">
        <div class="kandang">
            <label for="gambar">
              <div class="overlaye">
                <div class="icon">&#x270E;</div>
              </div>
            </label>
        <img id="output" src="../foto_karyawan/<?php echo $dt['foto'] ?> " width="100" /><br />
        <input hidden type="file" name="gambar" id="gambar" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />
      </div>
        <label for="email">EMAIL : </label>
        <input class="h" type="email" name="email" id="email" autocomplete="off" value="<?php echo $dt['email'] ?>" required>
        <label for="pass">PASSWORD : </label>
        <input class="h" type="text" name="pass" id="pass" autocomplete="off" required><br>
        <button style="cursor: pointer;" type="input" name="ubah">ubah</button>
    </form>
    <form action="utama.php?page=petugas" method="post">
    <button  >batal</button>
    </form>
    </div>
    
</body>
</html>