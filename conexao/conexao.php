<?php
function conexaoDB(){
    try {
        $pdo = new PDO('mysql:host=localhost', 'root', '');
        $sql = 'CREATE DATABASE IF NOT EXISTS `crud`';
        $pdo -> exec($sql);
        $sql = 'use crud';
        $pdo -> exec($sql);
        $sql = 'CREATE TABLE IF NOT EXISTS `clientes` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nome` varchar(225) NOT NULL,
            `sobrenome` varchar(255) NOT NULL,
            `email` varchar(225) NOT NULL,
            `senha` varchar(225) NOT NULL,
            PRIMARY KEY (`id`)
          )';
        $pdo -> exec($sql);
        return $pdo;
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
    }
?>