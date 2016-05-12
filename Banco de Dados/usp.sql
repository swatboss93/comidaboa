-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Maio-2016 às 08:21
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_avaliacao`
--

CREATE TABLE `tb_avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `valor_avaliacao` int(11) NOT NULL,
  `tb_receita_id_receita` int(11) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_avaliacao`
--

INSERT INTO `tb_avaliacao` (`id_avaliacao`, `valor_avaliacao`, `tb_receita_id_receita`, `tb_usuario_id_usuario`) VALUES
(58, 5, 14, 2),
(59, 4, 14, 2),
(60, 5, 14, 2),
(61, 5, 15, 2),
(62, 3, 15, 2),
(63, 5, 15, 2),
(64, 5, 15, 2),
(65, 3, 16, 2),
(66, 2, 16, 2),
(67, 5, 16, 2),
(68, 5, 17, 2),
(69, 4, 17, 2),
(70, 4, 17, 2),
(71, 4, 18, 2),
(72, 4, 18, 2),
(73, 4, 18, 2),
(74, 3, 18, 2),
(75, 5, 18, 2),
(76, 5, 18, 2),
(77, 5, 19, 2),
(78, 5, 19, 2),
(79, 5, 19, 2),
(80, 2, 19, 2),
(81, 2, 19, 2),
(82, 4, 19, 2),
(83, 4, 19, 2),
(84, 4, 19, 2),
(85, 3, 20, 2),
(86, 4, 20, 2),
(87, 4, 20, 2),
(88, 4, 20, 2),
(89, 5, 20, 2),
(90, 5, 20, 2),
(91, 2, 20, 2),
(92, 2, 20, 2),
(93, 2, 20, 2),
(94, 3, 22, 2),
(95, 3, 22, 2),
(96, 3, 22, 2),
(97, 3, 22, 2),
(98, 3, 22, 2),
(99, 4, 22, 2),
(100, 4, 22, 2),
(101, 4, 22, 2),
(102, 5, 22, 2),
(103, 5, 22, 2),
(104, 5, 25, 2),
(105, 3, 25, 2),
(106, 3, 25, 2),
(107, 4, 25, 2),
(108, 5, 25, 2),
(109, 5, 25, 2),
(110, 5, 25, 2),
(111, 4, 24, 2),
(112, 4, 24, 2),
(113, 4, 24, 2),
(114, 3, 23, 2),
(115, 4, 23, 2),
(116, 5, 23, 2),
(117, 5, 24, 2),
(118, 5, 24, 2),
(119, 5, 24, 2),
(120, 3, 24, 2),
(121, 5, 14, 2),
(122, 5, 14, 2),
(123, 5, 21, 2),
(124, 1, 21, 2),
(125, 2, 24, 6),
(126, 5, 18, 2),
(127, 5, 18, 2),
(128, 5, 18, 2),
(129, 5, 18, 2),
(130, 5, 18, 2),
(131, 5, 18, 2),
(132, 5, 18, 2),
(133, 5, 18, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `id_comentario` int(11) NOT NULL,
  `descricao_comentario` varchar(60) NOT NULL,
  `tb_receita_id_receita` int(11) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_comentario`
--

INSERT INTO `tb_comentario` (`id_comentario`, `descricao_comentario`, `tb_receita_id_receita`, `tb_usuario_id_usuario`) VALUES
(70, 'Esse mousse Ã© Ã³timo.', 15, 2),
(71, 'Maravilhoso.', 15, 2),
(72, 'NÃ£o Ã© tÃ£o boa assim!', 16, 2),
(73, 'Gostei da receita!', 16, 2),
(74, 'Ã“timo opÃ§Ã£o para sobremesa.', 17, 2),
(75, 'Ã“timo.', 18, 2),
(76, 'Gostei muito.', 20, 2),
(77, 'Recomendo.', 22, 2),
(78, 'Ã“tima receita!', 25, 2),
(79, 'Ã“timo.', 24, 2),
(80, 'Sensacional.', 14, 2),
(81, 'Muito boa receita!', 24, 6),
(82, 'Maravilhoso esta receita!', 18, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receita`
--

CREATE TABLE `tb_receita` (
  `id_receita` int(11) NOT NULL,
  `nome_receita` varchar(30) NOT NULL,
  `video_receita` varchar(45) DEFAULT NULL,
  `modopreparo_receita` varchar(300) NOT NULL,
  `data_receita` datetime NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  `ingredientes_receita` varchar(500) NOT NULL,
  `imagens_receita` varchar(3000) NOT NULL,
  `categorias_receita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_receita`
--

INSERT INTO `tb_receita` (`id_receita`, `nome_receita`, `video_receita`, `modopreparo_receita`, `data_receita`, `tb_usuario_id_usuario`, `ingredientes_receita`, `imagens_receita`, `categorias_receita`) VALUES
(14, 'Coxinha de frango', NULL, 'Primeiro cozinhe o frango e desfie. Depois disso Ã© sÃ³ bater os outros ingredientes no liquidificador e montar a coxinha.', '2016-05-11 09:18:50', 2, '4 Copo(s) (200 ml) de trigo&500 Grama(s) (g) de frango&2 Colheres de Sopa de sal&', '19_22_09_459_DSCN2691.JPG&', 'Lanches&Massas&'),
(15, 'Mousse de leite e chocolate', NULL, 'Derreta o chocolate e depois misture o creme de leite. Monte o doce de leite no copo e coloque a mistura anterior em cima. Use o granulado para decorar.', '2016-05-11 09:23:17', 2, '1 Copo(s) (300 ml) de doce de leite&200 Grama(s) (g) de chocolate&1 Copo(s) (200 ml) de creme de leite&1 Colheres de Sopa de granulado&', '55ee3a703982a3.28150851.jpg&', 'Bolos e tortas&Lanches&'),
(16, 'Rosca doce', NULL, 'Bata tudo no liquidificador e coloque para assar por 30 minutos no forno prÃ©-aquecido em 180 graus.', '2016-05-11 09:25:53', 2, '4 Copo(s) (300 ml) de trigo&4 Unidade(s) de aÃ§ucar&1 Litro(s) (L) de leite&', '3692370096_9c361fe4a4_b.jpg&6241438962_87c0988688_b.jpg&', 'Bolos e tortas&Lanches&'),
(17, 'Cookies', NULL, 'Misture tudo e leve ao forno em 200 graus por 40 minutos.', '2016-05-11 09:29:01', 2, '4 Copo(s) (300 ml) de trigo&2 Colheres de CafÃ© de fermento&4 Copo(s) (200 ml) de gotas de chocolate&', 'biscoitos_01.jpg&', 'Bolos e tortas&Lanches&'),
(18, 'Bolo de chocolate', NULL, 'Bata tudo no liquidificador e coloque para assar por 30 minutos em 220 graus.', '2016-05-11 09:34:59', 2, '4 Copo(s) (300 ml) de trigo&200 Grama(s) (g) de chocolate ao leite&4 Copo(s) (200 ml) de aÃ§ucar&', 'bolo-de-chocolate.jpg&', 'Bolos e tortas&Lanches&'),
(19, 'Carne assada italiana', NULL, 'Tempere a carne e deixe descansar por 3 horas e meia. Depois asse por 50 minutos a 200 graus.', '2016-05-11 09:38:25', 2, '1 Kilograma(s) (Kg) de peito bovino&2 Unidade(s) de cebola&1 Unidade(s) de alho&3 Colheres de Sopa de sal&', 'carnes_02.jpg&', 'Carnes&'),
(20, 'Sopa de ervilha', NULL, 'Cozinhe tudo por 30 minutos em fogo baixo.', '2016-05-11 09:41:42', 2, '1 Copo(s) (200 ml) de ervilha&500 Mililitro(s) (ml) de leite&2 Colheres de Sopa de aÃ§Ãºcar mascavo&', 'DSC02118(1).jpg&', 'Sopas&'),
(21, 'Frango assado', NULL, 'Tempere o frango e deixe descansar por 30 minutos. Depois leve ao forno com fogo mÃ©dio por 2 horas.', '2016-05-11 09:44:17', 2, '1 Unidade(s) de frango&2 Unidade(s) de cebola&2 Colheres de CafÃ© de sal&', 'pollo-a-la-brasa.jpg&', 'Aves&'),
(22, 'Suco de frutas', NULL, 'Bata tudo no liquidificador e adoce a gosto.', '2016-05-11 09:45:43', 2, '1 Unidade(s) de banana&1 Unidade(s) de maÃ§a&1 Litro(s) (L) de leite&2 Unidade(s) de kiwi&', 'images.jpg&', 'Bebidas&'),
(23, 'Suco de couve', NULL, 'FaÃ§a o suco de laranja e depois bata tudo no liquidificador.', '2016-05-11 09:50:33', 2, '2 Unidade(s) de couve&2 Unidade(s) de laranja&1 Litro(s) (L) de Ã¡gua&', 'Suco-verde-com-maracuja-apresentacao.jpg&', 'Bebidas&'),
(24, 'Enrolado de salsicha', NULL, 'Bata o trigo com o leite e depois enrole com a salsicha.', '2016-05-11 09:52:21', 2, '1 Kilograma(s) (Kg) de salsicha&1 Kilograma(s) (Kg) de trigo&4 Copo(s) (200 ml) de leite&', 'salsicha.jpg&', 'Lanches&Massas&'),
(25, 'Costela ao forno', NULL, 'Tempere a costela e leve ao forno baixo por 2 horas.', '2016-05-11 09:55:14', 2, '2 Kilograma(s) (Kg) de costela&3 Unidade(s) de cebolas&', 'FOTO-COSTELETA-DE-PORCO-ASSADA-1024x768.jpg&', 'Carnes&');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `nascimento_usuario` date NOT NULL,
  `cidade_usuario` varchar(45) NOT NULL,
  `estado_usuario` varchar(45) NOT NULL,
  `telefone_usuario` varchar(45) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `senha_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `nascimento_usuario`, `cidade_usuario`, `estado_usuario`, `telefone_usuario`, `login_usuario`, `senha_usuario`) VALUES
(1, 'Wallison', '1993-05-06', 'Poços', 'MG', '371145', 'wallison@usp.br', '12345678'),
(2, 'Eduardo', '1993-08-25', 'Paragua', 'MG', '21454545', 'eduardo@usp.br', '12345678'),
(6, 'Eduardo', '1933-08-25', 'PARAGUAÃ‡U', 'Acre', '(32) 32333-3223', 'eduardo@hot.com', 'Edu123456*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_tb_avaliacao_tb_receita1_idx` (`tb_receita_id_receita`),
  ADD KEY `fk_tb_avaliacao_tb_usuario1_idx` (`tb_usuario_id_usuario`);

--
-- Indexes for table `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_tb_comentario_tb_receita1_idx` (`tb_receita_id_receita`),
  ADD KEY `fk_tb_comentario_tb_usuario1_idx` (`tb_usuario_id_usuario`);

--
-- Indexes for table `tb_receita`
--
ALTER TABLE `tb_receita`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `fk_tb_receita_tb_usuario1_idx` (`tb_usuario_id_usuario`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario_UNIQUE` (`login_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `tb_comentario`
--
ALTER TABLE `tb_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tb_receita`
--
ALTER TABLE `tb_receita`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD CONSTRAINT `fk_tb_avaliacao_tb_receita1` FOREIGN KEY (`tb_receita_id_receita`) REFERENCES `tb_receita` (`id_receita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_avaliacao_tb_usuario1` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD CONSTRAINT `fk_tb_comentario_tb_receita1` FOREIGN KEY (`tb_receita_id_receita`) REFERENCES `tb_receita` (`id_receita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_comentario_tb_usuario1` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_receita`
--
ALTER TABLE `tb_receita`
  ADD CONSTRAINT `fk_tb_receita_tb_usuario1` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
