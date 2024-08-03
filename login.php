<?php
    session_start();
    $_SESSION["username"] = "";
    $_SESSION["loggedin"] = false;

    include 'conexao.php';
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM usuarios WHERE username = '$user' AND password = '$pass'";
    $con = Conexao::conectar();
    $result = $con->query($sql);

    if($result->rowCount() > 0){
        $_SESSION["username"] = $user;
        $_SESSION["loggedin"] = true;
        header("Location: listCrianca.php");
    } else {
        echo "Usuário ou senha incorretos";
    }
?>