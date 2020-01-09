<?php
include '../conexao/conexao.php';
session_start();

$conn = conexaoDB();

$id = $_POST['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$antigaSenha = $_POST['antigaSenha'];

$mod_senha = md5($senha);

$query = ('UPDATE clientes SET nome = :nome, sobrenome = :sobrenome, email = :email, senha = :senha WHERE id = :id' );
$stmt = $conn -> prepare($query);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':sobrenome', $sobrenome);
$stmt -> bindParam(':email', $email);
$stmt -> bindParam(':senha', $mod_senha);
$stmt -> bindParam(':id', $id);

// ------>
$sql = ('SELECT senha FROM clientes WHERE id = :id');
$stmsSenha = $conn -> prepare($sql);
$stmsSenha -> bindParam(':id', $id);
$stmsSenha -> execute();
$resultado = $stmsSenha->fetchAll();
foreach($resultado as $value);
$verify_senha = $value['senha'];

if(md5($antigaSenha) != $verify_senha){
    $_SESSION['mensagem'] = 'Falha ao atualizar usuário, senha errada!';
    header("Location: ../cliente.php?id={$id}");
}else{
    $stmt->execute();
    $_SESSION['mensagem'] = 'Usuario atualizado com sucesso!';
    header('Location: ../index.php');
}

?>