-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2016 às 06:17
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barbearia22`
--
create database if not exists barbearia22;
-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE IF NOT EXISTS `agendamentos` (
  `idagd` int(11) NOT NULL AUTO_INCREMENT,
  `codagd` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `idusr` int(11) DEFAULT NULL,
  `idmst` int(11) DEFAULT NULL,
  `dia` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `hora` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `diapedido` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idagd`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=982 ;

--
-- RELATIONS FOR TABLE `agendamentos`:
--   `idmst`
--       `masters` -> `idmst`
--   `idusr`
--       `usuarios` -> `idusr`
--

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`idagd`, `codagd`, `idusr`, `idmst`, `dia`, `hora`, `diapedido`) VALUES
(981, '150720160800', 24, 1, '15/07/2016', '08:00', '03/07/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `codhorarios` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=488 ;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`idhorario`, `codhorarios`) VALUES
(466, '02:00'),
(467, '03:00'),
(468, '04:00'),
(469, '05:00'),
(470, '06:00'),
(471, '07:00'),
(472, '08:00'),
(473, '09:00'),
(474, '10:00'),
(475, '11:00'),
(476, '12:00'),
(477, '13:00'),
(478, '14:00'),
(479, '15:00'),
(480, '16:00'),
(481, '18:00'),
(482, '19:00'),
(483, '20:00'),
(484, '21:00'),
(485, '22:00'),
(487, '17:00'),
(464, '00:00'),
(465, '01:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `idimg` int(11) NOT NULL AUTO_INCREMENT,
  `bannerimg` varchar(100) COLLATE utf8_bin NOT NULL,
  `slideimg` varchar(100) COLLATE utf8_bin NOT NULL,
  `lateralimg` varchar(100) COLLATE utf8_bin NOT NULL,
  `glrimg` varchar(100) COLLATE utf8_bin NOT NULL,
  `logoimg` varchar(100) COLLATE utf8_bin NOT NULL,
  `imgativo` int(1) NOT NULL,
  PRIMARY KEY (`idimg`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=286 ;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`idimg`, `bannerimg`, `slideimg`, `lateralimg`, `glrimg`, `logoimg`, `imgativo`) VALUES
(278, '', 'imagens/slide/1ef30e898930bfbf9a572e0978239b0c.jpg', '', '', '', 1),
(279, '', 'imagens/slide/0ca6f2bc7997aef43dd82472a02d5302.jpg', '', '', '', 1),
(280, '', 'imagens/slide/0624cb86ef86cdbc4ced5853bf129fa8.jpg', '', '', '', 1),
(281, '', 'imagens/slide/7a4e492cf2f4d9f4cef99cc44f3ccba1.jpg', '', '', '', 1),
(282, '', '', '', '', 'imagens/logotipo/1bb87d41d15fe27b500a4bfcde01bb0e.png', 1),
(265, 'imagens/banner/d5b743bb2d2e346b6917a39bf8955596.jpg', '', '', '', '', 1),
(268, 'imagens/banner/173c96981878be4d14473adf2041a286.jpg', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `infogerais`
--

CREATE TABLE IF NOT EXISTS `infogerais` (
  `idinfo` int(11) NOT NULL AUTO_INCREMENT,
  `whatsinfo` varchar(15) COLLATE utf8_bin NOT NULL,
  `faceinfo` text COLLATE utf8_bin NOT NULL,
  `instainfo` text COLLATE utf8_bin NOT NULL,
  `endinfo` varchar(60) COLLATE utf8_bin NOT NULL,
  `bairroinfo` varchar(40) COLLATE utf8_bin NOT NULL,
  `cidadeinfo` varchar(70) COLLATE utf8_bin NOT NULL,
  `cepinfo` varchar(15) COLLATE utf8_bin NOT NULL,
  `googleinfo` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idinfo`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `infogerais`
--

INSERT INTO `infogerais` (`idinfo`, `whatsinfo`, `faceinfo`, `instainfo`, `endinfo`, `bairroinfo`, `cidadeinfo`, `cepinfo`, `googleinfo`) VALUES
(2, '(11) 3956-4478', 'https://www.facebook.com/Barbearia-22-729639703809521/?fref=ts', 'https://www.instagram.com/lucasmaragaia/', 'Rua EgÃ­dio felini, 53 - apt.22-c', 'Parada de taipas', 'SÃ£o Paulo - SP', '02815-040', 'https://www.google.com.br/maps/place/Rua+Eg%C3%ADdio+Felini,+249+-+Conj.+Res.+Elisio+Teixeira+Leite,+S%C3%A3o+Paulo+-+SP,+02815-040/@-23.4456674,-46.714985,21z/data=!4m5!3m4!1s0x94cefbc8fb54672b:0x38e274febb6703c3!8m2!3d-23.4456579!4d-46.7148784?hl=pt-BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `masters`
--

CREATE TABLE IF NOT EXISTS `masters` (
  `idmst` int(11) NOT NULL AUTO_INCREMENT,
  `nomemst` varchar(30) COLLATE utf8_bin NOT NULL,
  `loginmst` varchar(20) COLLATE utf8_bin NOT NULL,
  `senhamst` varchar(20) COLLATE utf8_bin NOT NULL,
  `emailmst` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idmst`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `masters`
--

INSERT INTO `masters` (`idmst`, `nomemst`, `loginmst`, `senhamst`, `emailmst`) VALUES
(1, 'Vinicius Pereira', 'drudruzinho', '12345', 'viniciusp.diogo@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `idprod` int(11) NOT NULL AUTO_INCREMENT,
  `descprod` varchar(30) COLLATE utf8_bin NOT NULL,
  `valorprod` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idprod`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=134 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprod`, `descprod`, `valorprod`) VALUES
(126, 'barba', '15,00'),
(125, 'drudruzinho', '150,00'),
(119, 'hidrataÃ§Ã£o lanza (importada)', '25,00'),
(127, 'sei lÃ¡', '5,50'),
(128, 'barba e bigode', '40,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE IF NOT EXISTS `sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tituloSobre` varchar(30) COLLATE utf8_bin NOT NULL,
  `textoSobre` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`id`, `tituloSobre`, `textoSobre`) VALUES
(1, 'barbearia 22', 'A falta de um meio de exposiÃ§Ã£o de determinado produto, empresa ou serviÃ§o Ã© um fator determinante para o nÃ£o crescimento e visibilidade no mercado, nÃ£o importando seu tamanho e nem o seu segmento, por isso Ã© necessÃ¡rio um trabalho de marketing para melhorar a visibilidade da empresa ou produto, e nesse caso, um.\r\nWebSite Ã© uma forma muito viÃ¡vel para conseguir um bom resultado, e um maior alcance de visÃ£o no mercado. Este projeto serÃ¡ desenvolvido para melhorar a visibilidade e organizaÃ§Ã£o na administraÃ§Ã£o de uma barbearia, visando um melhor relacionamento entre empresa e cliente.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusr` int(11) NOT NULL AUTO_INCREMENT,
  `nomeusr` varchar(30) COLLATE utf8_bin NOT NULL,
  `loginusr` varchar(20) COLLATE utf8_bin NOT NULL,
  `senhausr` varchar(16) COLLATE utf8_bin NOT NULL,
  `emailusr` varchar(100) COLLATE utf8_bin NOT NULL,
  `numerousr` varchar(100) COLLATE utf8_bin NOT NULL,
  `liberausr` bit(1) NOT NULL,
  PRIMARY KEY (`idusr`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusr`, `nomeusr`, `loginusr`, `senhausr`, `emailusr`, `numerousr`, `liberausr`) VALUES
(1, 'adalberto', 'betinho123', 'tricolor', 'viniciusp.diogo@hotmail.com', '(12) 34567-8958', b'0'),
(28, 'juquinha', 'juquinha', 'tricolor', 'juquinha@gmail.com', '(11) 96923-8715', b'1'),
(27, 'Bruna Moura', 'brunamoura', 'bruninhapeppapig', 'bru.moura01@gmail.com', '(11) 96707-1385', b'1'),
(26, 'Rubens RIbeiro', 'rubinhoformula1', 'testando', 'rubensziks13@gmail.com', '(11) 96923-8716', b'1'),
(25, 'vinicius', 'tricolorsoberano', 'tricolor12345678', 'viniciusp.diogo@outlook.com', '(11) 96923-8719', b'1'),
(24, 'Vinicius Pereira', 'viniciusp_diogo', 'tricolorsoberano', 'viniciusp.diogo@gmail.com', '(12) 34567-8957', b'0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
