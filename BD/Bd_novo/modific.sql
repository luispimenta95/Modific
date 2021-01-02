-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02-Jan-2021 às 18:24
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `modific`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nomeAdministrador` varchar(255) DEFAULT NULL,
  `cpfAdministrador` varchar(11) DEFAULT NULL,
  `emailAdministrador` varchar(255) DEFAULT NULL,
  `senhaAdministrador` varchar(255) DEFAULT '12345',
  `ativo` tinyint(1) DEFAULT 1,
  `telefoneAdministrador` varchar(255) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nomeAdministrador`, `cpfAdministrador`, `emailAdministrador`, `senhaAdministrador`, `ativo`, `telefoneAdministrador`, `dataCadastro`) VALUES
(1, 'Luis Felipe', '02342288140', 'luis.pimenta@teste.com', '12345', 1, '61998690313', '2021-01-02 16:48:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `cnpjEmpresa` varchar(50) NOT NULL,
  `telefoneEmpresa` varchar(30) NOT NULL,
  `logoEmpresa` varchar(50) NOT NULL,
  `ativa` tinyint(1) DEFAULT 1,
  `usuario` int(11) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nomeEmpresa`, `cnpjEmpresa`, `telefoneEmpresa`, `logoEmpresa`, `ativa`, `usuario`, `dataCadastro`) VALUES
(1, 'Empresa 01', '1234', '061998690313', 'teste.jpg', 1, 2, '2021-01-02 16:55:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagemObra`
--

CREATE TABLE `imagemObra` (
  `idImagem` int(11) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `obra` int(11) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `obra`
--

CREATE TABLE `obra` (
  `idObra` int(11) NOT NULL,
  `tituloObra` varchar(200) NOT NULL,
  `dataInicial` date NOT NULL,
  `dataProvavel` date NOT NULL,
  `dataEntrega` date DEFAULT NULL,
  `entregue` tinyint(1) DEFAULT 0,
  `empresa` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `statusObra` int(11) DEFAULT NULL,
  `observacoes` longtext DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `obra`
--

INSERT INTO `obra` (`idObra`, `tituloObra`, `dataInicial`, `dataProvavel`, `dataEntrega`, `entregue`, `empresa`, `usuario`, `statusObra`, `observacoes`, `dataCadastro`) VALUES
(1, 'Teste', '2021-01-04', '2021-01-19', NULL, 0, 1, 2, 1, NULL, '2021-01-02 17:23:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusObra`
--

CREATE TABLE `statusObra` (
  `idStatus` int(11) NOT NULL,
  `nomeStatus` varchar(50) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `statusObra`
--

INSERT INTO `statusObra` (`idStatus`, `nomeStatus`, `dataCadastro`) VALUES
(1, 'Iniciada', '2021-01-02 16:56:15'),
(2, 'Em execução', '2021-01-02 16:56:15'),
(3, 'Entregue', '2021-01-02 16:56:33'),
(4, 'Obra pausada', '2021-01-02 16:56:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) DEFAULT NULL,
  `cpfUsuario` varchar(11) DEFAULT NULL,
  `emailUsuario` varchar(255) DEFAULT NULL,
  `senhaUsuario` varchar(255) DEFAULT '12345',
  `ativo` tinyint(1) DEFAULT 1,
  `telefoneUsuario` varchar(255) DEFAULT NULL,
  `engenheiro` tinyint(1) DEFAULT 0,
  `numeroCrea` varchar(20) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `cpfUsuario`, `emailUsuario`, `senhaUsuario`, `ativo`, `telefoneUsuario`, `engenheiro`, `numeroCrea`, `dataCadastro`) VALUES
(1, 'Luis Felipe', '02342288140', 'teste.luis', '12345', 1, '61998690313', 0, NULL, '2021-01-02 16:53:21'),
(2, 'Simone', '60280697104', 'teste.luis', '12345', 1, '61998690313', 1, 'Teste-crea', '2021-01-02 16:53:21');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD UNIQUE KEY `cpfAdministrador` (`cpfAdministrador`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `cnpjEmpresa` (`cnpjEmpresa`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices para tabela `imagemObra`
--
ALTER TABLE `imagemObra`
  ADD PRIMARY KEY (`idImagem`),
  ADD KEY `obra` (`obra`);

--
-- Índices para tabela `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`idObra`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `statusObra` (`statusObra`);

--
-- Índices para tabela `statusObra`
--
ALTER TABLE `statusObra`
  ADD PRIMARY KEY (`idStatus`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpfUsuario` (`cpfUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagemObra`
--
ALTER TABLE `imagemObra`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `obra`
--
ALTER TABLE `obra`
  MODIFY `idObra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `statusObra`
--
ALTER TABLE `statusObra`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagemObra`
--
ALTER TABLE `imagemObra`
  ADD CONSTRAINT `imagemObra_ibfk_1` FOREIGN KEY (`obra`) REFERENCES `obra` (`idObra`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obra_ibfk_2` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`idEmpresa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obra_ibfk_3` FOREIGN KEY (`statusObra`) REFERENCES `statusObra` (`idStatus`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
