<?php

if(!isset($_SESSION))
session_start();

if(!isset($_SESSION['usuario']))
die("Voce nao esta Logado.<a href='logar.php'> Click aqui  </a> Para Logar ");

if(isset($_POST['email'])) {
    include('conexao.php');

    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO logar(email, senha) VALUES('$email','$senha')");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criar senha </title>
</head>
<body>
    <h1>Cri sua Senha </h1>

    <form action="" method='POST'>
        <input type="text" name='email'>
        <input type="text" name='senha'>
        <button type='submit'> CRIAR </button>
    </form>

    <p><a href="logout.php"> SAIR</a></p>
    
</body>
</html>