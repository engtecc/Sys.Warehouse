-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Dez-2018 às 01:06
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
  `id_endereco` int(11) NOT NULL,
  `divida` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_referencia_comercial`, `limite_de_credito`, `id_pessoa`, `id_endereco`, `divida`) VALUES
(1, 1, '4324069.00', 2, 2, '0.00'),
(7, 7, '99999999.99', 44, 44, '0.00'),
(8, 8, '124.00', 48, 48, '0.00'),
(9, 9, '1234.00', 61, 61, '0.00'),
(10, 12, '123123.00', 51, 1, '1234.00'),
(11, 12, '123123.00', 51, 1, '1234.00');

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

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id_compra`, `cnpj`, `tipo`, `data_horario`, `valor_total`) VALUES
(1, '12345645', 'prazo', '2018-12-10', '75.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `data_a_devolver` date DEFAULT NULL,
  `Nome` varchar(200) NOT NULL,
  `endereco` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id_emprestimo`, `data_devolucao`, `data_a_devolver`, `Nome`, `endereco`) VALUES
(112, '2018-12-09', '2018-12-15', 'júlio coutinho', 'rua herculino porto 170 rola moça'),
(113, '2018-12-09', '2018-12-09', 'júlio coutinho', '123');

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
(5, 'Fazenda Varginha, Km 05', '999', '999999999999', 'Bambuí', 'mg'),
(6, 'Herculino Porto', '170', 'Rola-moça', 'Bambuí', 'mg'),
(7, 'Fazenda Varginha, Km 05', '5', '12', 'Bambuí', 'mg'),
(8, 'Fazenda Varginha, Km 05', '5', '12', 'Bambuí', 'mg'),
(9, 'Fazenda Varginha, Km 05', '5', '12', 'Bambuí', 'mg'),
(10, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(11, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(12, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(13, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(14, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(15, 'Fazenda Varginha, Km 05', '23', 'ggggggggggggggg', 'Bambuí', 'mg'),
(16, 'Fazenda Varginha, Km 05', '232', 'Boa esperança', 'Bambuí', 'mg'),
(17, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(18, 'Fazenda Varginha, Km 05', '222', '12', 'Bambuí', 'mg'),
(19, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(20, 'Fazenda Varginha, Km 05', '23', 'Boa esperança', 'Bambuí', 'mg'),
(21, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(22, 'Fazenda Varginha, Km 05', '222', '12', 'Bambuí', 'mg'),
(23, 'Fazenda Varginha, Km 05', '23', 'Boa esperança', 'Bambuí', 'mg'),
(24, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(25, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(26, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(27, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(28, 'Fazenda Varginha, Km 05', '12', 'host', 'Bambuí', 'mg'),
(29, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(30, 'asdffkjbqwjlfe', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(31, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(32, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(33, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(34, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(35, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(36, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(37, 'Fazenda Varginha, Km 05', '5', 'ggggggggggggggg', 'Bambuí', 'mg'),
(38, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(39, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(40, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(41, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(42, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(43, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(44, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(45, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(46, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(47, 'Fazenda Varginha, Km 05', '232', 'sdsd, nas df,', 'Bambuí', 'mg'),
(48, 'Fazenda ', '12', '1234', 'Arcos', 'es'),
(49, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'rn'),
(50, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(51, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(52, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(53, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(54, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(55, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(56, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(57, 'Fazenda', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(58, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(59, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(60, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg'),
(61, 'Fazendasdf', '23', 'vassdfqwer', 'sadfasdf', 'mg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE `entrada_produto` (
  `id_entrada` int(11) NOT NULL,
  `codigo_de_barras` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`id_entrada`, `codigo_de_barras`, `quantidade`, `valor_total`, `id_compra`) VALUES
(1, '1', 5, '75.00', 1);

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
(1, 1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(51, 58, 58, 'josimar', '912ec803b2ce49e4a541068d495ab570', 0),
(52, 59, 59, 'bruno', '912ec803b2ce49e4a541068d495ab570', 0),
(53, 60, 60, 'bgbgbgbg', '912ec803b2ce49e4a541068d495ab570', 0);

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
(2, 2, '12344321', '456', 'josimar', '2018-11-29', '234523453245'),
(26, 26, '234.523.452', '234.523.452-3', 'asdf', '0000-00-00', '(44) 44444-4444'),
(27, 27, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '(44) 44444-4444'),
(28, 28, '234.523.452', '234.523.452-3', 'beira mar', '0000-00-00', '(44) 44444-4444'),
(29, 29, '234.523.452', '234.523.452-3', 'beira mar', '0000-00-00', '(37) 9876-5432'),
(31, 31, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(32, 32, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(33, 33, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(34, 34, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(35, 35, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(36, 36, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(37, 37, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 3431-4900'),
(38, 38, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '3734314900'),
(39, 39, '234.523.452', '234.523.452-3', 'beira mar', '0000-00-00', '444444444444'),
(40, 40, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '(37) 9876-5432'),
(41, 41, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '(37) 9876-5432'),
(42, 42, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '(37) 9876-5432'),
(43, 43, '234.523.452', '234.523.452-3', 'josimar josimar', '0000-00-00', '(37) 9876-5432'),
(44, 44, '234.523.452', '234.523.452-3', 'maria', '2018-12-25', '(44) 44444-4444'),
(45, 45, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 9876-5432'),
(46, 46, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 9876-5432'),
(47, 47, '234.523.452', '234.523.452-3', 'casco de cerveja 1L', '0000-00-00', '(37) 9876-5432'),
(48, 48, '123.456.789', '132.321.342-1', 'Karol', '2018-12-02', '(23) 23232-3232'),
(49, 49, '123.412.234', '123.412.234-1', 'Josimar', '0000-00-00', '(23) 41232-3412'),
(50, 50, '123.412.341', '122.341.233-4', 'Josimar', '0000-00-00', '(21) 34123-4123'),
(51, 51, '123.412.234', '122.341.233-4', 'josimar', '0000-00-00', '(23) 45234-5234'),
(52, 52, '123.412.234', '123.412.234-1', 'skol', '0000-00-00', '(42) 32345-2345'),
(53, 53, '123.412.234', '122.341.233-4', 'josimar alves', '0000-00-00', '2345234452345'),
(54, 54, '123.412.234', '122.341.233-4', 'josimar', '0000-00-00', '232342423423'),
(55, 55, '243.243.242', '122.341.233-4', 'josimar', '0000-00-00', '(23) 45234-4523'),
(56, 56, '123.412.234', '123.412.234-1', 'terra', '0000-00-00', '(23) 45234-4523'),
(57, 57, '243.214.223', '123.412.341-2', 'carlos', '0000-00-00', '(23) 45234-4523'),
(58, 58, '123.412.234', '122.341.233-4', 'caasdfassdf', '0000-00-00', '(23) 23424-2342'),
(59, 59, '123.412.234', '123.412.234-1', 'josimar alves', '0000-00-00', '(23) 23424-2342'),
(60, 60, '123.412.234', '122.341.233-4', 'josimar alves', '0000-00-00', '(23) 23424-2342'),
(61, 61, '123.412.234', '123.412.234-1', 'briza', '2018-12-04', '(23) 45234-4523');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_de_barras` varchar(30) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco_de_venda` decimal(10,2) NOT NULL,
  `preco_de_compra` decimal(10,2) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_de_barras`, `nome`, `preco_de_venda`, `preco_de_compra`, `quantidade_estoque`) VALUES
('1', 'balalaika', '15.00', '7.00', 73),
('32', 'coca cola', '134.32', '1.12', 10);

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
(4, '444444444444', '55555555555555', '6666666666666666666'),
(5, 'Escola', '', ''),
(6, '444444444444', '55555555555555', '6666666666666666666'),
(7, '444444444444', '55555555555555', '6666666666666666666'),
(8, 'asdf', 'asdf2', 'asdf3'),
(9, 'asdf', 'asdf2', 'asdf3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida_produto`
--

CREATE TABLE `saida_produto` (
  `id_saida` int(11) NOT NULL,
  `codigo_de_barras` varchar(30) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saida_produto`
--

INSERT INTO `saida_produto` (`id_saida`, `codigo_de_barras`, `id_venda`, `quantidade`, `valor_total`) VALUES
(1, '1', 3, 1, '15.00'),
(2, '1', 4, 1, '15.00'),
(3, '1', 5, 8, '120.00'),
(5, '1', 7, 10, '150.00'),
(6, '1', 8, 10, '150.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temporary`
--

CREATE TABLE `temporary` (
  `id_emprestimo` int(11) NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `data_a_devolver` date DEFAULT NULL,
  `nome_cliente` varchar(200) DEFAULT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `nome_produto` varchar(300) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `temporary`
--

INSERT INTO `temporary` (`id_emprestimo`, `data_devolucao`, `data_a_devolver`, `nome_cliente`, `endereco`, `nome_produto`, `quantidade`) VALUES
(1, '2018-12-10', '2018-12-24', 'Josimar', 'Fazenda', 'balalaika', 12);

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
(1, 1, 7, '2018-11-04', 'teste', '123.00'),
(2, 1, 7, '2018-11-12', 'teste', '123.00'),
(3, 1, 11, '2018-12-19', 'avista', '15.00'),
(4, 1, 10, '2018-12-10', 'prazo', '15.00'),
(5, 1, 1, '2018-12-11', 'avista', '120.00'),
(7, 1, 1, '2018-12-01', 'prazo', '15000.00'),
(8, 51, 1, '2017-12-10', 'avista', '1500000.00');

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
  ADD PRIMARY KEY (`id_emprestimo`);

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
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`id_emprestimo`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `referenci_comercial`
--
ALTER TABLE `referenci_comercial`
  MODIFY `id_referencia_comercia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saida_produto`
--
ALTER TABLE `saida_produto`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
