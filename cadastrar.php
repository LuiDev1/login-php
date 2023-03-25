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


// // VERIFICAÇÕES NECESSÁRIAS
// VERIFICANDO SE O LOGIN ESTÁ VAZIO
if ($login == null || $login == ""){
   echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');
    window.location.href='cadastro.html';
    </script>";

    exit;
}
// //

// VERIFICANDO A QUANTIDADE DE CARACTERES DO LOGIN
if(strlen($login) <5){
    echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve conter no minimo 5 caracteres');
    window.location.href='cadastro.html';
    </script>";

    exit;
}
// //

// VERIFICANDO A QUANTIDADE DE CARACTERES DA SENHA
if(strlen($pass_no_crypt) > 12){
     echo "<script language='javascript' type='text/javascript'>
    alert('Sua senha é muito grande!');
    window.location.href='cadastro.html';
    </script>";

    exit;
}
// //

// VERIFICANDO SE A INFORMAÇÃO JA EXISTE
$select_user = "SELECT login FROM users WHERE login = '$login'";
$select = mysqli_query($conn, $select_user);
$array = mysqli_fetch_array($select);

if ($array != null){
    $logarray = $array['login'];
} else{
    $logarray = null;
}

if($logarray == $login){
    echo "<script language='javascript' type='text/javascript'>
    alert('Esse login já existe!');
    window.location.href='cadastro.html';
    </script>";

    exit;
}




//  INSERÇÃO DE DADOS NO BANCO
$sql = "INSERT INTO users (login, password) VALUES ('$login', '$pass')";

// mysqli_query($conn, $sql)


//VERIFICAÇÃO DE ERROS AO CADASTRAR INFORMAÇÕES NO BANCO

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

 