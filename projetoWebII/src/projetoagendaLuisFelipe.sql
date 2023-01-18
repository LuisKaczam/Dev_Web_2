-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoagenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eventos`
--

DROP TABLE IF EXISTS `tb_eventos`;
CREATE TABLE IF NOT EXISTS `tb_eventos` (
  `EVENTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTO_TITULO` varchar(20) NOT NULL,
  `EVENTO_DESC` varchar(30) DEFAULT NULL,
  `EVENTO_USERID` int(11) NOT NULL,
  `EVENTO_DATA` date NOT NULL,
  `EVENTO_HORA` time NOT NULL,
  `EVENTO_LOCAL` varchar(20) NOT NULL,
  PRIMARY KEY (`EVENTO_ID`),
  KEY `FK_EVENTO` (`EVENTO_USERID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_eventos`
--

INSERT INTO `tb_eventos` (`EVENTO_ID`, `EVENTO_TITULO`, `EVENTO_DESC`, `EVENTO_USERID`, `EVENTO_DATA`, `EVENTO_HORA`, `EVENTO_LOCAL`) VALUES
(16, 'Evento', 'aaaaa', 5, '2002-11-26', '19:13:00', ''),
(20, 'Strange', '', 4, '2002-11-27', '13:40:00', 'SMI'),
(21, 'filme', '', 4, '2022-11-28', '22:29:00', 'Aurora'),
(22, 'Livro', 'teste', 4, '2022-11-28', '22:47:00', 'Aurora'),
(23, 'Novo', 'aaaaa', 4, '2022-11-28', '23:40:00', 'Aurora'),
(25, 'Reunião para teste', 'Chegar cedo', 8, '2022-11-30', '19:30:00', 'SMI'),
(26, 'titulo', 'aaa', 11, '2222-02-19', '03:11:00', 'rua'),
(27, 'Livro', '', 12, '2022-11-30', '20:30:00', 'Smi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorios`
--

DROP TABLE IF EXISTS `tb_relatorios`;
CREATE TABLE IF NOT EXISTS `tb_relatorios` (
  `RELATORIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RELATORIO_EVENTO_TITULO` varchar(20) DEFAULT NULL,
  `RELATORIO_TEXTO` varchar(300) DEFAULT NULL,
  `RELATORIO_NOME` varchar(30) DEFAULT NULL,
  `RELATORIO_USERID` int(11) DEFAULT NULL,
  PRIMARY KEY (`RELATORIO_ID`),
  KEY `RELATORIO_USERID` (`RELATORIO_USERID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_relatorios`
--

INSERT INTO `tb_relatorios` (`RELATORIO_ID`, `RELATORIO_EVENTO_TITULO`, `RELATORIO_TEXTO`, `RELATORIO_NOME`, `RELATORIO_USERID`) VALUES
(35, 'Strange', 'aaaaaaweee', 'Titulo', 4),
(34, 'filme', 'Weee', 'NomeMesmo', 4),
(33, 'filme', 'Este é um teste para testar!', 'O_relato', 4),
(36, 'Livro', 'wert', 'nOME', 4),
(37, 'titulo', 'aaa', 'Relatório', 11),
(38, 'Livro', 'aaa', 'Relatório', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `USER_COD` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOME` varchar(30) NOT NULL,
  `USER_EMAIL` varchar(40) NOT NULL,
  `USER_SENHA` varchar(30) NOT NULL,
  PRIMARY KEY (`USER_COD`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`USER_COD`, `USER_NOME`, `USER_EMAIL`, `USER_SENHA`) VALUES
(6, 'Jessica', 'jeh@gmail.com', '12345'),
(5, 'Felipe', 'luis3@gmail.com', '12345'),
(4, 'Luis Kaczam', 'luis@gmail.com', '12345'),
(7, 'Laura', 'laura123@gmail.co', '112233445566778899'),
(8, 'Laura', 'laura@gmail.com', '112233445566'),
(11, 'Testee', 'teeste@gmail.com', '12345'),
(12, 'Luis Kaczam', 'luisfe@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
