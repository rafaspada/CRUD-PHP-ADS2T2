<?php
session_start();
if (!isset($_SESSION) || ($_SESSION["loggedin"] == false)) {
    header("Location: index.php");
}

include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $con = Conexao::conectar();
    try {
        $stmt = $con->prepare('SELECT * FROM crianca WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        $crianca = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$crianca) {
            header("Location: listCrianca.php");
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    header("Location: listCrianca.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Criança</title>
</head>
<body>
    <form action="updateCrianca.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($crianca['id']); ?>">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($crianca['nome']); ?>"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
