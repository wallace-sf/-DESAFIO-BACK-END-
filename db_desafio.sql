-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2019 às 05:07
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desafio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `uf` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `uf`) VALUES
(1, 'São Paulo', 'SP'),
(2, 'Ribeirão Preto', 'SP'),
(3, 'Mococa', 'SP'),
(4, 'Uberlândia', 'MG'),
(5, 'Rio de Janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(220) CHARACTER SET utf8 NOT NULL,
  `email` varchar(220) CHARACTER SET utf8 NOT NULL,
  `ddd` char(2) NOT NULL,
  `telefone` char(11) CHARACTER SET utf8 NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `informacoes` varchar(400) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id_contato`, `nome`, `email`, `ddd`, `telefone`, `id_cidade`, `informacoes`) VALUES
(17, 'WALLACE EDUARDO DA SILVA FERREIRA', 'WALLACEEDUA@GMAIL.COM', '19', '19994876232', 3, 'Analista de TI com conhecimento em programação, PHP, JavaScript, CSS, HTML.'),
(18, 'MANO BROWN', 'MANO_BROWN@RACIONAIS.COM', '11', '1136021718', 1, 'Lorem Ipsum Ipsum Ipsum'),
(19, 'GABRIEL MORETTI', 'GABRIEL@MAREST.COM.BR', '34', '3436569121', 4, 'Lorem Ipsum ...'),
(20, 'FERNANDA MONTENEGRO', 'FERNANDA_MONTENEGRO@GMAIL.COM', '21', '2130010506', 5, 'Lorem Ipsum, lorem ipsum, lorem ipsum.'),
(21, 'JOSÉ CARLOS OSÓRIO', 'JOSE_OSORIO@EMAIL.COM', '16', '1691213161', 2, 'Lorem lorem lorem ipsum ipsum ipsum'),
(22, 'JOSÉ LUIZ MARQUES', 'JOSE_LUIS_M@EXEMPLO.COM', '19', '1936651234', 3, 'Lorem infinite ipsum + Lorem ipsum'),
(23, 'ANDRÉ FERNANDES', 'ANDRE_FERNANDES@GMAIL.COM', '34', '3436668787', 4, 'Lorem ipsum 2x'),
(24, 'RODRIGO FARO', 'RODRIGO_FARO@EXEMPLO.COM', '11', '11080044444', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id_contato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
