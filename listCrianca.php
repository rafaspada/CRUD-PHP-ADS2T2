<?php
    session_start();
    if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
        header("Location: index.php");
    }
    include 'conexao.php';
    $sql = 'select * from crianca';
    $con = Conexao::conectar();
    $listCrianca = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alunos - Casa da Criança</title>
</head>
<body>
    <button type="button" onclick="location.href = '/aula1406/createCrianca.php'">+ Nova Criança</button>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <tr>
            <?php foreach($listCrianca as $crianca){
               echo '<tr>
                        <td>' . $crianca['id'] . '</td>
                        <td>' . $crianca['nome'] . '</td>
                        <td> <button type="button" onclick="location.href = \'/aula1406/deleteCrianca.php?id=' . $crianca['id'] . '\'">Excluir</button></td>
                        <td> <button type="button" onclick="location.href = \'/aula1406/editCrianca.php?id=' . $crianca['id'] . '\'">Atualizar</button></td>
                    <tr>';
            }
            ?>
        </tr>
    </table>
</body>
</html>