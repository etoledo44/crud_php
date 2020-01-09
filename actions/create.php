<?php
include '../conexao/conexao.php';
session_start();

$conn = conexaoDB();

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$mod_senha = md5($senha);


$query = ('INSERT INTO clientes (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)');
$stmt = $conn -> prepare($query);
$stmt -> bindParam(1, $nome);
$stmt -> bindParam(2, $sobrenome);
$stmt -> bindParam(3, $email);
$stmt -> bindParam(4, $mod_senha);

if($stmt->execute()){
    $_SESSION['mensagem'] = 'Usuario cadastrado com sucesso!';
    header('Location: ../index.php');
}else{
    $_SESSION['mensagem'] = 'Falha ao cadastrar usuário!';
    header('Location: actions/create.php');
}

?>