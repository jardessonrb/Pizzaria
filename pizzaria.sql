-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jun-2019 às 03:05
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
  `cod_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produtovenda`
--

CREATE TABLE `tab_produtovenda` (
  `cod_produtovenda` int(11) NOT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `valor_produto` double DEFAULT NULL,
  `descricao_produto` varchar(60) DEFAULT NULL,
  `qnt_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  MODIFY `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  MODIFY `cod_itenscozinha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_pedido`
--
ALTER TABLE `tab_pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_produtovenda`
--
ALTER TABLE `tab_produtovenda`
  MODIFY `cod_produtovenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
