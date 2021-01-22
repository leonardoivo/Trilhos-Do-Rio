-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 28/04/2018 às 19h31min
-- Versão do Servidor: 1.0.214
-- Versão do PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ebooks_alterados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_kobo`
--

CREATE TABLE IF NOT EXISTS `ebooks_kobo` (
  `nome_do_livro` varchar(80) NOT NULL,
  `Editora` varchar(60) DEFAULT NULL,
  `data_do_email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nome_do_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ebooks_kobo`
--

INSERT INTO `ebooks_kobo` (`nome_do_livro`, `Editora`, `data_do_email`) VALUES
('18 cronicas e mais algumas', 'Boitempo', '09/01/2014'),
('A biblia segundo Beliel', 'Boitempo', '09/01/2014'),
('A Descoberta do Frio', 'Atelie', '09/01/2014'),
('A Escola dos Deuses - Formação dos líderes da nova Economia', 'Barany', '09/01/2014'),
('A hipotese comunista', 'Boitempo', '09/01/2014'),
('A lei de Murph no gerenciamento de projetos', 'Brasport', '09/01/2014'),
('A mercadoria - O Capital,livro 1, (Capitulo 1)', 'Boitempo', '09/01/2014'),
('A politica do precariado', 'Boitempo', '09/01/2014'),
('Alguem disse totalitarismo?', 'Boitempo', '09/01/2014'),
('Arquitetura de Nuvens - Amazon Web Services (AWS)', 'Brasport', '09/01/2014'),
('Big Data', 'Brasport', '09/01/2014'),
('Causos', 'Entrelinhas', '09/01/2014'),
('Cidades rebeldes', 'Boitempo', '09/01/2014'),
('Clientes e empresas como caes e gatos', 'Brasport', '09/01/2014'),
('Cypherpunk', 'Boitempo', '09/01/2014'),
('Desempenho corporativo', 'Brasport', '09/01/2014'),
('Desenvolvimento de sites dinamicos com Dreamweaver CC', 'Brasport', '08/01/2014'),
('Do jeito que você gosta', 'Balao Editorial', '07/01/2014'),
('Encatadora de baleias', 'Barany', '07/01/2014'),
('Estado forma politica', 'Boitempo', '07/01/2014'),
('Frases pra elas', 'BMGV', '07/01/2014'),
('Fundamentos Basicos e avancados de SEO', 'Brasport', '07/01/2014'),
('Garibald na America do Sul', 'Boitempo', '07/01/2014'),
('Gestao e governanca de dados:promovendo dados como ativos', 'Brasport', '08/01/2014'),
('Gestao Educacional - Planejamento estrategico e marketing', 'Brasport', '08/01/2014'),
('Grundisse', 'Boitempo', '08/01/2014'),
('Guia de campo do bom programador', 'Brasport', '08/01/2014'),
('Keep The Focus', 'BMGV', '08/01/2014'),
('Linguagem dos pés do seu bebê', 'Barany', '08/01/2014'),
('Lutas de classes na Russia', 'Boitempo', '08/01/2014'),
('Mantenha o foco', 'BMGV', '09/01/2014'),
('Manual Prático das Ocupações Perdidas', 'Bartbee', '09/01/2014'),
('Marx, manual de instrucoes', 'Boitempo', '09/01/2014'),
('Menos que nada', 'Boitempo', '09/01/2014'),
('Mensagens dos anjos', 'BMGV', '09/01/2014'),
('Microsoft Project 2013 Standard - Professional & Pro para Office 365', 'Brasport', '09/01/2014'),
('Midia,poder e contrapoder', 'Boitempo', '09/01/2014'),
('Modelagem de processos com BPMN', 'Brasport', '09/01/2014'),
('No limiar do silencio e da letra', 'Boitempo', '09/01/2014'),
('No mar', 'Balao Editorial', '09/01/2014'),
('Nunca me diga nunca', 'BMGV', '09/01/2014'),
('O ano em que sonhamos perigosamente', 'Boitempo', '09/01/2014'),
('O capital', 'Boitempo', '09/01/2014'),
('O conceito da dialetica em Lukács', 'Boitempo', '09/01/2014'),
('O executivo consultor', 'Barany', '09/01/2014'),
('O guru da floresta', 'Entrelinhas', '09/01/2014'),
('O homem que amava os cachorros', 'Boitempo', '09/01/2014'),
('O velho Graca', 'Boitempo', '09/01/2014'),
('Open Web Plataform', 'Brasport', '09/01/2014'),
('Opus Dei', 'Boitempo', '09/01/2014'),
('Oracoes dos Orixas', 'BMGV', '09/01/2014'),
('Para entender o Capital, livro 1', 'Boitempo', '09/01/2014'),
('Para uma ontologia do ser social 1', 'Boitempo', '09/01/2014'),
('Planejamento em 140 Tweets', 'Brasport', '09/01/2014'),
('PMO Peso Pesado: Como vencer no ringue dos projetos em grandes corporações', 'Brasport', '09/01/2014'),
('Poder e desaparecimento', 'Boitempo', '09/01/2014'),
('Projetos brasileiros: Casos reais de gerenciamento', 'Brasport', '09/01/2014'),
('Projetos de estruturas de TIC - Basic Methodware', 'Brasport', '09/01/2014'),
('Rituais do sofrimento', 'Boitempo', '09/01/2014'),
('Scrum e PMBOK unidos no gerenciamento de projetos', 'Brasport', '09/01/2014'),
('Selva concreta', 'Boitempo', '09/01/2014'),
('Sombras e sonhos', 'Balao Editorial', '09/01/2014'),
('Todas as Mulheres são Bruxas', 'Barany', '07/01/2014');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
