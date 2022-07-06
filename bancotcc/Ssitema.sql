-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2016 às 06:38
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_adm`
--

CREATE TABLE IF NOT EXISTS `tbl_adm` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `sis_adm` int(11) NOT NULL,
  `fla_adm` int(11) NOT NULL,
  `nome_adm` varchar(30) COLLATE utf8_bin NOT NULL,
  `email_adm` varchar(100) COLLATE utf8_bin NOT NULL,
  `snh_adm` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_agd`
--

CREATE TABLE IF NOT EXISTS `tbl_agd` (
  `id_agd` int(11) NOT NULL AUTO_INCREMENT,
  `cod_agd` int(11) NOT NULL,
  `usr_agd` int(11) NOT NULL,
  `fla_agd` int(11) NOT NULL,
  `func_agd` int(11) NOT NULL,
  `srv_agd` int(11) NOT NULL,
  `dsem_agd` int(11) NOT NULL,
  `dia_agd` int(2) NOT NULL,
  `mes_agd` int(2) NOT NULL,
  `ano_agd` year(4) NOT NULL,
  `sit_agd` int(11) NOT NULL,
  PRIMARY KEY (`id_agd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela de agendamento' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_dia`
--

CREATE TABLE IF NOT EXISTS `tbl_dia` (
  `id_dia` int(11) NOT NULL AUTO_INCREMENT,
  `nome_dia` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_dia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tbl_dia`
--

INSERT INTO `tbl_dia` (`id_dia`, `nome_dia`) VALUES
(1, 'Domingo'),
(2, 'Segunda'),
(3, 'Terça'),
(4, 'Quarta'),
(5, 'Quinta'),
(6, 'Sexta'),
(7, 'Sábado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fla`
--

CREATE TABLE IF NOT EXISTS `tbl_fla` (
  `id_fla` int(11) NOT NULL AUTO_INCREMENT,
  `sis_fla` int(11) NOT NULL,
  `nom_fla` varchar(50) COLLATE utf8_bin NOT NULL,
  `end_fla` varchar(100) COLLATE utf8_bin NOT NULL,
  `bro_fla` varchar(50) COLLATE utf8_bin NOT NULL,
  `cid_fla` varchar(50) COLLATE utf8_bin NOT NULL,
  `est_fla` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail_fla` varchar(100) COLLATE utf8_bin NOT NULL,
  `tel_fla` int(11) NOT NULL,
  PRIMARY KEY (`id_fla`),
  KEY `fk_adm_fla` (`sis_fla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_func`
--

CREATE TABLE IF NOT EXISTS `tbl_func` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `fla_func` int(11) NOT NULL,
  `nome_func` varchar(20) COLLATE utf8_bin NOT NULL,
  `email_func` varchar(100) COLLATE utf8_bin NOT NULL,
  `snh_func` varchar(20) COLLATE utf8_bin NOT NULL,
  `desc_func` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_func`),
  KEY `fla_func` (`fla_func`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sis`
--

CREATE TABLE IF NOT EXISTS `tbl_sis` (
  `id_sis` int(11) NOT NULL AUTO_INCREMENT,
  `emp_sis` varchar(100) COLLATE utf8_bin NOT NULL,
  `mail_sis` varchar(100) COLLATE utf8_bin NOT NULL,
  `tel_sis` varchar(15) COLLATE utf8_bin NOT NULL,
  `url_sis` varchar(100) COLLATE utf8_bin NOT NULL,
  `nvl_sis` tinyint(4) NOT NULL,
  `atv_sis` bit(1) NOT NULL,
  PRIMARY KEY (`id_sis`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_srv`
--

CREATE TABLE IF NOT EXISTS `tbl_srv` (
  `id_srv` int(11) NOT NULL AUTO_INCREMENT,
  `fla_srv` int(11) NOT NULL,
  `cat_srv` varchar(50) COLLATE utf8_bin NOT NULL,
  `tm_srv` varchar(5) COLLATE utf8_bin NOT NULL,
  `vlr_srv` varchar(10) COLLATE utf8_bin NOT NULL,
  `des_srv` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_srv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usr`
--

CREATE TABLE IF NOT EXISTS `tbl_usr` (
  `id_usr` int(11) NOT NULL,
  `nome_usr` varchar(30) COLLATE utf8_bin NOT NULL,
  `email_usr` varchar(100) COLLATE utf8_bin NOT NULL,
  `tel_usr` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
