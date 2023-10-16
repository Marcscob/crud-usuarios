 <?php
    include('conexao.php');

    $sql_users = "SELECT * FROM users";

    //mysqli é um objeto; query é um método do objeto mysqli
    //abaixo a var $query_users recebe o resultado da função $mysqli->query($sql_users) ou caso haja falha na conexão com o banco exibe a msg de erro através de ($mysqli->error)

    $query_users = $mysqli->query($sql_users) or die($mysqli->error);

    //verifica quantas linhas possui a tabela, ou seja, o num de usuários

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

     <table border="1" cellpadding="10">
         <thead>
             <th>ID</th>
             <th>Nome</th>
             <th>Email</th>
             <th>Telefone</th>
             <th>Nascimento</th>
             <th>Data</th>
             <th></th>
         </thead>
         <tbody>
             <?php
                if ($num_users == 0) { ?>
                 <tr>
                     <td colspan="7">nenhum cliente cadastrado</td>
                 </tr>
                 <?php } else {
                    while ($user = $query_users->fetch_assoc()) {


                    ?>
                     <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     </tr>
             <?php }
                } ?>

             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
             </tr>

         </tbody>
     </table>

 </body>

 </html>