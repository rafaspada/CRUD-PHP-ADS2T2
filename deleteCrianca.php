<?php
    session_start();
    if(!isset($_SESSION) || ($_SESSION["loggedin"] == false)){
        header("Location: index.php");
    }

    include 'conexao.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $con = Conexao::conectar();
        try{
            $stmt = $con->prepare('DELETE FROM crianca WHERE id = :v1');

            $stmt->execute(array(
                ':v1' => $id
            ));

            if($stmt->rowCount() > 0){
                header("Location: listCrianca.php");
            }
        } catch(PDOException $e){
            echo 'Erro: ' . $e->getMessage();
        }
    } else 
        echo "Não foi identificada a criança a ser excluída!"
?>