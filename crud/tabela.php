
<?php

    include('conexao.php');
    $exibir = "SELECT * FROM clientes";
    $sqli_code = $mysqli->query($exibir) or die($mysqli->error);
    $num_cliente = $sqli_code->num_rows ; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Cadsatro</title>
</head>
<body>

    <h1>Tabela de Cadsatro </h1>

    <table border='1' cellpadding='10'>

    <thead>
        <td>ID</td>
        <td>NOME</td>
        <td>IDADE</td>
        <td>CPF</td>
        <td>RG</td>
        <td>AÇÕES</td>
    </thead>

    <tbody>

    <?php
        if($num_cliente == 0 ) { ?>
            <tr>
                <td colspan='6'> Nenhum cliente cadastrado </td>
            </tr>

        <?php } else {
            while($cli =  $sqli_code->fetch_assoc()) { ?>
             <tr>
                <td> <?php echo $cli['id']; ?> </td>
                <td> <?php echo $cli['nome']; ?> </td>
                <td> <?php echo $cli['idade']; ?> </td>
                <td> <?php echo $cli['cpf']; ?> </td>
                <td> <?php echo $cli['rg']; ?> </td>
                <td> 
                    <a href="editar.php?id=<?php echo $cli['id']; ?>"> EDITAR </a>
                    <a href="deletar.php?id=<?php echo $cli['id']; ?>"> DELETAR </a>
                </td>
             </tr>

          <?php  }
        } 

        ?>

    </tbody>
    </table>

    <h3><a href="cadastro.php"> Cadastrar </a></h3>
    
</body>
</html>