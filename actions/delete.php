<?php
include '../conexao/conexao.php';
session_start();

$conn = conexaoDB();

$id = $_GET['id'];

$query = ('DELETE FROM clientes WHERE id = :id');
$stmt = $conn -> prepare($query);
$stmt -> bindParam(':id', $id);


if($stmt->execute()){
    $_SESSION['mensagem'] = 'Usuario deletado com sucesso!';
    header('Location: ../index.php');
}else{
    $_SESSION['mensagem'] = 'Falha ao deletar usuário!';
    header('Location: ../index.php');
}

?>