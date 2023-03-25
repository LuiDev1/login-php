<?php
// CONEXÃO COM O BANCO DE DADOS
$servername = "containers-us-west-173.railway.app:6448";
$database = "railway";
$username = "root";
$password = "AarZzV0aepQ36EAejtZP";


$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
// //

// DECLARAÇÃO DE VARIAVEIS
$login = $_POST['login'];
$pass_no_crypt = $_POST['pass'];
$pass = MD5($_POST['pass']);
// //



$entrada = "SELECT login FROM users WHERE login = '$login' and password = '$pass'";
$select = mysqli_query($conn, $entrada);

if (mysqli_num_rows($select)<=0){
    echo"<script language='javascript' type='text/javascript'>
    alert('Login e/ou senha incorretos');
    window.location.href='login.html';
    </script>";
    die();
  }else{
    setcookie("login",$login);
    header("Location:index.php");
  }

mysqli_close($conn);
?>

 