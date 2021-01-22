-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 15/03/2018 às 19h50min
-- Versão do Servidor: 1.0.213
-- Versão do PHP: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `TrilhosDoRio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE IF NOT EXISTS `acervo` (
  `id_acervo` int(11) NOT NULL,
  `nome_acervo` varchar(30) DEFAULT NULL,
  `id_patrimonio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_acervo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE IF NOT EXISTS `administracao` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_financeiro` int(11) DEFAULT NULL,
  `id_reuniao` int(11) DEFAULT NULL,
  `id_expedicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adm`),
  KEY `id_reuniao` (`id_reuniao`),
  KEY `id_expedicao` (`id_expedicao`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `audios`
--

CREATE TABLE IF NOT EXISTS `audios` (
  `id_audios` int(11) NOT NULL,
  `nome_audio` varchar(30) DEFAULT NULL,
  `tipo_audio` varchar(20) DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_audios`),
  KEY `fk_audio_acervo` (`id_acervo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(30) DEFAULT NULL,
  `desc_cargo` text DEFAULT NULL,
  `tipo_cargo` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`),
  KEY `id_perfil` (`id_perfil`),
  KEY `fk_cargo_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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

CREATE TABLE IF NOT EXISTS `conselhofiscal` (
  `id_conselho` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `Relatorio` text DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_conselho`),
  KEY `fk_cargo_conselho_fiscal` (`id_cargo`),
  KEY `fk_usuario_conselheiro` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Extraindo dados da tabela `conselhofiscal`
--

INSERT INTO `conselhofiscal` (`id_conselho`, `Titulo`, `Relatorio`, `id_cargo`, `id_usuario`) VALUES
(70, 'cxccc', '  cccccssassasd', 9, 1),
(73, '344', 'dsadsdssddsds', 9, 1),
(75, 'Sobre a reforma de auto de linha', 'Tudo certo!', 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE IF NOT EXISTS `despesa` (
  `id_despesa` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_despesa` varchar(30) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id_despesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `id_documento` int(11) NOT NULL,
  `nome_documento` varchar(30) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  `formato` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_documento_acervo` (`id_acervo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expedicoes`
--

CREATE TABLE IF NOT EXISTS `expedicoes` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `nome_expedicao` varchar(50) DEFAULT NULL,
  `data_expedicao` date DEFAULT NULL,
  `desc_expedicao` text DEFAULT NULL,
  `relat_exped` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_cargo` int(11) DEFAULT NULL,
  `num_participantes` int(100) DEFAULT NULL,
  `participantes` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_exp`),
  KEY `fk_usuario_expedicoes` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

CREATE TABLE IF NOT EXISTS `financeiro` (
  `id_financeiro` int(11) NOT NULL AUTO_INCREMENT,
  `id_despesa` int(11) DEFAULT NULL,
  `id_receita` int(11) DEFAULT NULL,
  `balanco_mensal` datetime DEFAULT NULL,
  `relatorio_financ` text DEFAULT NULL,
  PRIMARY KEY (`id_financeiro`),
  KEY `id_receita` (`id_receita`),
  KEY `id_despesa` (`id_despesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_sub_paginas`
--

CREATE TABLE IF NOT EXISTS `grupos_sub_paginas` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pagina` varchar(30) DEFAULT NULL,
  `id_tabela` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `pasta` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupos_paginas` (`id_tabela`),
  KEY `fk_grupos_sub_paginas` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `grupos_sub_paginas`
--

INSERT INTO `grupos_sub_paginas` (`id_grupo`, `nome_pagina`, `id_tabela`, `id_perfil`, `pasta`) VALUES
(1, 'livros', 3, 4, 'Livros'),
(2, 'videos', 3, 4, 'Videos'),
(3, 'lmagens', 3, 4, 'Imagens'),
(4, 'objetos', 3, 4, 'Objetos'),
(5, 'audios', 3, 4, 'Audios'),
(6, 'documentos', 3, 4, 'Documentos'),
(7, 'receita', 2, 4, 'Receita'),
(8, 'despesa', 2, 4, 'Despesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(30) DEFAULT NULL,
  `tipo_imagem` varchar(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imagem`),
  KEY `fk_imagem_acervo` (`id_acervo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE IF NOT EXISTS `livros` (
  `id_livros` int(11) NOT NULL,
  `nome_do_livro` varchar(80) DEFAULT NULL,
  `Autor` varchar(60) DEFAULT NULL,
  `Ano` date DEFAULT NULL,
  `dataDeCadastramento` date DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_livros`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `LogEventos`
--

CREATE TABLE IF NOT EXISTS `LogEventos` (
  `idEvento` int(11) NOT NULL,
  `NomeEvento` varchar(50) DEFAULT NULL,
  `TipoEvento` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `tabela` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `Fk_cargo` (`cargo`),
  KEY `fk_pagina` (`tabela`),
  KEY `FK_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que registra todas as atividades realizadas ong.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `logeventos`
--

CREATE TABLE IF NOT EXISTS `logeventos` (
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

CREATE TABLE IF NOT EXISTS `mensalidade` (
  `id_mensalidade` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_de_emissao` datetime DEFAULT NULL,
  `data_de_vencimento` datetime DEFAULT NULL,
  `cod_barras` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mensalidade`),
  KEY `Fk_mensalidade_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE IF NOT EXISTS `objeto` (
  `id_video` int(11) NOT NULL,
  `nome_objeto` varchar(30) DEFAULT NULL,
  `tipo_objeto` varchar(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `origem` varchar(60) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimonio`
--

CREATE TABLE IF NOT EXISTS `patrimonio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_do_bem` varchar(40) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `data_de_integracao` date DEFAULT NULL,
  `tipo_de_material` varchar(40) DEFAULT NULL,
  `Origem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(30) DEFAULT NULL,
  `tipo_acesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `receita` (
  `id_receita` int(11) NOT NULL AUTO_INCREMENT,
  `id_mensalidade` int(11) DEFAULT NULL,
  `id_doacoes` int(11) DEFAULT NULL,
  `vendas` float DEFAULT NULL,
  PRIMARY KEY (`id_receita`),
  KEY `id_mensalidade` (`id_mensalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
--

CREATE TABLE IF NOT EXISTS `reuniao` (
  `id_reuniao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_reuniao` varchar(60) DEFAULT NULL,
  `desc_reuniao` text DEFAULT NULL,
  `relat_ata_reuniao` text DEFAULT NULL,
  `local` varchar(60) DEFAULT NULL,
  `data_reuniao` date DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reuniao`),
  KEY `tipo_cargo` (`id_cargo`),
  KEY `fk_reuniao_usuario` (`id_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `tabelas_sistema` (
  `id_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tabela` varchar(30) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabela`),
  KEY `fk_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `tabelas_sistema`
--

INSERT INTO `tabelas_sistema` (`id_tabela`, `nome_tabela`, `id_perfil`, `link`, `Nivel`) VALUES
(1, 'administracao', 4, NULL, NULL),
(2, 'financeiro', 4, NULL, NULL),
(3, 'acervo', 4, 'Acervo', 1),
(4, 'associados', 4, NULL, NULL),
(5, 'patrimonio', 4, NULL, NULL),
(11, 'administracao', 5, NULL, NULL),
(12, 'financeiro', 5, NULL, NULL),
(13, 'acervo', 5, 'Acervo', 1),
(14, 'associados', 5, NULL, NULL),
(15, 'patrimonio', 5, NULL, NULL),
(21, 'administracao', 6, NULL, NULL),
(22, 'financeiro', 6, NULL, NULL),
(23, 'associados', 6, NULL, NULL),
(24, 'patrimonio', 6, NULL, NULL),
(26, 'acervo', 7, 'Acervo', 1),
(32, 'acervo', 8, 'Acervo', 1),
(38, 'reunioesatas', 4, 'ReunioesAtas', NULL),
(39, 'conselhofiscal', 4, 'ConselhoFiscal', NULL),
(40, 'conselhofiscal', 5, 'ConselhoFiscal', NULL),
(41, 'reunioesatas', 5, 'ReunioesAtas', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarioPerfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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

CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(11) NOT NULL,
  `nome_video` varchar(30) DEFAULT NULL,
  `tipo_video` varchar(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `id_acervo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `administracao`
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
-- Restrições para a tabela `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_3` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `fk_cargo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para a tabela `conselhofiscal`
--
ALTER TABLE `conselhofiscal`
  ADD CONSTRAINT `fk_cargo_conselho_fiscal` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Restrições para a tabela `expedicoes`
--
ALTER TABLE `expedicoes`
  ADD CONSTRAINT `fk_usuario_expedicoes` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para a tabela `financeiro`
--
ALTER TABLE `financeiro`
  ADD CONSTRAINT `financeiro_ibfk_1` FOREIGN KEY (`id_receita`) REFERENCES `receita` (`id_receita`),
  ADD CONSTRAINT `financeiro_ibfk_2` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id_despesa`),
  ADD CONSTRAINT `financeiro_ibfk_3` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id_despesa`);

--
-- Restrições para a tabela `grupos_sub_paginas`
--
ALTER TABLE `grupos_sub_paginas`
  ADD CONSTRAINT `fk_grupos_paginas` FOREIGN KEY (`id_tabela`) REFERENCES `tabelas_sistema` (`id_tabela`),
  ADD CONSTRAINT `fk_grupos_sub_paginas` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Restrições para a tabela `LogEventos`
--
ALTER TABLE `LogEventos`
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `Fk_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `fk_pagina` FOREIGN KEY (`tabela`) REFERENCES `tabelas_sistema` (`id_tabela`);

--
-- Restrições para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `Fk_mensalidade_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`id_mensalidade`) REFERENCES `mensalidade` (`id_mensalidade`);

--
-- Restrições para a tabela `reuniao`
--
ALTER TABLE `reuniao`
  ADD CONSTRAINT `fk_reuniao_usuario` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reuniao_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Restrições para a tabela `tabelas_sistema`
--
ALTER TABLE `tabelas_sistema`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarioPerfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
