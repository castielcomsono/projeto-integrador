-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2025 às 02:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoquee`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_clientes`
--

CREATE TABLE `cadastro_clientes` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `IDADE` tinyint(3) NOT NULL,
  `NASCIMENTO` date NOT NULL,
  `SEXO` char(1) NOT NULL,
  `CPF` tinyint(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `TELEFONE` char(11) NOT NULL,
  `CEP` char(8) NOT NULL,
  `ENDERECO` varchar(121) NOT NULL,
  `BAIRRO` varchar(50) NOT NULL,
  `CIDADE` varchar(50) NOT NULL,
  `ESTADO` char(2) NOT NULL,
  `DATA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_clientes`
--

INSERT INTO `cadastro_clientes` (`ID`, `NOME`, `IDADE`, `NASCIMENTO`, `SEXO`, `CPF`, `EMAIL`, `TELEFONE`, `CEP`, `ENDERECO`, `BAIRRO`, `CIDADE`, `ESTADO`, `DATA`, `HORA`) VALUES
(3, 'asd', 22, '0000-00-00', 'm', 127, '312123@mgmail.com', '123213123', '123123', 'asdasd', 'asasd', 'asdad', 'PI', '2025-05-27', '20:05:16'),
(4, 'asd', 22, '0000-00-00', 'm', 127, '312123@mgmail.com', '123213123', '123123', 'asdasd', 'asasd', 'asdad', 'PI', '2025-05-27', '20:05:18'),
(5, 'asd', 22, '0000-00-00', 'm', 127, '312123@mgmail.com', '123213123', '123123', 'asdasd', 'asasd', 'asdad', 'PI', '2025-05-27', '20:05:23'),
(6, 'asd', 22, '0000-00-00', 'm', 127, '312123@mgmail.com', '123213123', '123123', 'asdasd', 'asasd', 'asdad', 'PI', '2025-05-27', '20:05:47'),
(7, 'sofia giacomelli machado', 17, '2007-11-01', 'f', 127, 'asaafdasd@gmail.co', '83991178881', '58040-04', 'av.sao paulo 820', 'estados', 'joao pessoa', 'PB', '2025-05-27', '20:06:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_fornecedor`
--

CREATE TABLE `cadastro_fornecedor` (
  `ID` int(11) NOT NULL,
  `RAZAO_SOCIAL` varchar(150) DEFAULT NULL,
  `NOME_FANTASIA` varchar(150) DEFAULT NULL,
  `CNPJ` char(14) DEFAULT NULL,
  `CPF` char(11) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `SITE` varchar(255) DEFAULT NULL,
  `TELEFONE` char(11) DEFAULT NULL,
  `CEP` char(8) DEFAULT NULL,
  `ENDERECO` varchar(200) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_fornecedor`
--

INSERT INTO `cadastro_fornecedor` (`ID`, `RAZAO_SOCIAL`, `NOME_FANTASIA`, `CNPJ`, `CPF`, `EMAIL`, `SITE`, `TELEFONE`, `CEP`, `ENDERECO`, `BAIRRO`, `CIDADE`, `ESTADO`, `DATA`, `HORA`) VALUES
(4, 'teste dois', 'teste', '12.345.678/000', '70430022492', 'testdois@gmail.com', 'example.com.br', '83999944997', '58058264', 'rua exemplo 123', 'Mangabeira', 'João Pessoa', 'PB', '2025-06-03', '19:22:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_grupos`
--

CREATE TABLE `cadastro_grupos` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_marcas`
--

CREATE TABLE `cadastro_marcas` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `FABRICANTE` varchar(50) NOT NULL,
  `DATA` date NOT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_marcas`
--

INSERT INTO `cadastro_marcas` (`ID`, `NOME`, `FABRICANTE`, `DATA`, `HORA`) VALUES
(7, 'Sonyyyy', 'Sony', '2025-06-04', '20:53:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_produtos`
--

CREATE TABLE `cadastro_produtos` (
  `ID` int(11) NOT NULL,
  `CODIGOBARRAS` varchar(15) DEFAULT NULL,
  `DESCRICAO` varchar(150) NOT NULL,
  `ID_MARCA` int(11) DEFAULT NULL,
  `ID_FORNECEDOR` int(11) DEFAULT NULL,
  `GRUPO` int(11) DEFAULT NULL,
  `PRECO_CUSTO` decimal(10,2) DEFAULT NULL,
  `PRECO_VENDA` decimal(10,2) DEFAULT NULL,
  `ESTOQUE_MIN` decimal(10,2) DEFAULT NULL,
  `ESTOQUE_MAX` decimal(10,2) DEFAULT NULL,
  `ESTOQUE_ATUAL` decimal(10,2) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_usuarios`
--

CREATE TABLE `cadastro_usuarios` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(30) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `NIVEL` varchar(20) NOT NULL,
  `SENHA` varchar(200) NOT NULL,
  `DATA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_usuarios`
--

INSERT INTO `cadastro_usuarios` (`ID`, `USUARIO`, `EMAIL`, `NIVEL`, `SENHA`, `DATA`, `HORA`) VALUES
(3, 'tseses', 'testdois@gmail.com', 'Administrador', 'ugyjguyjgukgukgj', '2025-06-04', '21:22:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo`
--

CREATE TABLE `grupo` (
  `ID` int(11) NOT NULL,
  `nome` varchar(41) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_clientes`
--
ALTER TABLE `cadastro_clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `cadastro_fornecedor`
--
ALTER TABLE `cadastro_fornecedor`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Índices de tabela `cadastro_grupos`
--
ALTER TABLE `cadastro_grupos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `cadastro_marcas`
--
ALTER TABLE `cadastro_marcas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `cadastro_produtos`
--
ALTER TABLE `cadastro_produtos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_FORNECEDOR` (`ID_FORNECEDOR`),
  ADD KEY `ID_MARCA` (`ID_MARCA`);

--
-- Índices de tabela `cadastro_usuarios`
--
ALTER TABLE `cadastro_usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Índices de tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_clientes`
--
ALTER TABLE `cadastro_clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cadastro_fornecedor`
--
ALTER TABLE `cadastro_fornecedor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cadastro_grupos`
--
ALTER TABLE `cadastro_grupos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_marcas`
--
ALTER TABLE `cadastro_marcas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cadastro_produtos`
--
ALTER TABLE `cadastro_produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_usuarios`
--
ALTER TABLE `cadastro_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `grupo`
--
ALTER TABLE `grupo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cadastro_produtos`
--
ALTER TABLE `cadastro_produtos`
  ADD CONSTRAINT `cadastro_produtos_ibfk_1` FOREIGN KEY (`ID_FORNECEDOR`) REFERENCES `cadastro_fornecedor` (`ID`),
  ADD CONSTRAINT `cadastro_produtos_ibfk_2` FOREIGN KEY (`ID_MARCA`) REFERENCES `cadastro_marcas` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
