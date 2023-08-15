-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/08/2023 às 03:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_testeestagio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(10) NOT NULL,
  `nome_cadastro` varchar(100) NOT NULL,
  `data_nascimento_cad` date NOT NULL,
  `email_cadastro` varchar(45) NOT NULL,
  `celcontato_cadastro` varchar(20) NOT NULL,
  `telcontato_cadastro` varchar(20) NOT NULL,
  `profissao_cadastro` varchar(100) NOT NULL,
  `whats_cadastro` varchar(10) NOT NULL,
  `sms_cadastro` varchar(10) NOT NULL,
  `notemail_cadastro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `nome_cadastro`, `data_nascimento_cad`, `email_cadastro`, `celcontato_cadastro`, `telcontato_cadastro`, `profissao_cadastro`, `whats_cadastro`, `sms_cadastro`, `notemail_cadastro`) VALUES
(1, 'Luiz Felipe', '2006-06-26', 'lzfpro@outlook.com', '41984962833', '4130296206', 'Desenvolvimento web', 'Sim', 'Sim', 'Sim'),
(2, 'Joao', '2000-03-01', 'Joao@teste.com', '41984000000', '4130000000', 'Professor', 'Não', 'Não', 'Não'),
(3, 'Paulo', '1988-04-02', 'paulo@teste.com', '41981231234', '4112345678', 'Professor', 'Sim', 'Não', 'Não');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_cadastro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
