<?php

if(isset($_POST['email'])) {
    include('conexao.php');
    
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $cadas = "INSERT INTO cria_senha(email, senha) VALUES('$email', '$senha')";
    $foi = $mysqli->query($cadas) or die($mysqli->error);

    if($foi) {
        echo "Senha cadastrada com sucesso ";
        header("Location: logar.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Senha</title>

        <h1>Cri uma senha Para Logar </h1>
        
        <form action="" method="post">
            <label for="">E-mail : </label>
            <input type="text" name='email'>
            <label for=""> Senha : </label>
            <input type="text" name='senha'>
            <button type='submit'> Criar </button>
        </form>
</head>
<body>
    
</body>
</html>