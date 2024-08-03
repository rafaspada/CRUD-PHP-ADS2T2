<?php
session_start();
if (!isset($_SESSION) || ($_SESSION["loggedin"] == false)) {
    header("Location: index.php");
}

include 'conexao.php';

if (isset($_POST['id']) && isset($_POST['nome'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $con = Conexao::conectar();
    try {
        $stmt = $con->prepare('UPDATE crianca SET nome = :nome WHERE id = :id');
        $stmt->execute(array(
            ':nome' => $nome,
            ':id' => $id
        ));

        if ($stmt->rowCount() > 0) {
            header("Location: listCrianca.php");
        } else {
            echo "Erro ao atualizar a criança.";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    header("Location: editCrianca.php?id=" . $_POST['id']);
}
?>