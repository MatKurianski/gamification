--
-- Base de Dados: `db_gamification`
--
CREATE DATABASE IF NOT EXISTS `db_gamification` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_gamification`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cargo`
--

CREATE TABLE IF NOT EXISTS `tb_cargo` (
  `cd_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_cargo` varchar(20) NOT NULL,
  `st_cargo` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_cargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_cargo`
--

INSERT INTO `tb_cargo` (`cd_cargo`, `nm_cargo`, `st_cargo`) VALUES
(1, 'Membro', 1),
(2, 'Diretor', 1),
(3, 'Presidente', 1),
(4, 'Vice-presidente', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_diretoria`
--

CREATE TABLE IF NOT EXISTS `tb_diretoria` (
  `cd_diretoria` int(11) NOT NULL AUTO_INCREMENT,
  `nm_diretoria` varchar(25) NOT NULL,
  `ds_cor` varchar(10) NOT NULL,
  `st_diretoria` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_diretoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_diretoria`
--

INSERT INTO `tb_diretoria` (`cd_diretoria`, `nm_diretoria`, `ds_cor`, `st_diretoria`) VALUES
(1, 'Projetos', '#4cbaff', 1),
(2, 'Marketing', '#8e0232', 1),
(3, 'Finanças e Pessoas', '#1c9924', 1),
(4, 'Presidência', '#ffb300', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_membro`
--

CREATE TABLE IF NOT EXISTS `tb_membro` (
  `cd_membro` int(11) NOT NULL AUTO_INCREMENT,
  `nm_membro` varchar(100) NOT NULL,
  `nm_usuario` varchar(20) NOT NULL,
  `tx_senha` varchar(100) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_diretoria` int(11) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `st_membro` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_membro`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_diretoria` (`id_diretoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tb_membro`
--

INSERT INTO `tb_membro` (`cd_membro`, `nm_membro`, `nm_usuario`, `tx_senha`, `id_cargo`, `id_diretoria`, `qt_pontos`, `st_membro`) VALUES
(5, 'Guilherme Balog Gardino', 'balog', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 1, 1, 0, 1),
(7, 'Rodrigo', 'rodrigo', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 2, 4, 6, 1),
(8, 'Leví', 'levi', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 2, 2, 3, 1),
(9, 'Bernardo Chagas', 'berna', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 2, 1, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_meta`
--

CREATE TABLE IF NOT EXISTS `tb_meta` (
  `cd_meta` int(11) NOT NULL AUTO_INCREMENT,
  `ds_meta` text NOT NULL,
  `vl_minimo` int(11) NOT NULL,
  `st_meta` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_meta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_meta`
--

INSERT INTO `tb_meta` (`cd_meta`, `ds_meta`, `vl_minimo`, `st_meta`) VALUES
(1, 'Medalha', 5, 1),
(2, 'Troféu', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_meta_membro`
--

CREATE TABLE IF NOT EXISTS `tb_meta_membro` (
  `cd_meta_membro` int(11) NOT NULL AUTO_INCREMENT,
  `id_meta` int(11) NOT NULL,
  `id_membro` int(11) NOT NULL,
  PRIMARY KEY (`cd_meta_membro`),
  KEY `id_meta` (`id_meta`),
  KEY `id_membro` (`id_membro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_meta_membro`
--

INSERT INTO `tb_meta_membro` (`cd_meta_membro`, `id_meta`, `id_membro`) VALUES
(1, 1, 5),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pontuacao`
--

CREATE TABLE IF NOT EXISTS `tb_pontuacao` (
  `cd_pontuacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_pontuacao` datetime NOT NULL,
  `id_membro` int(11) NOT NULL,
  `id_regra` int(11) NOT NULL,
  PRIMARY KEY (`cd_pontuacao`),
  KEY `id_membro` (`id_membro`),
  KEY `id_regra` (`id_regra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_pontuacao`
--

INSERT INTO `tb_pontuacao` (`cd_pontuacao`, `dt_pontuacao`, `id_membro`, `id_regra`) VALUES
(1, '2019-03-29 09:13:03', 5, 1),
(2, '2019-03-20 17:30:24', 5, 2),
(3, '2019-04-17 00:00:00', 7, 1),
(4, '2019-03-20 17:30:24', 7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_regra`
--

CREATE TABLE IF NOT EXISTS `tb_regra` (
  `cd_regra` int(11) NOT NULL AUTO_INCREMENT,
  `ds_regra` text NOT NULL,
  `qt_pontos` int(11) NOT NULL,
  `st_regra` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_regra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_regra`
--

INSERT INTO `tb_regra` (`cd_regra`, `ds_regra`, `qt_pontos`, `st_regra`) VALUES
(1, 'Chegar no horário', 2, 1),
(2, 'Deu uma boa ideia', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_membro`
--
ALTER TABLE `tb_membro`
  ADD CONSTRAINT `tb_membro_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `tb_cargo` (`cd_cargo`),
  ADD CONSTRAINT `tb_membro_ibfk_2` FOREIGN KEY (`id_diretoria`) REFERENCES `tb_diretoria` (`cd_diretoria`);

--
-- Limitadores para a tabela `tb_meta_membro`
--
ALTER TABLE `tb_meta_membro`
  ADD CONSTRAINT `tb_meta_membro_ibfk_1` FOREIGN KEY (`id_meta`) REFERENCES `tb_meta` (`cd_meta`),
  ADD CONSTRAINT `tb_meta_membro_ibfk_2` FOREIGN KEY (`id_membro`) REFERENCES `tb_membro` (`cd_membro`);

--
-- Limitadores para a tabela `tb_pontuacao`
--
ALTER TABLE `tb_pontuacao`
  ADD CONSTRAINT `tb_pontuacao_ibfk_1` FOREIGN KEY (`id_membro`) REFERENCES `tb_membro` (`cd_membro`),
  ADD CONSTRAINT `tb_pontuacao_ibfk_2` FOREIGN KEY (`id_regra`) REFERENCES `tb_regra` (`cd_regra`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
