-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2018 às 06:27
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(150) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `veiculo` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `cpf`, `data_nascimento`, `email`, `telefone`, `endereco`, `cep`, `bairro`, `numero`, `uf`, `complemento`, `cidade`, `veiculo`, `placa`, `cor`) VALUES
(1, 'Deivisson Sant\'anna Dos santos', '088.178.345-56', NULL, 'deivisson93881847@gmail.com', '71981683396', 'Rua Santa Catarina', '41210290', 'Tancredo Neves', '2015', 'BA', 'casa', 'Salvador', 'GOL', 'SEX-0800', 'VERMELHO'),
(2, 'Deivisson Sant\'anna Dos santos', '088.178.345-56', NULL, 'deivisson93881847@gmail.com', '71981683396', 'Rua Santa Catarina', '41210290', 'Tancredo Neves', '2058', 'BA', 'casa', 'Salvador', 'GOL', 'SEX-0800', 'VERMELHO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
