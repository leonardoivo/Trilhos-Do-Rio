-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30-Maio-2018 às 14:57
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trilhosdorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE `acervo` (
  `id_acervo` int(11) NOT NULL,
  `nome_acervo` varchar(30) DEFAULT NULL,
  `id_patrimonio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE `administracao` (
  `id_adm` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_financeiro` int(11) DEFAULT NULL,
  `id_reuniao` int(11) DEFAULT NULL,
  `id_expedicao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `audios`
--

CREATE TABLE `audios` (
  `id_audios` int(11) NOT NULL,
  `nome_audio` varchar(30) DEFAULT NULL,
  `tipo_audio` varchar(20) DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `descricao` text,
  `id_acervo` int(11) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(30) DEFAULT NULL,
  `desc_cargo` text,
  `tipo_cargo` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nome_cargo`, `desc_cargo`, `tipo_cargo`, `id_perfil`, `id_usuario`) VALUES
(1, 'presidente', 'presidencia da Trilhos Do Rio', 1, 4, 22),
(2, 'vice presidente', ' vice presidencia', 2, 5, 27),
(3, 'secretario geral', 'secretaria geral', 3, 5, 31),
(4, 'tesoureiro', 'tesouraria e financas', 4, 5, 28),
(5, 'conselheiro fiscal', 'fiscalizacao', 5, 5, 26),
(6, 'conselheiro fiscal', 'fiscalizacao', 6, 5, 29),
(7, 'conselheiro fiscal', 'fiscalizacao', 7, 5, 32),
(8, 'conselheiro fiscal', 'fiscalizacao', 8, 5, 30),
(9, 'Administrador', 'Responsavel pela manutencao do sistema', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselhofiscal`
--

CREATE TABLE `conselhofiscal` (
  `id_conselho` int(11) NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Relatorio` text,
  `id_cargo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conselhofiscal`
--

INSERT INTO `conselhofiscal` (`id_conselho`, `Titulo`, `Relatorio`, `id_cargo`, `id_usuario`) VALUES
(70, 'cxccc', '   cccccssassasdsadas', 9, 1),
(73, '344', 'dsadsdssddsds', 9, 1),
(75, 'Sobre a reforma de auto de linha', ' Tudo certo!sss', 9, 1),
(82, 'mais um', 'um', 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL,
  `Id_TipDesp` int(30) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `id_financeiro` int(11) DEFAULT NULL,
  `data_de_inclusao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `nome_documento` varchar(30) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `descricao` text,
  `id_acervo` int(11) DEFAULT NULL,
  `formato` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expedicoes`
--

CREATE TABLE `expedicoes` (
  `id_exp` int(11) NOT NULL,
  `nome_expedicao` varchar(50) DEFAULT NULL,
  `data_expedicao` date DEFAULT NULL,
  `desc_expedicao` text,
  `relat_exped` text,
  `id_usuario` int(11) DEFAULT NULL,
  `num_participantes` int(100) DEFAULT NULL,
  `participantes` varchar(60) DEFAULT NULL,
  `localExpedicao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `expedicoes`
--

INSERT INTO `expedicoes` (`id_exp`, `nome_expedicao`, `data_expedicao`, `desc_expedicao`, `relat_exped`, `id_usuario`, `num_participantes`, `participantes`, `localExpedicao`) VALUES
(1, 'tste', '0000-00-00', 'ww', 'edede', 2, 1, '22', 'rio'),
(2, 'erwer', '0000-00-00', 'asdsad', '', 1, 2, '', 'sdadas'),
(3, 'xzzxzxzxxz', '0000-00-00', 'aSAS', '', 1, 3, '', 'sadasd'),
(4, 'teste', '0000-00-00', 'novo', 'teste', 1, 9, 'ff', 'aa'),
(6, 'nivo', '0000-00-00', 'f', 'ds', 1, 4, 's', 'a'),
(7, 'xxzx', '2018-11-04', 'xxx', 'zxzxzx', 1, 5, 'xccxc', 'zzz'),
(8, 'xzx', '2018-05-31', 'ccc', 'vv', 1, 1, 'zz', 'vv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

CREATE TABLE `financeiro` (
  `id_financeiro` int(11) NOT NULL,
  `id_despesa` int(11) DEFAULT NULL,
  `id_receita` int(11) DEFAULT NULL,
  `balanco_mensal` datetime DEFAULT NULL,
  `relatorio_financ` text,
  `data_de_balanco` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_sub_paginas`
--

CREATE TABLE `grupos_sub_paginas` (
  `id_grupo` int(11) NOT NULL,
  `nome_pagina` varchar(30) DEFAULT NULL,
  `id_tabela` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `pasta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupos_sub_paginas`
--

INSERT INTO `grupos_sub_paginas` (`id_grupo`, `nome_pagina`, `id_tabela`, `id_perfil`, `pasta`) VALUES
(1, 'livros', 3, 4, 'Livros'),
(2, 'videos', 3, 4, 'Videos'),
(3, 'Imagens', 3, 4, 'Imagens'),
(4, 'objetos', 3, 4, 'Objetos'),
(5, 'audios', 3, 4, 'Audios'),
(6, 'documentos', 3, 4, 'Documentos'),
(7, 'receita', 2, 4, 'Receita'),
(8, 'despesa', 2, 4, 'Despesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(30) DEFAULT NULL,
  `tipo_imagem` varchar(20) DEFAULT NULL,
  `descricao` text,
  `autor` varchar(60) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `data_de_inclusao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livros` int(11) NOT NULL,
  `nome_do_livro` varchar(80) DEFAULT NULL,
  `Autor` varchar(60) DEFAULT NULL,
  `Ano` date DEFAULT NULL,
  `dataDeCadastramento` date DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `Editora` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livros`, `nome_do_livro`, `Autor`, `Ano`, `dataDeCadastramento`, `tema`, `Editora`) VALUES
(64, '18 cronicas e mais algumas', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(65, 'A biblia segundo Beliel', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(66, 'A Descoberta do Frio', NULL, NULL, '0000-00-00', NULL, 'Atelie'),
(67, 'A Escola dos Deuses - Formação dos líderes da nova Economia', NULL, NULL, '0000-00-00', NULL, 'Barany'),
(68, 'A hipotese comunista', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(69, 'A lei de Murph no gerenciamento de projetos', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(70, 'A mercadoria - O Capital,livro 1, (Capitulo 1)', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(71, 'A politica do precariado', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(72, 'Alguem disse totalitarismo?', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(73, 'Arquitetura de Nuvens - Amazon Web Services (AWS)', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(74, 'Big Data', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(75, 'Causos', NULL, NULL, '0000-00-00', NULL, 'Entrelinhas'),
(76, 'Cidades rebeldes', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(77, 'Clientes e empresas como caes e gatos', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(78, 'Cypherpunk', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(79, 'Desempenho corporativo', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(80, 'Desenvolvimento de sites dinamicos com Dreamweaver CC', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(81, 'Do jeito que você gosta', NULL, NULL, '0000-00-00', NULL, 'Balao Editorial'),
(82, 'Encatadora de baleias', NULL, NULL, '0000-00-00', NULL, 'Barany'),
(83, 'Estado forma politica', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(84, 'Frases pra elas', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(85, 'Fundamentos Basicos e avancados de SEO', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(86, 'Garibald na America do Sul', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(87, 'Gestao e governanca de dados:promovendo dados como ativos', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(88, 'Gestao Educacional - Planejamento estrategico e marketing', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(89, 'Grundisse', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(90, 'Guia de campo do bom programador', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(91, 'Keep The Focus', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(92, 'Linguagem dos pés do seu bebê', NULL, NULL, '0000-00-00', NULL, 'Barany'),
(93, 'Lutas de classes na Russia', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(94, 'Mantenha o foco', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(95, 'Manual Prático das Ocupações Perdidas', NULL, NULL, '0000-00-00', NULL, 'Bartbee'),
(96, 'Marx, manual de instrucoes', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(97, 'Menos que nada', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(98, 'Mensagens dos anjos', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(99, 'Microsoft Project 2013 Standard - Professional & Pro para Office 365', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(100, 'Midia,poder e contrapoder', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(101, 'Modelagem de processos com BPMN', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(102, 'No limiar do silencio e da letra', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(103, 'No mar', NULL, NULL, '0000-00-00', NULL, 'Balao Editorial'),
(104, 'Nunca me diga nunca', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(105, 'O ano em que sonhamos perigosamente', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(106, 'O capital', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(107, 'O conceito da dialetica em Lukács', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(108, 'O executivo consultor', NULL, NULL, '0000-00-00', NULL, 'Barany'),
(109, 'O guru da floresta', NULL, NULL, '0000-00-00', NULL, 'Entrelinhas'),
(110, 'O homem que amava os cachorros', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(111, 'O velho Graca', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(112, 'Open Web Plataform', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(113, 'Opus Dei', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(114, 'Oracoes dos Orixas', NULL, NULL, '0000-00-00', NULL, 'BMGV'),
(115, 'Para entender o Capital, livro 1', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(116, 'Para uma ontologia do ser social 1', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(117, 'Planejamento em 140 Tweets', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(118, 'PMO Peso Pesado: Como vencer no ringue dos projetos em grandes corporações', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(119, 'Poder e desaparecimento', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(120, 'Projetos brasileiros: Casos reais de gerenciamento', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(121, 'Projetos de estruturas de TIC - Basic Methodware', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(122, 'Rituais do sofrimento', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(123, 'Scrum e PMBOK unidos no gerenciamento de projetos', NULL, NULL, '0000-00-00', NULL, 'Brasport'),
(124, 'Selva concreta', NULL, NULL, '0000-00-00', NULL, 'Boitempo'),
(125, 'Sombras e sonhos', NULL, NULL, '0000-00-00', NULL, 'Balao Editorial'),
(126, 'Todas as Mulheres são Bruxas', NULL, NULL, '0000-00-00', NULL, 'Barany'),
(131, 'dsdsd', NULL, NULL, '2018-04-30', NULL, 'vvv'),
(132, 'dsdsdczx', NULL, NULL, '2018-04-30', NULL, 'vvvzxzx'),
(133, 'dsdsdczx', NULL, NULL, '2018-04-12', NULL, 'vvvzxzx'),
(136, 'vvv', NULL, NULL, '2018-01-05', NULL, 'cxzx'),
(137, 'vvv', NULL, NULL, '2018-05-29', NULL, 'cxzx');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logeventos`
--

CREATE TABLE `logeventos` (
  `idEvento` int(11) NOT NULL,
  `NomeEvento` varchar(50) DEFAULT NULL,
  `TipoEvento` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `tabela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que registra todas as atividades realizadas ong.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `id_mensalidade` int(11) NOT NULL,
  `valor` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_de_emissao` datetime DEFAULT NULL,
  `data_de_vencimento` datetime DEFAULT NULL,
  `cod_barras` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id_video` int(11) NOT NULL,
  `nome_objeto` varchar(30) DEFAULT NULL,
  `tipo_objeto` varchar(20) DEFAULT NULL,
  `descricao` text,
  `autor` varchar(60) DEFAULT NULL,
  `origem` varchar(60) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimonio`
--

CREATE TABLE `patrimonio` (
  `id_patrimonio` int(11) NOT NULL,
  `nome_do_bem` varchar(40) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `data_de_integracao` date DEFAULT NULL,
  `tipo_de_material` varchar(40) DEFAULT NULL,
  `Origem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(30) DEFAULT NULL,
  `tipo_acesso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `tipo_acesso`) VALUES
(4, 'administrador', 1),
(5, 'fiscal', 2),
(6, 'financeiro', 3),
(7, 'comum', 4),
(8, 'acervo', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_receita` int(11) NOT NULL,
  `Valor` float DEFAULT NULL,
  `id_tipoRec` int(30) DEFAULT NULL,
  `id_financeiro` int(11) DEFAULT NULL,
  `data_de_inclusao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
--

CREATE TABLE `reuniao` (
  `id_reuniao` int(11) NOT NULL,
  `nome_reuniao` varchar(60) DEFAULT NULL,
  `desc_reuniao` text,
  `relat_ata_reuniao` text,
  `local` varchar(60) DEFAULT NULL,
  `data_reuniao` date DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reuniao`
--

INSERT INTO `reuniao` (`id_reuniao`, `nome_reuniao`, `desc_reuniao`, `relat_ata_reuniao`, `local`, `data_reuniao`, `id_usuarios`, `id_cargo`) VALUES
(1, 'eee dssdd', 'eeee ', ' teste sas', 'sddd ddsd', '2018-02-12', 1, 9),
(2, 'eee  d3223dddd', 'eeee  434', '    teste 2 dssdsd', 'sddd  ddd', '2018-02-23', 1, 9),
(8, 'Nova Reuniao ', 'Reuniao de atas ', ' Miguel Pereira, reforma de auto de linha. Manutenção da linha.', 'Trilhos do Rio ', '2018-02-25', 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelas_sistema`
--

CREATE TABLE `tabelas_sistema` (
  `id_tabela` int(11) NOT NULL,
  `nome_tabela` varchar(30) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabelas_sistema`
--

INSERT INTO `tabelas_sistema` (`id_tabela`, `nome_tabela`, `id_perfil`, `link`, `Nivel`) VALUES
(1, 'administracao', 4, 'Administracao', NULL),
(2, 'financeiro', 4, 'Financeiro', NULL),
(3, 'acervo', 4, 'Acervo', 1),
(4, 'associados', 4, 'Usuarios', NULL),
(5, 'patrimonio', 4, 'Patrimonio', NULL),
(11, 'administracao', 5, 'Administracao', NULL),
(12, 'financeiro', 5, 'Financeiro', NULL),
(13, 'acervo', 5, 'Acervo', 1),
(14, 'associados', 5, 'Usuarios', NULL),
(15, 'patrimonio', 5, 'Patrimonio', NULL),
(21, 'administracao', 6, 'Administracao', NULL),
(22, 'financeiro', 6, 'Financeiro', NULL),
(23, 'associados', 6, 'Usuarios', NULL),
(24, 'patrimonio', 6, 'Patrimonio', NULL),
(26, 'acervo', 7, 'Acervo', 1),
(32, 'acervo', 8, 'Acervo', 1),
(38, 'reunioesatas', 4, 'ReunioesAtas', NULL),
(39, 'conselhofiscal', 4, 'ConselhoFiscal', NULL),
(40, 'conselhofiscal', 5, 'ConselhoFiscal', NULL),
(41, 'reunioesatas', 5, 'ReunioesAtas', NULL),
(42, 'Expedicoes', 4, 'Expedicoes', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesa`
--

CREATE TABLE `tipo_despesa` (
  `id_tipoDesp` int(11) NOT NULL,
  `nome_despesa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_despesa`
--

INSERT INTO `tipo_despesa` (`id_tipoDesp`, `nome_despesa`) VALUES
(1, 'Agua'),
(2, 'Luz'),
(3, 'Telefone'),
(4, 'IPTU'),
(5, 'Internet'),
(6, 'Hospedagem de Dominio'),
(7, 'Combustivel'),
(8, 'Insumos Gerais'),
(9, 'Alimentação'),
(10, 'Transporte'),
(11, 'Compras Diversas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_receita`
--

CREATE TABLE `tipo_receita` (
  `id_tipoRec` int(11) NOT NULL,
  `nome_receita` varchar(30) DEFAULT NULL,
  `id_receita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_receita`
--

INSERT INTO `tipo_receita` (`id_tipoRec`, `nome_receita`, `id_receita`) VALUES
(1, 'Mensalidade', NULL),
(2, 'Doação', NULL),
(3, 'Venda', NULL),
(4, 'Prestação de Serviços', NULL),
(5, 'Ganho por exibições na Interne', NULL),
(6, 'Direitos Conexos', NULL),
(7, 'Direitos Autorais', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(80) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `data_de_nascimento` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `data_de_associacao` date DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `data_de_desligamento` date DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `pais` varchar(25) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cpf`, `nome`, `endereco`, `id_perfil`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `data_de_nascimento`, `email`, `data_de_associacao`, `login`, `senha`, `telefone`, `celular`, `situacao`, `data_de_desligamento`, `sobrenome`, `naturalidade`, `pais`, `cep`, `estado`) VALUES
(1, 1, '1', '1', 4, NULL, '1', NULL, NULL, NULL, '1981-08-14', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL),
(2, 1232321, '32132323', '123123', NULL, NULL, '2323232', NULL, NULL, NULL, '123123', '213233232', NULL, NULL, '1981-03-12', NULL, NULL, NULL, NULL, '3123213', '232323', '3232323', '21321321', NULL),
(3, 1232321, '32132323', '123123', NULL, NULL, '2323232', NULL, NULL, NULL, '123123', '213233232', NULL, NULL, '1981-03-12', NULL, NULL, NULL, NULL, '3123213', '232323', '3232323', '21321321', NULL),
(12, 524801745, 'Leonardo', 'Ivo', NULL, NULL, 'Rua Minister', NULL, NULL, NULL, '232323', 'BR', NULL, NULL, '', NULL, NULL, NULL, NULL, 'RJ', 'dasdasdasd', '123456', '33', NULL),
(13, 1144209714, 'Carmem', 'Amaral da Silva', 7, NULL, 'Rua Antonio Pereira', NULL, NULL, NULL, '323323', 'BR', NULL, NULL, '1911-03-11', NULL, NULL, NULL, NULL, 'RJ', 'leonardo@fg.br', '123456', '655', NULL),
(14, 405700712, 'Ana ', 'Rosa', NULL, NULL, 'Rua ministro', NULL, NULL, NULL, '2222', 'BR', NULL, NULL, '1968-08-27', NULL, NULL, NULL, NULL, 'RJ', 'ana@rosa', '123456', '33', NULL),
(17, 232334555, 'd', 'l', NULL, NULL, 'l', NULL, NULL, NULL, 'l', 'l', NULL, NULL, '1981-08-14', NULL, NULL, NULL, NULL, 'a', 'q', 'q', 'l', NULL),
(18, 1234567890, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', NULL),
(19, 78845345, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', NULL),
(20, 20000000, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, 'aaaaa', 'aaaaa', NULL, NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', NULL),
(21, 9922392, 'Carlos', 'Eduardo', NULL, NULL, 'Rua do verde', NULL, NULL, NULL, '232333', 'BR', NULL, NULL, '1987-03-12', NULL, NULL, NULL, NULL, 'RJ', 'sadasdsa', 'asdasdasddsa', '592', NULL),
(22, 405750714, 'DAdo', 'Moreira', NULL, NULL, 'Avenida', NULL, NULL, NULL, '888', '888', NULL, NULL, '1978-12-18', NULL, NULL, NULL, NULL, 'RJ', 'sdsd', 'dsdsd', '88', NULL),
(23, 990232333, 'Cladio', ' Tognolli', NULL, 'Rua Barros', '85', '101', NULL, NULL, '02090340', 'Brasil', NULL, NULL, '1957-09-18', NULL, NULL, NULL, NULL, 'Paulista', 'Tognolli@jp.com.br', '123456', 'Vila Guilerme', NULL),
(24, 6788904, 'Orlando ', 'Rua da Feira', NULL, '33', '', 'Grama', 'Nova Iguaçu', NULL, '23041995', 'orlando@nascimento', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Silva Barbosa', 'Rio de Janeiro', 'Brasil', '22040560', 'Rio de Janeiro'),
(26, 213233233, 'Weiller ', 'Rua Carombert da Costa', 5, '121', '', 'Magalhães Bastos', 'Rio de Janeiro', NULL, '', 'weiller@tdr.com.br', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Marques', '', 'Brasil', '217650000', 'RJ'),
(27, 22334566, 'Carlos ', 'Rua João Pinheiro', NULL, '259', '', 'Piedade', 'Rio de Janeiro', NULL, '1950-07-20', 'carlosassis@tdr.com.br', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Assis', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro'),
(28, 2103394444, 'Fernando Sakai', 'Rua João Pinheiro', NULL, '259', '', 'Piedade', 'Rio de Janeiro', NULL, '1950-07-20', 'sakai@tdr.com.br', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Sakai', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro'),
(29, 343666777, 'Mozart ', 'Rua João Pinheiro', NULL, '259', '', 'Piedade', 'Rio de Janeiro', NULL, '1950-07-20', 'sakai@tdr.com.br', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Fernando', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro'),
(30, 93233334, 'Rodrigo ', 'Rua João Pinheiro', NULL, '259', '', 'Piedade', 'Rio de Janeiro', NULL, '1950-07-20', 'rodrigo@tdr.com.br', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Sampaio', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro'),
(31, 4355555, 'Felipe ', 'Rua Jose Ramalho', NULL, '259', '', 'Pavuna', 'Rio de Janeiro', NULL, '1992-07-01', 'rodrigo@tdr.com.br', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Anacleto', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro'),
(32, 33994445, 'Edson Vander', 'Rua João Candido', 5, '100', '', 'Pavuna', 'São João de Meriti', NULL, '1970-05-05', 'edson@tdr.com.br', NULL, NULL, '123456', NULL, NULL, NULL, NULL, 'Teixeira', 'Rio de Janeiro', 'Brasil', '23009999', 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `nome_video` varchar(30) DEFAULT NULL,
  `tipo_video` varchar(20) DEFAULT NULL,
  `descricao` text,
  `autor` varchar(60) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `data_de_cadastramento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id_acervo`);

--
-- Indexes for table `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `id_reuniao` (`id_reuniao`),
  ADD KEY `id_expedicao` (`id_expedicao`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id_audios`),
  ADD KEY `fk_audio_acervo` (`id_acervo`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `fk_cargo_usuario` (`id_usuario`);

--
-- Indexes for table `conselhofiscal`
--
ALTER TABLE `conselhofiscal`
  ADD PRIMARY KEY (`id_conselho`),
  ADD KEY `fk_cargo_conselho_fiscal` (`id_cargo`),
  ADD KEY `fk_usuario_conselheiro` (`id_usuario`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `Id_TipDesp` (`Id_TipDesp`),
  ADD KEY `id_financeiro` (`id_financeiro`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documento_acervo` (`id_acervo`);

--
-- Indexes for table `expedicoes`
--
ALTER TABLE `expedicoes`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `fk_usuario_expedicoes` (`id_usuario`);

--
-- Indexes for table `financeiro`
--
ALTER TABLE `financeiro`
  ADD PRIMARY KEY (`id_financeiro`),
  ADD KEY `id_receita` (`id_receita`),
  ADD KEY `id_despesa` (`id_despesa`);

--
-- Indexes for table `grupos_sub_paginas`
--
ALTER TABLE `grupos_sub_paginas`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupos_paginas` (`id_tabela`),
  ADD KEY `fk_grupos_sub_paginas` (`id_perfil`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_imagem_acervo` (`id_acervo`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livros`);

--
-- Indexes for table `logeventos`
--
ALTER TABLE `logeventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `Fk_cargo` (`cargo`),
  ADD KEY `fk_pagina` (`tabela`),
  ADD KEY `FK_usuario` (`id_usuario`);

--
-- Indexes for table `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`id_mensalidade`),
  ADD KEY `Fk_mensalidade_usuario` (`id_usuario`);

--
-- Indexes for table `patrimonio`
--
ALTER TABLE `patrimonio`
  ADD PRIMARY KEY (`id_patrimonio`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `id_tipoRec` (`id_tipoRec`),
  ADD KEY `receita_ibfk_1` (`id_financeiro`);

--
-- Indexes for table `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`id_reuniao`),
  ADD KEY `tipo_cargo` (`id_cargo`),
  ADD KEY `fk_reuniao_usuario` (`id_usuarios`);

--
-- Indexes for table `tabelas_sistema`
--
ALTER TABLE `tabelas_sistema`
  ADD PRIMARY KEY (`id_tabela`),
  ADD KEY `fk_perfil` (`id_perfil`);

--
-- Indexes for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  ADD PRIMARY KEY (`id_tipoDesp`);

--
-- Indexes for table `tipo_receita`
--
ALTER TABLE `tipo_receita`
  ADD PRIMARY KEY (`id_tipoRec`),
  ADD KEY `id_receita` (`id_receita`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarioPerfil` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administracao`
--
ALTER TABLE `administracao`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `conselhofiscal`
--
ALTER TABLE `conselhofiscal`
  MODIFY `id_conselho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expedicoes`
--
ALTER TABLE `expedicoes`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `financeiro`
--
ALTER TABLE `financeiro`
  MODIFY `id_financeiro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupos_sub_paginas`
--
ALTER TABLE `grupos_sub_paginas`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `mensalidade`
--
ALTER TABLE `mensalidade`
  MODIFY `id_mensalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `id_reuniao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabelas_sistema`
--
ALTER TABLE `tabelas_sistema`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  MODIFY `id_tipoDesp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipo_receita`
--
ALTER TABLE `tipo_receita`
  MODIFY `id_tipoRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administracao`
--
ALTER TABLE `administracao`
  ADD CONSTRAINT `administracao_ibfk_1` FOREIGN KEY (`id_reuniao`) REFERENCES `reuniao` (`id_reuniao`),
  ADD CONSTRAINT `administracao_ibfk_2` FOREIGN KEY (`id_reuniao`) REFERENCES `reuniao` (`id_reuniao`),
  ADD CONSTRAINT `administracao_ibfk_3` FOREIGN KEY (`id_expedicao`) REFERENCES `expedicoes` (`id_exp`),
  ADD CONSTRAINT `administracao_ibfk_4` FOREIGN KEY (`id_expedicao`) REFERENCES `expedicoes` (`id_exp`),
  ADD CONSTRAINT `administracao_ibfk_5` FOREIGN KEY (`id_expedicao`) REFERENCES `expedicoes` (`id_exp`),
  ADD CONSTRAINT `administracao_ibfk_6` FOREIGN KEY (`id_expedicao`) REFERENCES `expedicoes` (`id_exp`),
  ADD CONSTRAINT `administracao_ibfk_7` FOREIGN KEY (`id_expedicao`) REFERENCES `expedicoes` (`id_exp`),
  ADD CONSTRAINT `administracao_ibfk_8` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Limitadores para a tabela `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_3` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `fk_cargo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `conselhofiscal`
--
ALTER TABLE `conselhofiscal`
  ADD CONSTRAINT `fk_cargo_conselho_fiscal` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Limitadores para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`Id_TipDesp`) REFERENCES `tipo_despesa` (`id_tipoDesp`),
  ADD CONSTRAINT `despesa_ibfk_2` FOREIGN KEY (`id_financeiro`) REFERENCES `financeiro` (`id_financeiro`);

--
-- Limitadores para a tabela `financeiro`
--
ALTER TABLE `financeiro`
  ADD CONSTRAINT `financeiro_ibfk_1` FOREIGN KEY (`id_receita`) REFERENCES `receita` (`id_receita`),
  ADD CONSTRAINT `financeiro_ibfk_2` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id_despesa`),
  ADD CONSTRAINT `financeiro_ibfk_3` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id_despesa`);

--
-- Limitadores para a tabela `grupos_sub_paginas`
--
ALTER TABLE `grupos_sub_paginas`
  ADD CONSTRAINT `fk_grupos_paginas` FOREIGN KEY (`id_tabela`) REFERENCES `tabelas_sistema` (`id_tabela`),
  ADD CONSTRAINT `fk_grupos_sub_paginas` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Limitadores para a tabela `logeventos`
--
ALTER TABLE `logeventos`
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `Fk_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `fk_pagina` FOREIGN KEY (`tabela`) REFERENCES `tabelas_sistema` (`id_tabela`);

--
-- Limitadores para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `Fk_mensalidade_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`id_financeiro`) REFERENCES `financeiro` (`id_financeiro`);

--
-- Limitadores para a tabela `reuniao`
--
ALTER TABLE `reuniao`
  ADD CONSTRAINT `fk_reuniao_usuario` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reuniao_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Limitadores para a tabela `tabelas_sistema`
--
ALTER TABLE `tabelas_sistema`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Limitadores para a tabela `tipo_receita`
--
ALTER TABLE `tipo_receita`
  ADD CONSTRAINT `tipo_receita_ibfk_1` FOREIGN KEY (`id_receita`) REFERENCES `receita` (`id_receita`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarioPerfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
