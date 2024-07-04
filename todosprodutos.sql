-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 13:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `schoolshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `todosprodutos`
--

CREATE TABLE `todosprodutos` (
  `id` int(11) NOT NULL,
  `produtos` varchar(120) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `img5` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `todosprodutos`
--

INSERT INTO `todosprodutos` (`id`, `produtos`, `quantidade`, `valor`, `img1`, `img2`, `img3`, `img4`, `img5`, `descricao`) VALUES
(1, 'Camiseta nike', 10, 13.00, '0', '0', '0', '0', '0', ''),
(2, 'Camiseta Adidas', 10, 13.00, '0', '0', '0', '0', '0', ''),
(3, 'Camiseta abiaos', 10, 13.00, '0', '0', '0', '0', '0', ''),
(4, 'Camiseta Legal', 10, 13.00, '0', '0', '0', '0', '0', ''),
(5, 'Camiseta Divertida', 10, 13.00, '0', '0', '0', '0', '0', ''),
(6, 'Camiseta Legal e bonita', 10, 13.00, '0', '0', '0', '0', '0', ''),
(7, 'Blusa de frio', 7, 212.99, 'blusa_de_frio.webp', 'blusa_de_frio_adidas.webp', 'blusa_de_frio_lacoste.webp', 'blusa_de_frio_oakley.webp', 'blusa_de_frio_quick.webp', 'Blusa de frio muito boa'),
(8, 'Mouse Gamer Profissional do Paulo Muzy', 45, 799999.99, 'mouseLegal.jpg', 'oisajdlkmfdoijdlk.jpg', 'dsaodsadsoijda.jpg', 'mouseGamerReDragon.avif', 'mouseGamer.jpg', 'Mouse Gamer BOM BARATO'),
(9, 'Canetas hidrográficas', 115, 49.99, 'canetaLegal.png', 'canetasBoas.webp', 'canetasNoPote.jpg', 'canetasSuperDivertidas.webp', 'embalagemDeCaneta.jpg', 'Canetas hidrográficas de alta qualidade com uma grande variedade de cores para seu uso'),
(10, 'Canetinhas infantis <script>alert(\"Bom dia\")</script>', 123, 39.99, 'CanetinhaDivertida.webp', 'canetinhaPontaGrossa.webp', 'CanetinhaPontaLarga.webp', 'Canetinhas.webp', 'CanetinhasLegals.webp', 'Canetinhas infantis coloridas, marca CIS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `todosprodutos`
--
ALTER TABLE `todosprodutos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `todosprodutos`
--
ALTER TABLE `todosprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
