
<?php

    if(!isset($_SESSION))
    session_start();

    if(!isset($_SESSION['usuario']))
        die("você não esta Logado, <a href='logar.php'>  Click aqui  </a> para Logar !!");

    if(count($_POST) > 0 ) {
        include('conexao.php');
            $erro = false ; 
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];

            if(empty($nome)) {
                $erro = "nome nao inserido ";
            }
            
            if(empty($idade)){
                $erro = "idade nao inserido ";
            }
            
            if(!empty($cpf)) {
                if(!is_numeric($cpf) || (strlen($cpf) !== 11)) {
                    $erro = "cpf nao inserido , 11 digitos e só números";
                }
            }

            if(!empty($rg)) {
                if(!is_numeric($rg) || (strlen($rg) !== 9)) {
                    $erro = "rg nao inserido , 11 digitos e só números";
                }
            }

            if($erro) {
                echo "<h2> $erro </h2>";
            } else {
                $sqli_code = "INSERT INTO clientes(nome, idade, cpf, rg ) 
                VALUES('$nome', '$idade', '$cpf', '$rg')";
                $deu_certo = $mysqli->query($sqli_code) or die($mysqli->error);

                if($deu_certo)
                    echo "Cliente cadastrado com sucesso "; 
                    unset($_POST);
            }
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadsatro</title>
</head>
<body>
    <h1>Cadastrar Clientes </h1>
    <p><a href="tabela.php"> TABELA </a> De Clientes Cadastrados </p>

    <form action="" method='POST'>
        <P>
            <label for=""> Nome: </label>
            <input value="<?php if(isset($nome)) echo $nome ?>" type="text" name='nome'>
        </P>
            <label for=""> Idade: </label>
            <input value="<?php if(isset($idade)) echo $idade ?>" type="text" name='idade'>
        <P>
            <label for=""> Cpf: </label>
            <input value="<?php if(isset($cpf)) echo $cpf ?>" type="text" name='cpf'>
        </P>
        <P>
            <label for=""> Rg: </label>
            <input value="<?php if(isset($rg)) echo $rg ?>" type="text" name='rg'>
        </P>

        <button type='submit'> CADASTRAR</button>
    </form>

    <p><a href="logout.php"> SAIR </a></p>
</body>
</html>