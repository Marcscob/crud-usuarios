<?php include('conexao.php');

$sql_users = "SELECT * FROM users";
$query_users = $mysqli->query($sql_users) or die($mysqli->error);
$num_users = $query_users->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>

<body>
    <h1>Lista de Usuários Cadastrados</h1>
    <p>Usuários Cadastrados no Sistema de Scrap</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>Log do Cadastro</th>
            <th></th>
        </thead>
        <tbody>
            <?php if ($num_users == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum cliente foi cadastrado</td>

                </tr>
                <?php } else {
                while ($users = $query_users->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $users['id']; ?></td>
                        <td><?php echo $users['nome']; ?></td>
                        <td><?php echo $users['email']; ?></td>
                        <td><?php echo $users['telefone']; ?></td>
                        <td><?php echo $users['data_nascimento']; ?></td>
                        <td><?php echo $users['date'] ?></td>
                        <td></td>
                    </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>
</body>

</html>