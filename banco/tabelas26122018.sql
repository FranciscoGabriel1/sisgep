-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Dez-2018 às 23:24
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisgep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(10) UNSIGNED NOT NULL,
  `setor_idSetor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `setor_idSetor`, `nome`, `senha`, `email`) VALUES
(1, 1, 'Maik e Irene', '1234', 'maikelamide@gmail.com'),
(2, 2, 'Gabriel Marinho', '12345', 'gb@gmail.com'),
(3, 3, 'Admin', '1234', 'admin@admin.com'),
(4, 4, 'Milena', '1234', 'milena@gmail.com'),
(5, 5, 'rubber', '1234', 'rubber@gmail.com'),
(6, 6, 'Fulano', '1234', 'psicultura@gmail.com'),
(7, 7, 'Ciclano', '1234', 'juridico@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `idArquivo` int(10) UNSIGNED NOT NULL,
  `publicacao_idPublicacao` int(10) UNSIGNED NOT NULL,
  `documento` varchar(255) NOT NULL,
  `tipo_idTipo` int(10) UNSIGNED NOT NULL,
  `dataPublicacao` date NOT NULL,
  `horaPublicacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`idArquivo`, `publicacao_idPublicacao`, `documento`, `tipo_idTipo`, `dataPublicacao`, `horaPublicacao`) VALUES
(8, 3, 'formulario.pdf', 2, '0000-00-00', '2018-12-26 20:12:19'),
(9, 3, ' T25.pdf', 2, '0000-00-00', '2018-12-26 20:12:39'),
(10, 3, 'gabriel.pdf', 3, '0000-00-00', '2018-12-26 22:05:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `idPublicacao` int(10) UNSIGNED NOT NULL,
  `administrador_idAdministrador` int(10) UNSIGNED NOT NULL,
  `numeroProcesso` varchar(20) NOT NULL,
  `descricao` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`idPublicacao`, `administrador_idAdministrador`, `numeroProcesso`, `descricao`) VALUES
(3, 3, '001', 'teste1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `idSetor` int(10) UNSIGNED NOT NULL,
  `nomeSetor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`idSetor`, `nomeSetor`) VALUES
(1, 'Fiscalização Ambiental'),
(2, 'Zoneamento Ambiental'),
(3, 'Administrador Master'),
(4, 'Educação Ambiental'),
(5, 'Registro, Monitoramento e Licenciamento'),
(6, 'Piscicultura'),
(7, 'Jurídico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(10) UNSIGNED NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `tipoDocumento`) VALUES
(1, 'Memorando'),
(2, 'Oficio'),
(3, 'Ata'),
(4, 'Comunicado'),
(5, 'Outro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD KEY `administrador_FKIndex2` (`setor_idSetor`);

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`idArquivo`),
  ADD KEY `arquivo_FKIndex1` (`publicacao_idPublicacao`),
  ADD KEY `publicacao_FKIndex2` (`tipo_idTipo`);

--
-- Indexes for table `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `publicacao_FKIndex1` (`administrador_idAdministrador`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`idSetor`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `idArquivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `idPublicacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `idSetor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
