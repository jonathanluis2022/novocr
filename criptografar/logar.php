<?php
if(isset($_POST['email'])) {
    include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqli_code = "SELECT * FROM logar WHERE email = '$email' LIMIT 1 ";
    $logar = $mysqli->query($sqli_code) or die($mysqli->erro);

    $login = $logar->fetch_assoc();

    if(password_verify($senha , $login['senha'])) {
        if(!isset($_SESSION))
        session_start();

        $_SESSION['usuario'] = $login['id'];
        header("Location: criarSenha.php");

    } else {
        echo "Email ou Senha Incorretos";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar</title>
</head>
<body>
    
    <h1>Logar </h1>

    <form action="" method='post'>
        <input type="text" name='email'>
        <input type="text" name='senha'>
        <button type='submit'> LOGAR </button>
    </form>
</body>
</html>