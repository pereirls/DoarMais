-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 17/06/2016 às 20h18min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bancodoarmais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanhasusuario`
--

CREATE TABLE IF NOT EXISTS `campanhasusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idstatuscampanha` int(11) NOT NULL,
  `idhemocentros` int(11) NOT NULL,
  `qtdsolicitada` int(11) NOT NULL,
  `qtdatual` int(11) NOT NULL,
  `finalidade` varchar(60) NOT NULL,
  `nomepessoa` varchar(60) NOT NULL,
  `nomecampanha` varchar(60) NOT NULL,
  `sangue` varchar(10) NOT NULL,
  `exclusiva` varchar(1) CHARACTER SET utf32 NOT NULL,
  `data` varchar(50) NOT NULL,
  `dataconclusao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_idx` (`idusuario`),
  KEY `statuscampanha_idx` (`idstatuscampanha`),
  KEY `hemocentros_idx` (`idhemocentros`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `campanhasusuario`
--

INSERT INTO `campanhasusuario` (`id`, `idusuario`, `idstatuscampanha`, `idhemocentros`, `qtdsolicitada`, `qtdatual`, `finalidade`, `nomepessoa`, `nomecampanha`, `sangue`, `exclusiva`, `data`, `dataconclusao`) VALUES
(1, 46, 1, 4, 5, 2, 'Sofri um acidente', 'Joao Silva', 'A+ para cirurgia.', 'A ', 'S', '2016-06-07', NULL),
(2, 47, 1, 1, 7, 3, 'cirurgia', 'Roberta Silva', 'Reposição  A-', 'A-', 'S', '2015-06-01', NULL),
(3, 49, 3, 1, 5, 0, 'Reposição de sangue', 'Douglas Bergamini', 'Reposição de Sangue', 'A-', 'S', '2016-06-01', NULL),
(4, 50, 1, 1, 9, 4, 'Sangue para reposição', 'Leonardo', 'Preciso de 9 bolsas O-', 'O-', 'S', '2016-04-07', NULL),
(5, 51, 1, 1, 12, 3, 'preciso de sangue', 'Lucas', 'Reposição de Sangue B-', 'B-', 'S', '2015-06-01', NULL),
(6, 52, 1, 1, 4, 0, 'sangue para transplante', 'Lucas Lauro', 'transplante para parente', 'B ', 'S', '2016-06-01', NULL),
(7, 53, 1, 1, 12, 4, 'reposição', 'Felipe Santos', 'sangue usado', 'AB-', 'N', '2016-04-07', NULL),
(8, 54, 1, 1, 6, 2, 'sangue para cirurgia', 'Gustavo Souza', 'Urgencia para cirurgia.', 'AB ', 'N', '2015-05-10', NULL),
(28, 50, 3, 6, 40, 0, 'Hemocentro estoque baixo', 'Hemonucleo de Sorocaba', 'Repor estoque O ', 'O ', 'S', '2016-06-17', NULL),
(29, 50, 2, 6, 10, 10, 'teste', 'Hemonucleo de Sorocaba', 'teste', 'B-', 'S', '2016-06-17', '2016-06-17'),
(30, 50, 3, 6, 40, 0, 'Hemocentro estoque baixo', 'Hemonucleo de Sorocaba', 'Repor estoque O ', 'A ', 'S', '2016-06-17', NULL),
(32, 50, 3, 6, 40, 0, 'Hemocentro Estoque Baixo', 'Hemonucleo de Sorocaba', 'Report Estoque O ', 'O ', 'S', '2016-06-17', NULL),
(33, 50, 3, 6, 40, 0, 'Hemocentro Estoque Baixo', 'Hemonucleo de Sorocaba', 'Repor Estoque O ', 'A ', 'S', '2016-06-17', NULL),
(34, 50, 3, 6, 10, 0, 'dfads', 'Hemonucleo de Sorocaba', 'dadas', 'A ', 'S', '2016-06-17', NULL),
(35, 50, 3, 6, 10, 0, 'fsdfdsf', 'Hemonucleo de Sorocaba', 'fsdf', 'A ', 'S', '2016-06-17', NULL),
(36, 50, 3, 6, 10, 0, 'fsdfs', 'Hemonucleo de Sorocaba', 'ggsgsf', 'A ', 'S', '2016-06-17', NULL),
(37, 50, 3, 6, 40, 0, 'Hemocentro Estoque Baixo', 'Hemonucleo de Sorocaba', 'Repor Estoque O ', 'O ', 'S', '2016-06-17', NULL),
(38, 48, 1, 2, 20, 1, 'Estoque baixo', 'Bom Samaritnao', 'Repor sangue A ', 'A ', 'S', '2015-09-10', NULL),
(39, 49, 1, 1, 6, 0, 'Cirurgia', 'Douglas', 'doe sangue', 'A ', 'S', '2016-05-23', NULL),
(41, 49, 3, 1, 10, 0, 'dsadsa', 'dasdasd', 'dsadsd', 'A ', 'S', '2016-06-17', NULL),
(42, 49, 2, 3, 10, 10, 'acidente', 'rogerio', 'preciso de sangue', 'B-', 'S', '2016-03-17', '2016-04-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacaopendente`
--

CREATE TABLE IF NOT EXISTS `doacaopendente` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `idusuario` int(40) NOT NULL,
  `idstatusdoacao` int(40) NOT NULL,
  `idcampanhasusuario` int(40) NOT NULL,
  `datadoacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_dp_idx` (`idusuario`),
  KEY `statusdoacao_dp_idx` (`idstatusdoacao`),
  KEY `campanhausuario_dp_idx` (`idcampanhasusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `doacaopendente`
--

INSERT INTO `doacaopendente` (`id`, `idusuario`, `idstatusdoacao`, `idcampanhasusuario`, `datadoacao`) VALUES
(6, 49, 3, 2, NULL),
(7, 49, 3, 2, NULL),
(8, 49, 2, 2, '2015-06-05'),
(9, 49, 2, 38, '2016-01-15'),
(10, 51, 2, 29, '2016-06-17'),
(11, 51, 2, 29, '2016-06-17'),
(12, 51, 2, 29, '2016-06-17'),
(13, 51, 2, 29, '2016-06-17'),
(14, 51, 2, 29, '2016-06-17'),
(15, 49, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hemocentros`
--

CREATE TABLE IF NOT EXISTS `hemocentros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `latlon` varchar(60) NOT NULL,
  `cnpj` varchar(60) NOT NULL,
  `rsocial` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `site` varchar(60) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `hemocentros`
--

INSERT INTO `hemocentros` (`id`, `nome`, `endereco`, `cidade`, `latlon`, `cnpj`, `rsocial`, `email`, `site`, `telefone`) VALUES
(1, 'Santa Casa de Limeira', 'Av. Antonio Ometto, 675', 'Limeira', '-22.579634, -47.400092', '', '', '', 'teste', 'teste'),
(2, 'Bom Samaritnao', 'R. Sao Paulo, 332', 'Artur Nogueira', '-22.576782, -47.177462', '', '', '', 'teste', 'teste'),
(3, 'Hemocentro Reg. Campinas', 'R. Carlos Chagas, 480', 'Campinas', '-22.828662, -47.063856', '', '', '', 'teste', 'teste'),
(4, 'Hospital Mun. de Americana', 'Av. da Saude, 415', 'Americana', '-22.741779, -47.308423', '', '', '', 'teste', 'teste'),
(5, 'Fundecif Fundacao para O Desenv das Ciencias Farmaceuticas', 'Av. Espanha, 1001 - Centro,Araraquara - SP,14801-130', 'Araraquara', '-21.7933437, -48.1823728', '', '', '', '', ''),
(6, 'Hemonucleo de Sorocaba', 'Av. Comendador Pereira Inacio, 564', 'Sorocaba', '-23.5109759, -47.4563831', '', '', '', '', ''),
(7, 'Centro de Saúde I de Piracicaba', ' Av. Independencia, 953', 'Piracicaba', '-22736987, -47642632', '', '', '', '', ''),
(8, 'Irmandade da Santa Casa de Misericórdia de Piracicaba', 'R. Silva Jardim, 1700', 'Piracicaba', '-22736987, -47642632', '', '', '', '', ''),
(9, 'Colsan Hemocentro Regional de São Bernardo do Campo', 'R. Pedro Jacobici, 440 - Vila Euclides,Sao Bernardo do Campo', 'São Bernardo do Campo', '-23.6988675, -46.5554827', '', '', '', '', ''),
(10, 'Hemocentro - Centro de Hematologia e Hemoterapia', 'Universidade Estadual de Campinas,R. Carlos Chagas, 480', 'Campinas', '-22.8287076,-47.0624243', '', '', '', '', ''),
(11, 'Fundação Pró-Sangue Hemocentro de São Paulo - Posto Clínicas', 'Av. Dr. Eneas de Carvalho Aguiar, 155 - Jardim America', 'São Paulo', '-23569698, -46657317', '', '', '', '', ''),
(12, 'Colsan - Hemocentro Regional de Jundiaí', 'R. XV de Novembro, 1848 - Vila Mun', 'Jundiaí', '-23183793, -46886567', '', '', '', '', ''),
(13, 'Hemocentro Faculdade de Medicina de Marília', 'R. Lourival Freire, 240', 'Marília', '-22.2249498, -49.9379599', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sangues`
--

CREATE TABLE IF NOT EXISTS `sangues` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `sangues`
--

INSERT INTO `sangues` (`id`, `descricao`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'O+'),
(4, 'O-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB-'),
(8, 'AB+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuscampanha`
--

CREATE TABLE IF NOT EXISTS `statuscampanha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `statuscampanha`
--

INSERT INTO `statuscampanha` (`id`, `descricao`) VALUES
(1, 'pendente'),
(2, 'concluida'),
(3, 'cancelada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusdoacao`
--

CREATE TABLE IF NOT EXISTS `statusdoacao` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `statusdoacao`
--

INSERT INTO `statusdoacao` (`id`, `descricao`) VALUES
(1, 'pendente'),
(2, 'doada'),
(3, 'cancelada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statususuario`
--

CREATE TABLE IF NOT EXISTS `statususuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `statususuario`
--

INSERT INTO `statususuario` (`id`, `descricao`) VALUES
(1, 'usuario'),
(2, 'hemocentro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `sangue` varchar(60) NOT NULL,
  `peso` float NOT NULL,
  `telefone` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `ultimadoacao` varchar(50) DEFAULT NULL,
  `idstatususuario` int(11) NOT NULL,
  `idhemocentros` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statususuario_u_idx` (`idstatususuario`),
  KEY `hemocentros_u_idx` (`idhemocentros`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `idade`, `sexo`, `sangue`, `peso`, `telefone`, `email`, `usuario`, `senha`, `ultimadoacao`, `idstatususuario`, `idhemocentros`) VALUES
(46, 'Joao Silva', 21, 'Masculino', 'A ', 90, '1934524029', 'joaosilva@hotmail.com', 'joaosilva', 'joaosilva123', '2014-01-01', 1, NULL),
(47, 'Roberta Silva', 40, 'Feminino', 'O ', 70, '1934521055', 'robertasilva@gmail.com', 'robertasilva', 'robertasilva123', '2016-04-25', 1, NULL),
(48, 'teste', 20, 'Masculino', 'A ', 80, '1934524029', 'douglas.t.k.d@hotmail.com', '1234567', '1234567', '', 2, 2),
(49, 'Douglas Bergamini', 23, 'Masculino', 'A-', 90, '1934524029', 'douglas@gmail.com', '12345678', '12345678', '2016-01-15', 1, NULL),
(50, 'Leonardo', 21, 'Masculino', 'O-', 86, '1934524029', 'leonardo@gmail.com', 'leonardo', '123456', '', 2, 6),
(51, 'lucas', 24, 'Masculino', 'B-', 90, '1934524300', 'lucassp@hotmail.com', 'lucas', 'lucas123', '2016-06-17', 1, NULL),
(52, 'lucaspnt', 20, 'Masculino', 'B ', 70, '19834785744', 'lucaskaynan@gmail.com', 'lucaskaynan', 'lucaskaynan123', '2016-06-16', 1, NULL),
(53, 'Felipe Santos', 25, 'Masculino', 'AB-', 90, '1934524333', 'felipesantos@gmail.com', 'felipesantos', 'felipesantos123', '2016-03-15', 1, NULL),
(54, 'Gustavo Souza', 30, 'Masculino', 'AB ', 78, '19986754673', 'gustavosouza@gmail.com', 'gustavosouza', 'gustavosouza123', '2016-01-01', 1, NULL),
(60, 'vcxvxv', 60, 'Masculino', 'O-', 60, '60', '60', '6666666', '6666666', '2016-06-17', 1, NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `campanhasusuario`
--
ALTER TABLE `campanhasusuario`
  ADD CONSTRAINT `hemocentros` FOREIGN KEY (`idhemocentros`) REFERENCES `hemocentros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `statuscampanha` FOREIGN KEY (`idstatuscampanha`) REFERENCES `statuscampanha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `doacaopendente`
--
ALTER TABLE `doacaopendente`
  ADD CONSTRAINT `campanhausuario_dp` FOREIGN KEY (`idcampanhasusuario`) REFERENCES `campanhasusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `statusdoacao_dp` FOREIGN KEY (`idstatusdoacao`) REFERENCES `statusdoacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_dp` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `hemocentros_u` FOREIGN KEY (`idhemocentros`) REFERENCES `hemocentros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `statususuario_u` FOREIGN KEY (`idstatususuario`) REFERENCES `statususuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
