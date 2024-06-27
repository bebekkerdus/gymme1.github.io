<?php 
require "../fungsi/fungsi.php";

if(!isset($_SESSION['login'])){
    header("Location:../index.php");
  }

if(isset($_POST['ubah'])){
    if(UbahMember($_POST) > 0){
        echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href = 'utama.php?page=member';
    </script>";
    }else{
        echo "
        <script>
        alert('data tidak berhasil diubah!');
        document.location.href = 'utama.php?page=member';
        </script>";
    }
}
$id = $_GET['id'];
$querys = mysqli_query($my,"SELECT * FROM member WHERE id_member='$id'");
$dt = mysqli_fetch_assoc($querys);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        label{
            margin-left: 75px;
       
        }
        .paket {
            display:flex;
            margin:auto;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            margin: 30px 0 50px 0;
            font-size: 20px;
            font-weight: bolder;
            padding: 15px 0; 
            text-align: center;
        }
        .paket:hover{
            background-color: #9b59b6;
        }
        .paket:has(>input:checked){
            background-color: purple;
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
</head>
<body>
<div id="form">
    <form action="" method="post" >
        <div style="font-size: 35px; font-weight: bolder;" >ganti paket : </div>
         <input type="hidden" name="id" id="id" value="<?php echo $dt['id_member'] ?>">
        <label for="1" class="paket"> 
            <input hidden id="1" type="radio" name="paket" value="1">
             <label for="1" >paket 1 (1 BULAN - 100RB)</label>
        </label>
        <label for="2" class="paket">
            <input hidden id="2" type="radio" name="paket" value="2">
            <label for="2" >paket 2 (3 BULAN - 300RB)</label>
        </label>
        <label for="3" class="paket">
            <input hidden id="3" type="radio" name="paket" value="3">
            <label for="3">paket 3 (6 BULAN - 600RB)</label>
        </label>
        <label  for="4" class="paket" >
            <input hidden id="4" type="radio" name="paket" value="4">
            <label for="4">paket 4 (12 BULAN - 1JT)</label>
        </label>
        <button type="input" name="ubah" id="paket">ubah</button>
    </form>
    <form action="utama.php?page=member" method="post">
    <button type="input" name="batal" id="paket">batal</button>
    </form>
</div>
</body>
</html>