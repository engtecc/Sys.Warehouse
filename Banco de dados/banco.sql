-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2018 às 21:20
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_referencia_comercial` int(11) NOT NULL,
  `limite_de_credito` decimal(10,2) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_referencia_comercial`, `limite_de_credito`, `id_pessoa`, `id_endereco`) VALUES
(1, 1, '4324234.00', 2, 2),
(2, 2, '0.00', 3, 3),
(3, 3, '0.00', 4, 4),
(4, 4, '4324234.00', 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `cnpj` varchar(17) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `data_horario` date NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `vasilhame` tinyint(1) NOT NULL,
  `devolucao` tinyint(1) NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `data_a_devolver` date DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id_emprestimo`, `id_endereco`, `id_venda`, `vasilhame`, `devolucao`, `data_devolucao`, `data_a_devolver`, `id_cliente`) VALUES
(1, 2, 2, 12, 12, '2018-12-13', '2018-11-20', 1),
(2, 5, 2, 12, 0, '2018-12-29', '2018-12-22', 3),
(3, 3, 2, 1, 0, '2018-12-08', '2018-12-29', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 'Fazenda Varginha, KM 05', '5', 'Zona Rural', 'Bambuí', 'MG'),
(2, 'Fazenda Varginha, Km 05', '232', 'Boa esperança', 'Bambuí', 'mg'),
(3, 'Fazenda Varginha, Km 05', '12', 'Desisto', 'Bambuí', 'mg'),
(4, '', '', '', '', 'mg'),
(5, 'Fazenda Varginha, Km 05', '999', '999999999999', 'Bambuí', 'mg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE `entrada_produto` (
  `id_entrada` int(11) NOT NULL,
  `codigo_de_barras` int(13) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpj` varchar(17) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone_representante` varchar(30) NOT NULL,
  `nome_representante` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cnpj`, `id_endereco`, `telefone`, `nome`, `telefone_representante`, `nome_representante`) VALUES
('12345645', 2, '34123434', 'AmBev', '3451123441234', 'Maurício'),
('2839453245', 1, '37 98765-4321', 'Coca-cola', '379987654325', 'José da Silva'),
('78554434234234', 2, '35435635345', ' Cerveja Brahma Villiger & Companhia', '43323237798274', 'Carlos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_pessoa`, `id_endereco`, `login`, `senha`, `administrador`) VALUES
(1, 1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(17) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `id_endereco`, `cpf`, `rg`, `nome`, `data_de_nascimento`, `telefone`) VALUES
(1, 1, '111.111.111', '15.234.543', 'januario', '0000-00-00', '(37) 99954-3221'),
(2, 2, '123', '456', 'josimar', '2018-11-29', '234523453245'),
(3, 3, '203945235', '23452345', 'José da Silva', '2000-12-24', '234523453245'),
(4, 4, '234523453', '893275534', 'Ana', '1990-12-01', '092837405983455'),
(5, 5, '34234234535', '23452345', 'Antônio', '2018-12-22', '9999999999999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_de_barras` int(13) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco_de_venda` decimal(10,2) NOT NULL,
  `preco_de_compra` decimal(10,2) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `referenci_comercial`
--

CREATE TABLE `referenci_comercial` (
  `id_referencia_comercia` int(11) NOT NULL,
  `referencia_1` varchar(100) NOT NULL,
  `referencia_2` varchar(100) NOT NULL,
  `referencia_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `referenci_comercial`
--

INSERT INTO `referenci_comercial` (`id_referencia_comercia`, `referencia_1`, `referencia_2`, `referencia_3`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '444444444444', '55555555555555', '6666666666666666666');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida_produto`
--

CREATE TABLE `saida_produto` (
  `id_saida` int(11) NOT NULL,
  `codigo_de_barras` int(13) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_horario` date NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_funcionario`, `id_cliente`, `data_horario`, `tipo`, `valor_total`) VALUES
(1, 1, 1, '2018-11-01', 'teste', '123.00'),
(2, 1, 1, '2018-11-01', 'teste', '123.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cliente_fk_pessoa` (`id_pessoa`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `compra_fk_fornecedor` (`cnpj`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `endereco_fk_emprestimo` (`id_endereco`),
  ADD KEY `venda_fk_emprestimo` (`id_venda`),
  ADD KEY `cliente_fk_emprestimo` (`id_cliente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `produto_fk_entrada` (`codigo_de_barras`),
  ADD KEY `compra_fk_entrada` (`id_compra`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`),
  ADD KEY `fornecedor_fk_endereco` (`id_endereco`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `funcionario_fk_pessoa` (`id_pessoa`),
  ADD KEY `funcionario_fk_endereco` (`id_endereco`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `endereco_fk_pessoa` (`id_endereco`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_de_barras`);

--
-- Indexes for table `referenci_comercial`
--
ALTER TABLE `referenci_comercial`
  ADD PRIMARY KEY (`id_referencia_comercia`);

--
-- Indexes for table `saida_produto`
--
ALTER TABLE `saida_produto`
  ADD PRIMARY KEY (`id_saida`),
  ADD KEY `produto_fk_saida` (`codigo_de_barras`),
  ADD KEY `venda_fk_saida` (`id_venda`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `venda_fk_cliente` (`id_cliente`),
  ADD KEY `venda_fk_funcionario` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referenci_comercial`
--
ALTER TABLE `referenci_comercial`
  MODIFY `id_referencia_comercia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saida_produto`
--
ALTER TABLE `saida_produto`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_fk_endereco` FOREIGN KEY (`id_cliente`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_fk_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_fk_fornecedor` FOREIGN KEY (`cnpj`) REFERENCES `fornecedor` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `cliente_fk_emprestimo` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `endereco_fk_emprestimo` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_fk_emprestimo` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `entrada_produto`
--
ALTER TABLE `entrada_produto`
  ADD CONSTRAINT `compra_fk_entrada` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produto_fk_entrada` FOREIGN KEY (`codigo_de_barras`) REFERENCES `produto` (`codigo_de_barras`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_fk_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_fk_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionario_fk_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `endereco_fk_pessoa` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `saida_produto`
--
ALTER TABLE `saida_produto`
  ADD CONSTRAINT `produto_fk_saida` FOREIGN KEY (`codigo_de_barras`) REFERENCES `produto` (`codigo_de_barras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_fk_saida` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
