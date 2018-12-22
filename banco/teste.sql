-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Dez-2018 às 16:09
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sisgep`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setor_idSetor` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `administrador_FKIndex2` (`setor_idSetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `setor_idSetor`, `nome`, `senha`, `email`) VALUES
(1, 1, 'Maik Elamide', 1234, 'maikelamide@gmail.com'),
(2, 2, 'Gabriel', 4321, 'gabriel@gmail.com'),
(3, 3, 'Admin', 1234, 'admin@admin.com'),
(4, 4, 'Milena', 1234, 'milena@gmail.com'),
(5, 5, 'rubber', 1234, 'rubber@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `idArquivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publicacao_idPublicacao` int(10) unsigned NOT NULL,
  `documento` varchar(255) NOT NULL,
  `tipo_idTipo` int(10) unsigned NOT NULL,
  `dataPublicacao` date NOT NULL,
  `horaPublicacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idArquivo`),
  KEY `arquivo_FKIndex1` (`publicacao_idPublicacao`),
  KEY `publicacao_FKIndex2` (`tipo_idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`idArquivo`, `publicacao_idPublicacao`, `documento`, `tipo_idTipo`, `dataPublicacao`, `horaPublicacao`) VALUES
(55, 41, 'html 5.jpg', 3, '0000-00-00', '2018-10-16 21:18:07'),
(58, 40, 'RelatoÌrio Final v.4 [UFAM].pdf', 1, '0000-00-00', '2018-10-24 02:48:33'),
(59, 43, 'au.docx', 1, '0000-00-00', '2018-10-24 03:53:42'),
(60, 44, 'dbsaac.sql', 1, '0000-00-00', '2018-10-24 20:02:39'),
(61, 42, 'RelatoÌrio Final v.4 [UFAM].pdf', 3, '0000-00-00', '2018-10-24 20:45:51'),
(62, 48, 'RelatoÌrio Final v.4 [UFAM].pdf', 3, '0000-00-00', '2018-10-24 21:15:43'),
(63, 52, 'formulario.pdf', 4, '0000-00-00', '2018-10-24 21:19:37'),
(65, 41, 'au.docx', 1, '0000-00-00', '2018-10-24 23:40:05'),
(70, 53, 'TCC Gabriel v6.doc', 1, '0000-00-00', '2018-10-24 23:49:46'),
(71, 54, 'gabriel.pdf', 1, '0000-00-00', '2018-10-24 23:51:18'),
(72, 58, 'report.pdf', 1, '0000-00-00', '2018-10-25 00:01:04'),
(75, 53, 'Teste Web.pdf', 2, '0000-00-00', '2018-10-25 00:05:41'),
(76, 59, 'Android Tablet â€“ 1.png', 1, '0000-00-00', '2018-10-29 18:12:22'),
(78, 59, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-29 18:32:38'),
(79, 60, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-29 18:35:17'),
(80, 61, 'Android Tablet â€“ 1.png', 0, '0000-00-00', '2018-10-29 20:58:15'),
(81, 61, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-29 20:58:26'),
(82, 61, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-30 00:27:22'),
(83, 61, 'Android Tablet â€“ 1.png', 0, '0000-00-00', '2018-10-30 21:40:47'),
(84, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 21:41:02'),
(85, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 21:41:22'),
(86, 61, 'Android Tablet â€“ 1.png', 1, '0000-00-00', '2018-10-30 21:41:42'),
(87, 61, 'Android Tablet â€“ 1.png', 5, '0000-00-00', '2018-10-30 21:41:55'),
(88, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 21:46:12'),
(89, 61, 'Android Tablet â€“ 1.png', 4, '0000-00-00', '2018-10-30 21:50:41'),
(90, 61, 'Android Tablet â€“ 1.png', 4, '0000-00-00', '2018-10-30 21:51:03'),
(91, 61, '23044.png', 4, '0000-00-00', '2018-10-30 21:51:30'),
(92, 61, 'abraao.pdf', 5, '0000-00-00', '2018-10-30 21:51:57'),
(93, 61, '23044.png', 1, '0000-00-00', '2018-10-30 21:52:48'),
(94, 62, 'page6.html', 2, '0000-00-00', '2018-10-31 23:10:42'),
(95, 62, 'spyder_crash.log', 2, '0000-00-00', '2018-10-31 23:31:42'),
(96, 64, 'depositphotos_129376002-stock-photo-cartoon-background-of-road-leading.jpg', 4, '0000-00-00', '2018-11-05 18:20:12'),
(98, 81, '54fccb2601ca957dad9c80233007efb7.png', 2, '0000-00-00', '2018-11-06 19:36:41'),
(99, 65, 'banner icoleta - 2.pdf', 2, '0000-00-00', '2018-11-13 20:33:30'),
(100, 92, 'formulario.pdf', 4, '0000-00-00', '2018-11-14 14:03:07'),
(101, 97, 'portinha.png', 2, '0000-00-00', '2018-12-14 15:02:41'),
(102, 98, 'portinha.png', 2, '0000-00-00', '2018-12-14 15:21:28'),
(103, 104, 'portinha.png', 2, '0000-00-00', '2018-12-14 15:47:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE IF NOT EXISTS `publicacao` (
  `idPublicacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `administrador_idAdministrador` int(10) unsigned NOT NULL,
  `numeroProcesso` varchar(20) NOT NULL,
  `descricao` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`idPublicacao`),
  KEY `publicacao_FKIndex1` (`administrador_idAdministrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`idPublicacao`, `administrador_idAdministrador`, `numeroProcesso`, `descricao`) VALUES
(41, 3, '001/admin', 'teste1'),
(44, 5, 'rubber1', 'rub1'),
(64, 5, 'sdfsffs', 'sfffffffffffffffffffffsd dsdffffffffffffffffffffffffff gggggggggg ddddddd ssss'),
(65, 2, 'fisica 2', 'um breve reesumo'),
(66, 4, 'fisica 2', 'um breve reesumo'),
(81, 2, 'oia', 'vamos falar de gado'),
(82, 2, '8yui6667', '8tyhfg sdsds d dsdsd'),
(83, 2, 'dsda', 'adada'),
(84, 2, 'dasdad', 'adadad'),
(85, 2, 'zxzxz', 'zzzzz'),
(86, 2, 'ccccc', 'cccccc'),
(87, 2, 'fefff', 'ddfs'),
(89, 2, 'zczczc', 'zccczczc'),
(90, 2, 'zczczczc', 'wwddwdw'),
(91, 2, 'zzwwwww', 'wwwff'),
(92, 2, 'dwdwdd', 'dwdwd'),
(93, 2, 'ggg', 'ssss'),
(97, 2, 'ssjjssds', 'sddsds sdfsfsf  sdsdsd efssssssssssssd ssssssss fggggggggggg ggggggggggggg eeeeeeeeeeee fttttttttttt rfffffffffffff'),
(104, 2, 'sdds', 'PolÃ­ticasequeupodemuseruaplicadasunaiesPolÃ­ticasequeupodemuseruaplicadasunaiesPolÃ­ticasequeupodemuseruaplicadasunaiesPolÃ­ticasequeupodemuseruaplicadas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `idSetor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeSetor` varchar(45) NOT NULL,
  PRIMARY KEY (`idSetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`idSetor`, `nomeSetor`) VALUES
(1, 'Fiscalização Ambiental'),
(2, 'Zoneamento Ambiental'),
(3, 'Administrador Master'),
(4, 'Educação Ambiental'),
(5, 'Registro, monitoramento e licenciamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoDocumento` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `tipoDocumento`) VALUES
(1, 'Memorando'),
(2, 'Oficio'),
(3, 'Ata'),
(4, 'Comunicado'),
(5, 'Outro');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
