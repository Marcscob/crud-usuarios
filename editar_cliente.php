<?php

include('conexao.php');
$id = intval($_GET['id']);
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    if(empty($nome)) {
        $erro = "Preencha o nome";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail";
    }

    
   if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "UPDATE clientes
        SET nome = '$nome', 
        email = '$email' 
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }

}

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Alterar Dados</h1>
    <a href="clientes.php">Voltar para a lista de Usuários</a> &nbsp; 
    <a href="cadastrar_cliente.php">Cadastrar um Novo Usuário</a>
    <br><br>
    <form method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php echo $cliente['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php echo $cliente['email']; ?>" name="email" type="text">
        </p>
        
        
        <p>
            <button type="submit">Salvar Usuário</button>
        </p>
    </form>
</body>
</html>