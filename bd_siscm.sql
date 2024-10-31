-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 26/06/2023 às 16:13
-- Versão do servidor: 5.7.18-0ubuntu0.16.04.1
-- Versão do PHP: 7.1.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_siscm`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `card`
--

CREATE TABLE `card` (
  `id_card` int(11) NOT NULL,
  `retirante` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Produtos de Escritório'),
(2, 'Produtos de limpeza'),
(3, 'Suplementos de Informática'),
(4, 'Produtos Alimentícios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `data` varchar(15) NOT NULL,
  `categoria` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `obs` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `data`, `categoria`, `produto`, `fornecedor`, `quantidade`, `obs`) VALUES
(4, '07/11/18', 1, 3, 1, 5, ''),
(3, '21/07/17', 1, 1, 1, 20, ''),
(5, '26/06/23', 4, 1, 1, 1, 'qq');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `cidade` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `telefone`, `estado`, `cidade`) VALUES
(1, 'DMP - Divisão de Material e Patrimônio 	', '(68) 3224-5497', 'Acre', 'Rio Branco');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `estoque_minimo` int(11) NOT NULL,
  `estoque_atual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `categoria`, `nome`, `estoque_minimo`, `estoque_atual`) VALUES
(1, 4, 'Resma Papel A4', 10, 1),
(2, 2, 'Detergente líquido ', 1, 6),
(3, 1, 'Caneta BIC Azul', 2, 2),
(5, 3, 'Sabão em Pó', 5, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `retirante`
--

CREATE TABLE `retirante` (
  `id_retirante` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `setor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `retirante`
--

INSERT INTO `retirante` (`id_retirante`, `nome`, `setor`) VALUES
(1, 'Rodrigo Henning da Cruz Rodrigues ', 2),
(2, 'Dalma da Silva Lacerda', 3),
(3, 'Carlos Augusto Oliveira de Moraes', 1),
(4, 'Erick Reimar Soares Souza', 1),
(5, 'Graça Assis Thaumaturgo', 21);

-- --------------------------------------------------------

--
-- Estrutura para tabela `saida`
--

CREATE TABLE `saida` (
  `id_saida` int(11) NOT NULL,
  `data` varchar(20) NOT NULL,
  `categoria` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `retirante` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `saida`
--

INSERT INTO `saida` (`id_saida`, `data`, `categoria`, `produto`, `retirante`, `quantidade`) VALUES
(113, '27/11/18 09:53:58', 1, 3, 5, 1),
(112, '07/11/18 09:07:21', 1, 3, 2, 1),
(111, '31/01/19 10:56:10', 2, 2, 2, 1),
(110, '09/11/18 08:11:05', 2, 2, 5, 1),
(109, '07/11/18 09:04:54', 2, 2, 2, 1),
(108, '08/08/17 10:37:22', 2, 5, 2, 1),
(107, '24/10/17 21:18:03', 1, 1, 3, 1),
(106, '22/08/17 08:51:25', 1, 1, 3, 1),
(105, '08/08/17 10:52:35', 2, 5, 3, 1),
(104, '07/08/17 11:19:55', 1, 1, 5, 1),
(103, '07/08/17 11:17:21', 1, 1, 2, 1),
(102, '07/08/17 11:17:44', 1, 1, 2, 1),
(101, '03/08/17 08:55:33', 1, 1, 2, 1),
(100, '03/08/17 08:55:52', 2, 5, 2, 1),
(99, '01/08/17 09:38:08', 2, 5, 5, 1),
(98, '24/07/17 11:07:05', 2, 2, 3, 1),
(97, '22/07/17 10:16:12', 1, 1, 2, 1),
(96, '22/07/17 10:14:24', 1, 1, 5, 1),
(95, '21/07/17 10:04:07', 1, 1, 2, 12),
(114, '27/11/18 09:54:01', 1, 3, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `sigla` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome`, `sigla`) VALUES
(1, 'Divisão de Material e Patrimônio', 'DMP'),
(2, 'Setor de Suporte a Informática', 'SINFOR'),
(3, 'Gabinete da Presidência', 'GAB'),
(4, 'Divisão de Recursos Hídricos', 'DRHI'),
(5, 'Departamento de Licenciamento Ambiental de Atividades de infraestrutura, indústria e Serviços', 'DLIS'),
(6, 'Presidência', 'PRESI'),
(7, 'Assessoria da Presidência', 'ASSE'),
(8, 'Procuradoria Jurídica', 'PROJUR'),
(9, 'Departamento de Gestão Interna', 'DGI'),
(10, 'Departamento de Licenciamento Ambiental de Propriedades Rurais', 'DLPR'),
(11, 'Departamento de Licenciamento Ambiental de Atividades Florestais', 'DLF'),
(12, 'Divisão de Atividades de Uso do Solo', 'DAUS'),
(14, 'Divisão de Manejo Florestal', 'DMF'),
(15, 'Divisão de Indústria Florestal', 'DIF'),
(16, 'Divisão de Infraestrutura', 'DINFRA'),
(17, 'Divisão de Indústria e Serviços', 'DIS'),
(18, 'SEIAM', 'SEIAM'),
(19, 'Divisão de Controle Ambiental', 'DCA'),
(20, 'Divisão de Geoprocessamento', 'DIGEO'),
(21, 'Divisão de Atendimento e Arquivo', 'DAA'),
(22, 'Divisão de Educação e Difusão Ambiental', 'DEDA'),
(23, 'Divisão de Planejamento', 'DIP'),
(24, 'Divisão de Recursos Humanos', 'DRH'),
(25, 'Setor de Protocolo', 'PROTOCOLO'),
(26, 'Setor de Transporte', 'STRANS'),
(27, 'Centro de Documentação e Arquivo', 'CEDOC'),
(28, 'Setor de Transporte Florestal', 'STF'),
(29, 'Setor de Gestão e Controle Ambiental da Fauna', 'SGCAF'),
(30, 'Recepção', 'RECEPCAO'),
(31, 'Comissão de Doação de Madeira', 'CDM'),
(32, 'Setor De Controle Interno ', 'SCI');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `apelido` varchar(60) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `ativo_S_N` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `apelido`, `nome`, `login`, `senha`, `ativo_S_N`) VALUES
(1, 'Administrador', 'Rodrigo Henning', 'admin', 'admin@2017', 'S'),
(2, 'Erick Reimar ', 'Erick Reimar Soares Souza', 'erick.souza', 'erick@2017', 'S'),
(3, 'Carlos Augusto ', 'Carlos Augusto Oliveira de Moraes', 'carlosa.augusto', 'carlosa@2017', 'S'),
(4, 'José Vilcimar', 'José Vilcimar de Andrade', 'vilcimar.andrade', 'vilcimar@2017', 'S');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id_card`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `retirante`
--
ALTER TABLE `retirante`
  ADD PRIMARY KEY (`id_retirante`);

--
-- Índices de tabela `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`id_saida`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `card`
--
ALTER TABLE `card`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `retirante`
--
ALTER TABLE `retirante`
  MODIFY `id_retirante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
