
<?php

if(isset($_POST['email'])) {
    include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $acesso = "SELECT * FROM cria_senha WHERE email = '$email' LIMIT 1 ";
    $deu_certo = $mysqli->query($acesso) or die($mysqli->error);
    $cliente = $deu_certo->fetch_assoc();

    if (password_verify($senha , $cliente['senha'])) {

        if(!isset($_SESSION))
            session_start();

            $_SESSION['usuario'] = $cliente['id'];
            header("Location: cadastro.php");
    } else {
        echo "Falha no Login , email ou senha inicorretos";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer login</title>
    <p>e-mail e senha cadastrado com sucesso !</p>
    <h1>Fazer Login </h1>

    <form action="" method="post">
        <label for="">E-mail : </label>
        <input type="text" name='email'>

        <label for="">Senha  : </label>
        <input type="text" name='senha'>

        <button type='submit'> Logar </button>
    </form>

</head>
<body>
    
</body>
</html>