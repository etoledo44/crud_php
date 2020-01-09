CREATE DATABASE IF NOT EXISTS `crud`;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `senha` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
)