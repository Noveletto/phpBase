-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2022 às 20:44
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
-- Banco de dados: `tccofc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Camisa-Masculina'),
(2, 'Camisa-Feminina'),
(3, 'Calça-Masculina'),
(4, 'Calça-Feminina'),
(5, 'Livro-Escolar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE `city` (
  `ID_city` int(11) NOT NULL,
  `city` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `city`
--

INSERT INTO `city` (`ID_city`, `city`) VALUES
(1, 'Hortolandia'),
(2, 'Sumare'),
(3, 'Campinas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `pais` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `cep` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome`, `pais`, `estado`, `endereco`, `cep`, `telefone`, `email`, `image`) VALUES
(1, 'Gustavo Noveletto', 'Brasil', 'SP', 'Rua do Trabalho de Conclusão de Curso', '13452-623', '(19) 9 99961-3108', 'teste.tcc@gmail.com', 'image/calca1.jpg'),
(2, 'Gabriel Oscar', 'Argentina', 'BA', 'Rua de La Feliciudade', '12350-2479', '(852) 94721-18246', 'gabriel@oscar.gmail', 'image/historia.png');

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
(12, 'Calça E.M - Masculino - Tamanho M', 'Calça para estudantes do Unasp-HT do Ensino Médio do gênero masculino do tamanho M.', 'Calça-Masculina', 'image/calca1.jpg', '2', '100'),
(13, 'Livro Matemática - 3° E.M', 'Livro para estudantes do ensino médio do UNASP - HT, apenas o primeiro módulo.', 'Livro-Escolar', 'image/imagem_2022-09-07_094649543.png', '2', '60.50'),
(14, 'Livro História - 3° E.M', 'Livro para estudantes do TERCEIRO ano do ensino médio do UNASP - HT, com 620 páginas.', 'Livro-Escolar', 'image/historia.png', '4', '80'),
(15, 'Livro Português - 3° E.M', 'Livro para estudantes do TERCEIRO ano do ensino médio do UNASP - HT, com 159 páginas.', 'Livro-Escolar', 'image/imagem_2022-09-15_154113011.png', '2', '100'),
(16, 'Camisa E.M - Masculino - Tamanho G', 'Camisa para estudantes do Unasp-HT do gênero masculino do tamanho G.', 'Camisa-Masculina', 'image/camisaEM.jpg', '5', '60'),
(17, 'Coleção Ensino Médio - 3° Ano - Anual', 'Livros de Sociologia, Filosofia, Ensino Religioso e Espanhol para os alunos do 3° Ano do Ensino Médi', 'Livro-Escolar', 'image/imagem_2022-10-18_224009714.png', '3', '183'),
(18, 'SIE - E.M. 3º ANO - 2º SEMESTRE', 'Livro SIE do Ensino Médio do 1º Semestre para os alunos do 3° do Unasp-HT', 'Livro-Escolar', 'image/imagem_2022-10-18_224954924.png', '1', '730.50'),
(19, 'Camiseta Manga Curta Ensino Fundamental - P', 'Camisa para estudantes do Unasp-HT Unissex do tamanho P.', 'Camisa-Masculina', 'image/imagem_2022-10-27_140255071.png', '3', '46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg`
--

CREATE TABLE `reg` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reg`
--

INSERT INTO `reg` (`name`, `username`, `password`, `city`, `image`, `gender`, `id`) VALUES
('Gustavo', 'g@u', '1', 'Hortolandia', 'image/067.JPG', 'male', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regclientestcc`
--

CREATE TABLE `regclientestcc` (
  `name` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regclientestcc`
--

INSERT INTO `regclientestcc` (`name`, `username`, `password`, `city`, `image`, `gender`, `id`) VALUES
('Gustavo', 'gustavo@g', '1', 'Sumare', 'image/040.JPG', 'male', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID_city`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `regclientestcc`
--
ALTER TABLE `regclientestcc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `ID_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `regclientestcc`
--
ALTER TABLE `regclientestcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
