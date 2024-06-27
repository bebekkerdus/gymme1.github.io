<?php 
session_start();
require "fungsi/fungsi.php";

if (isset($_POST['login'])) {
  $id = $_POST['ID'];
  $pass = $_POST['pass'];
  //cek
  $cek = mysqli_query($my,"SELECT * FROM  petugas WHERE id_kar='$id' ");
  if(mysqli_num_rows($cek) === 1 ){
    $row = mysqli_fetch_assoc($cek);
    if(password_verify($pass,$row['password'])){
      $_SESSION['login'] = true;
      $_SESSION['ids'] = $id;
      date_default_timezone_set("Asia/Jakarta");
      $waktu = date("Y-m-d")." ". date("H:i:sa");
      mysqli_query($my,"UPDATE petugas SET wkt_msk='$waktu' WHERE id_kar='$id'");

      header('location: halaman/utama.php');
      exit;
    }
  }
  $error = true;
}

if(isset($_SESSION['login'])){
  header('Location: halaman/utama.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>PLANET GYM</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="shortcut icon" href="img/Untitled.png" />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <div class="container">
      <div class="screen">
        <div class="screen__content">
          <h1 class="name">LOGIN</h1>
        <?php 
        if(isset($error)){
          echo "<div class='warning'>ID atau password salah</div>";
          }
        ?>
          <form class="login" method="post">
            <div class="login__field">
              <i class="login__icon fas fa-user"></i>
              <input name="ID" type="text" class="login__input" placeholder="ID" maxlength="4" required  />
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input name="pass" type="password" class="login__input" placeholder="Password" required />
            </div>
            <button name="login" class="button login__submit">
              <span class="button__text">Log In Now</span>
              <i class="button__icon fas fa-chevron-right"></i>
            </button>
          </form>
        </div>
        <div class="screen__background">
          <span class="screen__background__shape screen__background__shape4"></span>
          <span class="screen__background__shape screen__background__shape3"></span>
          <span class="screen__background__shape screen__background__shape2"></span>
          <span class="screen__background__shape screen__background__shape1"></span>
        </div>
      </div>
    </div>

    <!-- partial -->
  </body>
</html>
