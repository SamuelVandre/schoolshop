-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/08/2024 às 17:10
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
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_item` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nomes` varchar(255) NOT NULL,
  `emails` text NOT NULL,
  `mensagens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `nomes`, `emails`, `mensagens`) VALUES
(1, 'Samuel', 'samuca.v.alves@gmail.com', 'Site com algumas coisas que devem ser reparadas e faltam manutanção'),
(2, 'Samuel', 'samuca.v.alves@gmail.com', 'Site com algumas coisas que devem ser reparadas e faltam manutanção'),
(3, 'Samuel', 'samuca.v.alves@gmail.com', 'Site com algumas coisas que devem ser reparadas e faltam manutanção');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `descricao` text NOT NULL,
  `desconto` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `todosprodutos`
--

INSERT INTO `todosprodutos` (`id`, `produtos`, `quantidade`, `valor`, `img1`, `img2`, `img3`, `img4`, `img5`, `descricao`, `desconto`) VALUES
(1, 'Blusa de frio', 7, 212.99, 'blusa_de_frio.webp', 'blusa_de_frio_adidas.webp', 'blusa_de_frio_lacoste.webp', 'blusa_de_frio_oakley.webp', 'blusa_de_frio_quick.webp', 'Blusa de frio muito boa', 12.20),
(2, 'Mouse Gamer Profissional do Paulo Muzy', 45, 799999.99, 'mouseLegal.jpg', 'oisajdlkmfdoijdlk.jpg', 'dsaodsadsoijda.jpg', 'mouseGamerReDragon.avif', 'mouseGamer.jpg', 'Mouse Gamer BOM BARATO', 10.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `pessoa_id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_carrinho_usuarios` (`id_pessoa`),
  ADD KEY `fk_carrinho_produtos` (`id_produto`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_produto` (`id_produto`),
  ADD KEY `fk_pedido_pessoa` (`id_pessoa`);

--
-- Índices de tabela `todosprodutos`
--
ALTER TABLE `todosprodutos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pessoa_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `todosprodutos`
--
ALTER TABLE `todosprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pessoa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_carrinho_produtos` FOREIGN KEY (`id_produto`) REFERENCES `todosprodutos` (`id`),
  ADD CONSTRAINT `fk_carrinho_usuarios` FOREIGN KEY (`id_pessoa`) REFERENCES `usuarios` (`pessoa_id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `usuarios` (`pessoa_id`),
  ADD CONSTRAINT `fk_pedido_produto` FOREIGN KEY (`id_produto`) REFERENCES `todosprodutos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
