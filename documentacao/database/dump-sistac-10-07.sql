-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 10/07/2014 às 05:12
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
  `descricao` varchar(255) DEFAULT NULL,
  `idCertificado` int(11) DEFAULT NULL,
  `unidadeAtividade` int(11) NOT NULL,
  `aproveitamento` int(11) NOT NULL,
  `validaAtividade` varchar(1) NOT NULL,
  `codTipoAtividade` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`,`codPedido`),
  KEY `fk_atividade_tipoAtividade1_idx` (`codTipoAtividade`),
  KEY `fk_atividade_pedido1_idx` (`codPedido`),
  KEY `fk_atividade_categoria1_idx` (`codCategoria`),
  KEY `fk_atividade_certificado1_idx` (`idCertificado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `atividade`
--

INSERT INTO `atividade` (`id`, `codPedido`, `descricao`, `idCertificado`, `unidadeAtividade`, `aproveitamento`, `validaAtividade`, `codTipoAtividade`, `codCategoria`) VALUES
(1, 10206132, 'SACOMP XV', NULL, 40, 34, '', 3, 2),
(1, 10206133, 'SACOMP XV', NULL, 40, 34, '', 3, 2),
(2, 10206132, 'SACOMP XVI', NULL, 40, 34, 'S', 3, 2),
(2, 10206133, 'SACOMP XVI', NULL, 40, 34, 'S', 3, 2),
(3, 10206132, 'SACOMP XVII', NULL, 24, 24, '', 3, 2),
(3, 10206133, 'SACOMP XVII', NULL, 24, 24, '', 3, 2),
(4, 10206132, 'SACOMP 18', NULL, 17, 0, 'N', 3, 2),
(4, 10206133, 'SACOMP 18', NULL, 17, 0, 'N', 3, 2),
(5, 10206132, 'WEIT', NULL, 40, 40, '', 4, 2),
(5, 10206133, 'WEIT', NULL, 40, 40, '', 4, 2),
(6, 10206132, 'Digital Cities', NULL, 17, 17, 'S', 9, 1),
(6, 10206133, 'Digital Cities', NULL, 17, 17, 'S', 9, 1),
(7, 10206132, '1° Concurso de Idéias Inovadoras - UFPel', NULL, 17, 17, '', 9, 1),
(7, 10206133, '1° Concurso de Idéias Inovadoras - UFPel', NULL, 17, 17, '', 9, 1),
(8, 10206132, 'PEOPLEGRID: Uma alternativa para planejamento urbano participativo - CIC UFPel 2013', NULL, 17, 17, 'S', 12, 1),
(8, 10206133, 'PEOPLEGRID: Uma alternativa para planejamento urbano participativo - CIC UFPel 2013', NULL, 17, 17, 'S', 12, 1),
(9, 10206132, 'Participação - CIC UFPel 2013', NULL, 17, 17, '', 9, 1),
(9, 10206133, 'Participação - CIC UFPel 2013', NULL, 17, 17, '', 9, 1),
(10, 10206132, 'Participação FISL 13', NULL, 34, 34, '', 11, 1),
(10, 10206133, 'Participação FISL 13', NULL, 34, 34, '', 11, 1),
(11, 10206132, 'Voluntário FISL 13', NULL, 20, 20, '', 18, 3),
(11, 10206133, 'Voluntário FISL 13', NULL, 20, 20, '', 18, 3),
(12, 10206132, 'JMMURB - PEOPLEGRID: Uma possibilidade interativa para diagnósticos espaciais urbanos', NULL, 200, 0, 'N', 7, 2),
(12, 10206133, 'JMMURB - PEOPLEGRID: Uma possibilidade interativa para diagnósticos espaciais urbanos', NULL, 200, 0, 'N', 7, 2),
(13, 10206132, 'Organização JMMURB', NULL, 200, 34, '', 17, 3),
(13, 10206133, 'Organização JMMURB', NULL, 200, 34, '', 17, 3),
(14, 10206132, 'Bolsa PROEXT - horizonte4zeros Orientado pela Prof. Ana Paula Faria [Arquitetura]', NULL, 200, 0, 'S', 16, 1),
(14, 10206133, 'Bolsa PROEXT - horizonte4zeros Orientado pela Prof. Ana Paula Faria [Arquitetura]', NULL, 200, 0, 'S', 16, 1),
(15, 10206132, 'Bolsa de Graduação no CTI - Setor de Desenvolvimento', NULL, 200, 51, '', 16, 3),
(15, 10206133, 'Bolsa de Graduação no CTI - Setor de Desenvolvimento', NULL, 200, 51, '', 16, 3),
(16, 10206132, 'Estágio Contronic Sistemas Automáticos', NULL, 200, 34, '', 7, 3),
(16, 10206133, 'Estágio Contronic Sistemas Automáticos', NULL, 200, 34, '', 7, 3),
(17, 10206132, 'Bolsa LabUrb - horizonte4zeros Orientado pelo Prof. Maurício Polidori', NULL, 200, 51, '', 16, 3),
(17, 10206133, 'Bolsa LabUrb - horizonte4zeros Orientado pelo Prof. Maurício Polidori', NULL, 200, 51, '', 16, 3);

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
-- Estrutura para tabela `certificado`
--

CREATE TABLE IF NOT EXISTS `certificado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `idAluno` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_certificado_1_idx` (`idAluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Fazendo dump de dados para tabela `pedido`
--

INSERT INTO `pedido` (`id`, `ano`, `semestre`, `codUsuario`, `codStatus`) VALUES
(10206132, '2014', '1', '22222222222', 1),
(10206133, '2014', '1', '01767688075', 3);

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
(7, 'Disciplina Livre ou Optativa', 68, 100, 2, 2),
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
  ADD CONSTRAINT `fk_atividade_certificado1` FOREIGN KEY (`idCertificado`) REFERENCES `certificado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atividade_pedido1` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_tipoAtividade1` FOREIGN KEY (`codTipoAtividade`) REFERENCES `tipoAtividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `fk_certificado_pedido1` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

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
