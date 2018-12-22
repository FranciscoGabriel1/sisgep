
-- Base de Dados: `sisgep`
--
CREATE DATABASE IF NOT EXISTS `sisgep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sisgep`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`idArquivo`, `publicacao_idPublicacao`, `documento`, `tipo_idTipo`, `dataPublicacao`, `horaPublicacao`) VALUES
(54, 40, 'Certificado (25).pdf', 1, '0000-00-00', '2018-10-16 18:16:01'),
(55, 41, 'html 5.jpg', 3, '0000-00-00', '2018-10-16 18:18:07'),
(58, 40, 'RelatoÌrio Final v.4 [UFAM].pdf', 1, '0000-00-00', '2018-10-23 23:48:33'),
(59, 43, 'au.docx', 1, '0000-00-00', '2018-10-24 00:53:42'),
(60, 44, 'dbsaac.sql', 1, '0000-00-00', '2018-10-24 17:02:39'),
(61, 42, 'RelatoÌrio Final v.4 [UFAM].pdf', 3, '0000-00-00', '2018-10-24 17:45:51'),
(62, 48, 'RelatoÌrio Final v.4 [UFAM].pdf', 3, '0000-00-00', '2018-10-24 18:15:43'),
(63, 52, 'formulario.pdf', 4, '0000-00-00', '2018-10-24 18:19:37'),
(65, 41, 'au.docx', 1, '0000-00-00', '2018-10-24 20:40:05'),
(70, 53, 'TCC Gabriel v6.doc', 1, '0000-00-00', '2018-10-24 20:49:46'),
(71, 54, 'gabriel.pdf', 1, '0000-00-00', '2018-10-24 20:51:18'),
(72, 58, 'report.pdf', 1, '0000-00-00', '2018-10-24 21:01:04'),
(75, 53, 'Teste Web.pdf', 2, '0000-00-00', '2018-10-24 21:05:41'),
(76, 59, 'Android Tablet â€“ 1.png', 1, '0000-00-00', '2018-10-29 15:12:22'),
(78, 59, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-29 15:32:38'),
(79, 60, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-29 15:35:17'),
(80, 61, 'Android Tablet â€“ 1.png', 0, '0000-00-00', '2018-10-29 17:58:15'),
(81, 61, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-29 17:58:26'),
(82, 61, 'Android Tablet â€“ 1.png', 2, '0000-00-00', '2018-10-29 21:27:22'),
(83, 61, 'Android Tablet â€“ 1.png', 0, '0000-00-00', '2018-10-30 18:40:47'),
(84, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 18:41:02'),
(85, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 18:41:22'),
(86, 61, 'Android Tablet â€“ 1.png', 1, '0000-00-00', '2018-10-30 18:41:42'),
(87, 61, 'Android Tablet â€“ 1.png', 5, '0000-00-00', '2018-10-30 18:41:55'),
(88, 61, 'Android Tablet â€“ 1.png', 3, '0000-00-00', '2018-10-30 18:46:12'),
(89, 61, 'Android Tablet â€“ 1.png', 4, '0000-00-00', '2018-10-30 18:50:41'),
(90, 61, 'Android Tablet â€“ 1.png', 4, '0000-00-00', '2018-10-30 18:51:03'),
(91, 61, '23044.png', 4, '0000-00-00', '2018-10-30 18:51:30'),
(92, 61, 'abraao.pdf', 5, '0000-00-00', '2018-10-30 18:51:57'),
(93, 61, '23044.png', 1, '0000-00-00', '2018-10-30 18:52:48'),
(94, 62, 'page6.html', 2, '0000-00-00', '2018-10-31 20:10:42'),
(95, 62, 'spyder_crash.log', 2, '0000-00-00', '2018-10-31 20:31:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`idPublicacao`, `administrador_idAdministrador`, `numeroProcesso`, `descricao`) VALUES
(41, 3, '001/admin', 'teste1'),
(44, 5, 'rubber1', 'rub1'),
(62, 2, 'sdfsffs', 'sfffffffffffffffffffffsd dsdffffffffffffffffffffffffff gggggggggg ddddddd ssss');

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
--
