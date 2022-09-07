-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Set-2022 às 04:51
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `estoque` varchar(100) DEFAULT NULL,
  `preco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `categoria`, `imagem`, `estoque`, `preco`) VALUES
(1, 'Camisa E.M - Feminino - Tamanho M', 'Camisa para estudantes do Unasp-HT do gênero feminino do tamanho M.', 'Camisa-Feminina', 'image/camisa.jpg', '2', 'R$79,90'),
(2, 'Calça E.M - Masculino - Tamanho G', 'Calça para estudantes do Unasp-HT do gênero masculino do tamanho G.', 'Calça-Masculina', 'image/calca.jpg', '5', 'R$99,90'),
(4, 'Camisa E.M - Masculino - Tamanho GG', 'Camisa para estudantes do Unasp-HT do gênero masculino do tamanho GG.', 'Camisa-Masculina', 'image/camisa.jpg', '3', 'R$69,90'),
(5, 'Calça E.M - Feminino - Tamanho P', 'Calça para estudantes do Unasp-HT do gênero feminino do tamanho P.', 'Camisa-Masculina', 'image/calca.jpg', '0', 'R$109,90');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
