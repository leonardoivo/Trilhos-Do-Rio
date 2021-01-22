-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07-Ago-2018 às 16:30
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
-- Estrutura da tabela `tipo_acervo`
--

CREATE TABLE `tipo_acervo` (
  `id_tipoAcervo` int(11) NOT NULL,
  `nomeTipoAcervo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_acervo`
--

INSERT INTO `tipo_acervo` (`id_tipoAcervo`, `nomeTipoAcervo`) VALUES
(1, 'Fotos'),
(2, 'Documentos'),
(3, 'Audios'),
(4, 'Fotos & Imagens'),
(5, 'Vídeos'),
(6, 'Livros');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipo_acervo`
--
ALTER TABLE `tipo_acervo`
  ADD PRIMARY KEY (`id_tipoAcervo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo_acervo`
--
ALTER TABLE `tipo_acervo`
  MODIFY `id_tipoAcervo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
