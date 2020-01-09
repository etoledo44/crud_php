<?php

include '../conexao/conexao.php';

function listagem(){
    $conn = conexaoDB();
    $query = 'SELECT * from clientes';   
    $stmt = $conn -> prepare ($query);
    $stmt -> execute();
    $resultado = $stmt->fetchAll();
}

?>