-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jul-2019 às 02:43
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpf_cliente` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `rua_cliente` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `bairro_cliente` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_cliente`
--

INSERT INTO `tab_cliente` (`cod_cliente`, `nome_cliente`, `cpf_cliente`, `telefone`, `data_nascimento`, `rua_cliente`, `bairro_cliente`, `numero`) VALUES
(18, 'jÃ¡rdesson ribeiro ', '54585555555', '99568522223', '2019-06-24', 'Centro', 'Centro', 326),
(19, 'AugustoTadeu', '9666555555', '10005999999', '1998-06-25', 'centro', 'Centro', 125),
(20, 'MariÃ¡ Sousa Maos', '454655664', '9525785555', '1995-02-18', 'Sul', 'Sul', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_fornecedor`
--

CREATE TABLE `tab_fornecedor` (
  `cod_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(50) DEFAULT NULL,
  `razao_social` varchar(50) DEFAULT NULL,
  `cnpj_fornecedor` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `bairro_fornecedor` varchar(50) DEFAULT NULL,
  `rua_fornecedor` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_fornecedor`
--

INSERT INTO `tab_fornecedor` (`cod_fornecedor`, `nome_fornecedor`, `razao_social`, `cnpj_fornecedor`, `email`, `telefone`, `bairro_fornecedor`, `rua_fornecedor`, `numero`) VALUES
(1, 'MiniDevsIfpi', 'MiniDevsIfpi Ltda', '1245784545', 'minidevsifpi@gmai.com', '99658999', 'Centro', 'Ubn', 4450);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_funcionario`
--

CREATE TABLE `tab_funcionario` (
  `cod_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf_funcionario` varchar(11) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `rua_funci` varchar(60) DEFAULT NULL,
  `bairro_funci` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `salario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_funcionario`
--

INSERT INTO `tab_funcionario` (`cod_funcionario`, `nome_funcionario`, `cargo`, `data_nascimento`, `cpf_funcionario`, `telefone`, `data_admissao`, `rua_funci`, `bairro_funci`, `numero`, `salario`) VALUES
(1, 'Jardesson Ribeiro', 'Administrador', '1999-11-17', '12457888888', '994586666', '2019-05-01', 'Centro', 'Centro', 335, 1000),
(2, 'Jonatas', 'Contador', '1994-12-16', '9659888888', '65589999999', '2019-06-05', 'Zona Rural', 'Zona Rural', 2458, 1500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_itempedido`
--

CREATE TABLE `tab_itempedido` (
  `quantidade` int(11) DEFAULT NULL,
  `cod_produtovenda` int(11) DEFAULT NULL,
  `cod_pedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_itempedido`
--

INSERT INTO `tab_itempedido` (`quantidade`, `cod_produtovenda`, `cod_pedido`) VALUES
(14, 16, 42),
(10, 16, 42),
(10, 16, 42),
(10, 16, 42),
(0, 16, 42),
(4, 16, 42),
(50, 16, 42),
(2, 16, 42),
(100, 16, 42),
(0, 16, 42),
(101, 16, 42),
(102, 16, 42),
(120, 16, 42),
(0, 16, 42),
(16, 16, 42),
(1, 16, 42),
(12, 16, 42),
(16, 16, 42),
(16, 16, 71),
(10, 16, 70),
(20, 16, 70),
(15, 16, 70),
(10, 16, 79),
(1, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 79),
(0, 16, 80),
(0, 16, 80),
(0, 16, 81),
(0, 16, 81),
(0, 16, 81),
(0, 16, 81),
(20, 16, 83),
(2, 16, 83),
(1, 16, 83),
(2, 16, 83),
(0, 16, 83),
(3, 16, 83),
(2, 17, 84),
(5, 16, 84),
(20, 16, 85),
(21, 17, 85),
(0, 16, 85),
(2, 17, 85),
(2, 17, 85),
(20, 16, 85),
(12, 16, 85),
(2, 16, 89),
(10, 17, 89),
(50, 16, 90),
(51, 17, 90),
(2, 20, 91),
(20, 16, 95),
(20, 16, 96),
(10, 17, 96),
(5, 16, 96),
(2, 17, 99),
(1, 16, 99),
(1, 16, 100),
(2, 16, 100),
(1, 17, 100),
(1, 16, 100),
(1, 17, 100),
(1, 16, 101),
(2, 16, 101),
(2, 16, 101),
(2, 16, 101),
(2, 16, 101),
(2, 16, 101),
(2, 16, 101),
(1, 16, 101),
(1, 16, 101),
(1, 16, 102),
(1, 16, 102),
(1, 16, 102),
(1, 17, 102),
(1, 17, 102),
(1, 16, 103),
(2, 16, 103),
(3, 16, 103),
(0, 16, 104),
(1, 16, 104),
(3, 17, 104),
(1, 16, 104),
(1, 16, 104),
(0, 16, 104),
(1, 16, 105),
(2, 17, 105),
(1, 16, 106),
(2, 17, 106),
(1, 16, 107),
(2, 17, 107),
(16, 16, 108),
(1, 16, 108),
(1, 16, 109),
(20, 16, 110),
(1, 16, 111),
(1, 16, 112),
(1, 20, 112),
(2, 16, 113),
(1, 20, 114),
(21, 24, 115),
(19, 25, 116),
(20, 20, 116),
(20, 20, 116),
(19, 20, 117),
(10, 20, 117),
(2, 25, 117),
(18, 25, 117),
(1, 20, 117);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_itenscozinha`
--

CREATE TABLE `tab_itenscozinha` (
  `cod_itenscozinha` int(11) NOT NULL,
  `cod_fornecedor` int(11) DEFAULT NULL,
  `nome_item` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `valor_item` double DEFAULT NULL,
  `descricao_item` varchar(60) DEFAULT NULL,
  `categoria` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_itenscozinha`
--

INSERT INTO `tab_itenscozinha` (`cod_itenscozinha`, `cod_fornecedor`, `nome_item`, `quantidade`, `validade`, `valor_item`, `descricao_item`, `categoria`) VALUES
(1, 1, 'Arroz', 20, '2019-01-01', 2.5, 'Nada', 'NÃ£o PerecÃ­vel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pedido`
--

CREATE TABLE `tab_pedido` (
  `cod_pedido` int(11) NOT NULL,
  `data_pedido` date DEFAULT NULL,
  `hora_pedido` time DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_funcionario` int(11) DEFAULT NULL,
  `status_pedido` varchar(50) NOT NULL DEFAULT 'Iniciado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_pedido`
--

INSERT INTO `tab_pedido` (`cod_pedido`, `data_pedido`, `hora_pedido`, `valor_total`, `cod_cliente`, `cod_funcionario`, `status_pedido`) VALUES
(42, '2019-06-24', '16:32:15', 10, 18, 2, 'Iniciado'),
(43, '2019-06-24', '16:36:15', 10, 18, 2, 'Iniciado'),
(44, '2019-06-24', '16:37:47', 10, 18, 2, 'Iniciado'),
(45, '2019-06-24', '16:41:58', 10, 18, 2, 'Iniciado'),
(46, '2019-06-24', '16:42:44', 10, 18, 2, 'Iniciado'),
(47, '2019-06-24', '16:43:43', 10, 18, 2, 'Iniciado'),
(48, '2019-06-24', '16:44:52', 10, 18, 2, 'Iniciado'),
(49, '2019-06-24', '16:46:54', 10, 18, 2, 'Iniciado'),
(50, '2019-06-24', '16:48:58', 10, 18, 2, 'Iniciado'),
(51, '2019-06-24', '17:07:16', 10, 18, 2, 'Iniciado'),
(53, '2019-06-25', '12:15:39', 10, 18, 2, 'Iniciado'),
(54, '2019-06-25', '12:29:34', 10, 18, 2, 'Iniciado'),
(56, '2019-06-25', '13:03:42', 10, 18, 2, 'Iniciado'),
(57, '2019-06-25', '13:14:25', 10, 18, 2, 'Iniciado'),
(58, '2019-06-25', '13:15:47', 10, 18, 2, 'Iniciado'),
(59, '2019-06-25', '13:16:04', 10, 18, 2, 'Iniciado'),
(60, '2019-06-25', '13:17:15', 10, 18, 2, 'Iniciado'),
(61, '2019-06-25', '13:39:35', 10, 18, 2, 'Iniciado'),
(64, '2019-06-25', '13:39:50', 10, 18, 2, 'Iniciado'),
(65, '2019-06-25', '13:47:08', 10, 18, 2, 'Iniciado'),
(66, '2019-06-25', '13:49:55', 10, 18, 2, 'Iniciado'),
(67, '2019-06-25', '13:53:06', 10, 18, 2, 'Iniciado'),
(68, '2019-06-25', '13:54:27', 10, 18, 2, 'Iniciado'),
(69, '2019-06-25', '14:06:47', 10, 18, 2, 'Iniciado'),
(70, '2019-06-25', '14:15:53', 10, 18, 2, 'Iniciado'),
(71, '2019-06-25', '14:18:46', 10, 18, 2, 'Iniciado'),
(72, '2019-06-25', '14:22:49', 10, 18, 2, 'Iniciado'),
(73, '2019-06-25', '14:32:58', 10, 18, 2, 'Iniciado'),
(74, '2019-06-25', '14:34:22', 10, 18, 2, 'Iniciado'),
(75, '2019-06-25', '14:35:00', 10, 18, 2, 'Iniciado'),
(76, '2019-06-25', '14:35:20', 10, 18, 2, 'Iniciado'),
(77, '2019-06-25', '14:36:34', 10, 18, 2, 'Iniciado'),
(78, '2019-06-25', '14:37:08', 10, 18, 2, 'Iniciado'),
(79, '2019-06-25', '14:41:58', 10, 18, 2, 'Iniciado'),
(80, '2019-06-25', '15:09:09', 10, 18, 2, 'Iniciado'),
(81, '2019-06-25', '15:11:16', 10, 18, 2, 'Iniciado'),
(82, '2019-06-25', '15:12:58', 10, 18, 2, 'Iniciado'),
(83, '2019-06-25', '15:14:33', 10, 18, 2, 'Iniciado'),
(84, '2019-06-25', '15:28:16', 10, 18, 2, 'Iniciado'),
(85, '2019-06-25', '15:29:06', 10, 18, 2, 'Iniciado'),
(86, '2019-06-25', '15:43:27', 10, 18, 2, 'Iniciado'),
(87, '2019-06-25', '15:47:44', 10, 18, 2, 'Iniciado'),
(88, '2019-06-25', '16:11:08', 10, 18, 2, 'Iniciado'),
(89, '2019-06-25', '16:14:07', 10, 18, 2, 'Iniciado'),
(90, '2019-06-25', '16:15:19', 10, 18, 2, 'Iniciado'),
(91, '2019-06-25', '17:00:12', 10, 19, 2, 'Iniciado'),
(92, '2019-06-26', '12:23:14', 10, 19, 2, 'Iniciado'),
(95, '2019-06-26', '12:33:48', 10, 19, 2, 'Iniciado'),
(96, '2019-06-26', '12:37:58', 10, 19, 2, 'Iniciado'),
(99, '2019-06-26', '14:00:50', 10, 19, 2, 'Iniciado'),
(100, '2019-06-26', '15:24:06', 10, 18, 2, 'Iniciado'),
(101, '2019-06-26', '15:31:09', 10, 18, 2, 'Iniciado'),
(102, '2019-06-26', '15:44:09', 10, 19, 2, 'Iniciado'),
(103, '2019-06-26', '15:47:32', 10, 18, 2, 'Iniciado'),
(104, '2019-06-26', '15:59:54', 10, 18, 2, 'Iniciado'),
(105, '2019-06-26', '16:23:26', 10, 19, 2, 'Iniciado'),
(106, '2019-06-26', '16:25:29', 10, 18, 2, 'Iniciado'),
(107, '2019-06-26', '16:41:49', 10, 19, 2, 'Iniciado'),
(108, '2019-06-26', '16:49:25', 10, 18, 2, 'Iniciado'),
(109, '2019-06-27', '15:03:13', 10, 18, 2, 'Iniciado'),
(110, '2019-06-27', '15:45:19', 10, 19, 2, 'Iniciado'),
(111, '2019-07-01', '13:14:25', 10, 19, 2, 'Concluido'),
(112, '2019-07-06', '12:09:51', 10, 19, 2, 'Iniciado'),
(113, '2019-07-06', '23:34:22', 10, 19, 2, 'Concluido'),
(114, '2019-07-06', '23:34:40', 10, 20, 2, 'Concluido'),
(115, '2019-07-07', '18:38:11', 10, 19, 2, 'Concluido'),
(116, '2019-07-07', '19:20:56', 10, 18, 2, 'Andamento'),
(117, '2019-07-07', '19:30:07', 10, 18, 2, 'Iniciado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produtovenda`
--

CREATE TABLE `tab_produtovenda` (
  `cod_produtovenda` int(11) NOT NULL,
  `nome_produto` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `valor_produto` double DEFAULT NULL,
  `descricao_produto` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `decremento` varchar(3) NOT NULL DEFAULT 'nao',
  `qnt_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_produtovenda`
--

INSERT INTO `tab_produtovenda` (`cod_produtovenda`, `nome_produto`, `valor_produto`, `descricao_produto`, `decremento`, `qnt_produto`) VALUES
(16, 'Pizza de Calabresa  Media', 33.5, 'Quatro queijos', 'nao', 0),
(17, 'Pizza Carne de Sol- Tam Grande', 35, 'Mais Pedida', 'nao', 0),
(19, 'Pizza Portuguêsa', 32.5, 'Boa', 'nao', 0),
(20, 'Coca-Cola', 5.5, '1 litro', 'sim', 9),
(21, 'Ã  moda da familia', 20, 'Teste', 'nao', 0),
(22, 'Ã moda do chefe', 25, 'teste 2', 'nao', 0),
(23, 'Ã€ moda da casa', 35, 'Muito boa', 'nao', 0),
(24, 'Fanta Uva', 5.2, 'Boa', 'sim', 0),
(25, 'Fanta Uva', 5.15, 'Teste', 'sim', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `cod_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`cod_usuario`, `usuario`, `senha`, `nivel_acesso`, `cod_funcionario`) VALUES
(2, 'admin', 'admin', 1, 1),
(3, 'jonatas', 'admin123', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indexes for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  ADD PRIMARY KEY (`cod_fornecedor`);

--
-- Indexes for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  ADD PRIMARY KEY (`cod_funcionario`);

--
-- Indexes for table `tab_itempedido`
--
ALTER TABLE `tab_itempedido`
  ADD KEY `fk_itpedi` (`cod_pedido`),
  ADD KEY `fk_itpedi2` (`cod_produtovenda`);

--
-- Indexes for table `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  ADD PRIMARY KEY (`cod_itenscozinha`),
  ADD KEY `fk_itemCo` (`cod_fornecedor`);

--
-- Indexes for table `tab_pedido`
--
ALTER TABLE `tab_pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `fk_pefun` (`cod_funcionario`),
  ADD KEY `fk_vefun2` (`cod_cliente`);

--
-- Indexes for table `tab_produtovenda`
--
ALTER TABLE `tab_produtovenda`
  ADD PRIMARY KEY (`cod_produtovenda`);

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `fk_user` (`cod_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  MODIFY `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  MODIFY `cod_itenscozinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_pedido`
--
ALTER TABLE `tab_pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tab_produtovenda`
--
ALTER TABLE `tab_produtovenda`
  MODIFY `cod_produtovenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_itempedido`
--
ALTER TABLE `tab_itempedido`
  ADD CONSTRAINT `fk_itpedi` FOREIGN KEY (`cod_pedido`) REFERENCES `tab_pedido` (`cod_pedido`),
  ADD CONSTRAINT `fk_itpedi2` FOREIGN KEY (`cod_produtovenda`) REFERENCES `tab_produtovenda` (`cod_produtovenda`);

--
-- Limitadores para a tabela `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  ADD CONSTRAINT `fk_itemCo` FOREIGN KEY (`cod_fornecedor`) REFERENCES `tab_fornecedor` (`cod_fornecedor`);

--
-- Limitadores para a tabela `tab_pedido`
--
ALTER TABLE `tab_pedido`
  ADD CONSTRAINT `fk_pefun` FOREIGN KEY (`cod_funcionario`) REFERENCES `tab_funcionario` (`cod_funcionario`),
  ADD CONSTRAINT `fk_vefun2` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`);

--
-- Limitadores para a tabela `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`cod_funcionario`) REFERENCES `tab_funcionario` (`cod_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
