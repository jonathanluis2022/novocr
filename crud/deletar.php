
<?php

    include('conexao.php');
    $id = $_GET['id'];

    if(isset($_POST['confirmar'])) {
        $del = "DELETE FROM clientes WHERE id = '$id' ";
        $code = $mysqli->query($del) or die($mysqli->error);
        if($code) {
            echo "<h3> Cliente deletado com sucesso </h3> "; ?> 
            <h3><a href="tabela.php"> voltar </a> para tabela </h3>
        <?php }
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DELETAR </title>
</head>
<body>
    <h1>Tem certeza que deseja deletar esse cliente ? </h1>

    <form action="" method='post'>
        <p><h2><a href="tabela.php">NÃO</a></h2></p>
        <br>
        <p><h2><button name='confirmar' type='submit'> DELETAR </button></h2></p>
    </form>
</body>
</html>