-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 04/06/2014 às 00:49
-- Versão do servidor: 5.5.37-0ubuntu0.13.10.1
-- Versão do PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `sistac-db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL,
  `codPedido` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `arquivoURL` varchar(255) DEFAULT NULL,
  `unidadeAtividade` int(11) NOT NULL,
  `validaAtividade` varchar(1) NOT NULL,
  `codTipoAtividade` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`,`codPedido`),
  KEY `fk_atividade_tipoAtividade1_idx` (`codTipoAtividade`),
  KEY `fk_atividade_pedido1_idx` (`codPedido`),
  KEY `fk_atividade_categoria1_idx` (`codCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Pesquisa'),
(2, 'Ensino'),
(3, 'Extensão');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(3900, 'Ciência da Computação'),
(3910, 'Engenharia de Computação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursoCategoria`
--

CREATE TABLE IF NOT EXISTS `cursoCategoria` (
  `codCurso` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  `cargaHoraria` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`codCurso`,`codCategoria`),
  KEY `fk_curso_has_categoria_categoria1_idx` (`codCategoria`),
  KEY `fk_curso_has_categoria_curso1_idx` (`codCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cursoCategoria`
--

INSERT INTO `cursoCategoria` (`codCurso`, `codCategoria`, `cargaHoraria`) VALUES
(3900, 1, '100'),
(3900, 2, '100'),
(3900, 3, '100'),
(3910, 1, '100'),
(3910, 2, '100'),
(3910, 3, '100');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `semestre` varchar(1) DEFAULT NULL,
  `codUsuario` varchar(11) NOT NULL,
  `codStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_usuario1_idx` (`codUsuario`),
  KEY `codUsuario` (`codUsuario`),
  KEY `fk_status` (`codStatus`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `status`
--

INSERT INTO `status` (`id`, `nome`) VALUES
(1, 'Em espera'),
(2, 'Em análise'),
(3, 'Pronto'),
(4, 'Necessita correção');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoAtividade`
--

CREATE TABLE IF NOT EXISTS `tipoAtividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `horas` int(11) NOT NULL,
  `maxHoras` int(11) DEFAULT NULL,
  `codCategoria` int(11) NOT NULL,
  `codUnidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipoAtividade_categoria1_idx` (`codCategoria`),
  KEY `fk_tipoAtividade_unidade1_idx` (`codUnidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipoAtividade`
--

INSERT INTO `tipoAtividade` (`id`, `nome`, `horas`, `maxHoras`, `codCategoria`, `codUnidade`) VALUES
(1, 'Monitoria', 51, 102, 2, 2),
(2, 'Projetos de Ensino', 34, 102, 2, 2),
(3, 'Semanas Acadêmicas', 34, 102, 2, 2),
(4, 'Cursos e Escolas', 51, 102, 2, 2),
(5, 'Representação Estudantil', 51, 102, 2, 3),
(6, 'Certificações profissionais', 51, 102, 2, 2),
(7, 'Livre ou Opcional', 34, 102, 2, 2),
(8, 'Iniciação Científica', 51, 153, 1, 2),
(9, 'Participação em Eventos Científicos Regional', 17, 68, 1, 1),
(10, 'Participação em Eventos Científicos Nacional', 34, 68, 1, 1),
(11, 'Participação em Eventos Científicos Internacional', 34, 68, 1, 1),
(12, 'Publicação de Artigo Científico Regional', 34, 68, 1, 1),
(13, 'Publicação de Artigo Científico Nacional', 51, 102, 1, 1),
(14, 'Publicação de Artigo Científico Internacional', 68, 136, 1, 1),
(15, 'Obtenção de Prêmios e distinções', 68, 136, 1, 1),
(16, 'Bolsa de Graduação da UFPel', 51, 102, 3, 2),
(17, 'Participação em Atividades de Extensão (como organizador, colaborador, ou ministrante)', 34, 153, 3, 2),
(18, 'Projetos Voluntários', 51, 102, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoUsuario`
--

CREATE TABLE IF NOT EXISTS `tipoUsuario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipoUsuario`
--

INSERT INTO `tipoUsuario` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Gerenciador'),
(3, 'Coordenador'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `unidade`
--

INSERT INTO `unidade` (`id`, `descricao`) VALUES
(1, 'Unidade'),
(2, 'Horas'),
(3, 'Semestre');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `codCurso` int(11) NOT NULL,
  `codTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_usuario_curso_idx` (`codCurso`),
  KEY `fk_usuario_tipoUsuario1_idx` (`codTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `nome`, `email`, `senha`, `codCurso`, `codTipoUsuario`) VALUES
('01767688075', 'André Guimarães Peil', 'agpeil@inf.ufpel.edu.br', '21232f297a57a5a743894a0e4a801fc3', 3900, 4),
('11111111111', 'Gerente', 'gerente@inf.ufpel.edu.br', '21232f297a57a5a743894a0e4a801fc3', 3900, 2),
('22222222222', 'Aluno', 'aluno@inf.ufpel.edu.br', '21232f297a57a5a743894a0e4a801fc3', 3900, 4),
('33333333333', 'Coordenador', 'coordenador@inf.ufpel.edu.br', '21232f297a57a5a743894a0e4a801fc3', 3900, 3),
('44444444444', 'Admin', 'admin@inf.ufpel.edu.br', '21232f297a57a5a743894a0e4a801fc3', 3900, 1);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_pedido1` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_tipoAtividade1` FOREIGN KEY (`codTipoAtividade`) REFERENCES `tipoAtividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `cursoCategoria`
--
ALTER TABLE `cursoCategoria`
  ADD CONSTRAINT `fk_curso_has_categoria_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_has_categoria_curso1` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`codStatus`) REFERENCES `status` (`id`);

--
-- Restrições para tabelas `tipoAtividade`
--
ALTER TABLE `tipoAtividade`
  ADD CONSTRAINT `fk_tipoAtividade_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipoAtividade_unidade1` FOREIGN KEY (`codUnidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_curso` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipoUsuario1` FOREIGN KEY (`codTipoUsuario`) REFERENCES `tipoUsuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
