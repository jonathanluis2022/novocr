<?php
    include('conexao.php');
    $id = $_GET['id'];

    $pegarOsClientes = "SELECT * FROM clientes";
    $sqli_code = $mysqli->query($pegarOsClientes) or die($mysqli->error);
    $clientes = $sqli_code->fetch_assoc();

    if(count($_POST) > 0 ) {
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
            $sqli_code = "UPDATE clientes 
            SET nome = '$nome',
            idade = '$idade',
            cpf = '$cpf',
            rg = '$rg' 
            WHERE id = '$id'";
            $deu_certo = $mysqli->query($sqli_code) or die($mysqli->error);

            if($deu_certo)
                echo "Cliente editado  com sucesso "; ?>

                <h2><a href="tabela.php"> Voltar </a> Para Tabela </h2>
        <?php }
    } ?>

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
    <p><a href="tabela.php"> TABELA </a> </p>

    <form action="" method='POST'>
        <P>
            <label for=""> Nome: </label>
            <input value="<?php echo $clientes['nome']; ?>" type="text" name='nome'>
        </P>
            <label for=""> Idade: </label>
            <input value="<?php echo $clientes['idade']; ?>" type="text" name='idade'>
        <P>
            <label for=""> Cpf: </label>
            <input value="<?php echo $clientes['cpf']; ?>" type="text" name='cpf'>
        </P>
        <P>
            <label for=""> Rg: </label>
            <input value="<?php  echo $clientes['rg']; ?>" type="text" name='rg'>
        </P>

        <button type='submit'> EDITAR </button>
    </form>
</body>
</html>