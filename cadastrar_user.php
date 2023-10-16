<?php

//Validando o post
//paraverificar se a variável existe e imprimi-la
/*if(isset($_POST)) {
    var_dump($_POST);
}

//ou verificar se há algum carcater no array post para imprimir
if(count($_POST) > 0) {
var_dump($_POST);
}*/

function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}



if (count($_POST) > 0) {

    include('conexao.php');

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['dataNascimento'];

    if (empty($nome)) {
        $erro = "preencha o nome";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "preencha o email";
    }

    if (!empty($nascimento)) {
        $pedacos = explode('/', $nascimento);
        if (count($pedacos) == 3) {
            $nascimento = implode('-', array_reverse($pedacos));
        } else {
            $erro = "a data de nascimento deve seguir o padrão dia/mes/ano";
        }
    }

    if (!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if (strlen($telefone) != 11)
            $erro = "o telefone deve seguir o padrão (11) 98888-8888";
    }

    if ($erro) {
        echo "<p><b>Erro: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO users (nome, email, data_nascimento, telefone, date) VALUES ('$nome', '$email', '$data_nascimento', '$telefone', NOW())";

        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {
            echo "<p><b>Usuário cadastrado com sucesso</b></p>";
            unset($_POST);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>

<body>
    <header style="background-color: green; height: 40px;">
        <nav>
            <a href="/lista.php" style="color: white;">Lista de Usuários</a>
        </nav>
    </header>
    
        <form action="" method="post">

            <h2>Cadastro de Usuários</h2>
            <br>
            <label>Nome</label>
            <input value="<?php if (isset($_POST['nome'])) echo $_POST['nome'] ?>" type="text" name="nome" id="nome"> <br> <br>

            <label>E-mail</label>
            <input value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" type="text" name="email" id="email"> <br><br>

            <label>Telefone</label>
            <input value="<?php if (isset($_POST['telefone'])) echo $_POST['telefone'] ?>" type="text" placeholder="(11) 9888-8888" name="telefone" id="telefone"> <br><br>

            <label>Data de Nascimento</label><br>
            <input value="<?php if (isset($_POST['dataNascimento'])) echo $_POST['dataNascimento'] ?>" type="date" name="dataNascimento" id="dataNascimento"> <br><br>

            <label>Cadastrado em: </label>
            <input value="<?php if (isset($_POST['dataCadastro'])) echo $_POST['dataCadastro'] ?>" type="text" name="dataCadastro" id="dataCadastro"> <br><br>

            <label> Senha</label>
            <input value="<?php if (isset($_POST['senha'])) echo $_POST['senha'] ?>" type="text" name="senha" id="senha"><br><br>

            <input type="submit" value="Cadastrar">
        </form>

    

    

</body>

</html>