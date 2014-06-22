CREATE DATABASE  IF NOT EXISTS `sistac-db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistac-db`;
-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sistac-db
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `codPedido` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `idCertificado` int(11) DEFAULT NULL,
  `unidadeAtividade` int(11) NOT NULL,
  `validaAtividade` varchar(1) NOT NULL,
  `codTipoAtividade` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`,`codPedido`),
  KEY `fk_atividade_tipoAtividade1_idx` (`codTipoAtividade`),
  KEY `fk_atividade_pedido1_idx` (`codPedido`),
  KEY `fk_atividade_categoria1_idx` (`codCategoria`),
  KEY `fk_atividade_certificado1_idx` (`idCertificado`),
  CONSTRAINT `fk_atividade_certificado1` FOREIGN KEY (`idCertificado`) REFERENCES `certificado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_atividade_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividade_pedido1` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividade_tipoAtividade1` FOREIGN KEY (`codTipoAtividade`) REFERENCES `tipoAtividade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Pesquisa'),(2,'Ensino'),(3,'Extensão');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificado`
--

DROP TABLE IF EXISTS `certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `idAluno` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_certificado_1_idx` (`idAluno`),
  CONSTRAINT `fk_certificado_pedido1` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificado`
--

LOCK TABLES `certificado` WRITE;
/*!40000 ALTER TABLE `certificado` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (3900,'Ciência da Computação'),(3910,'Engenharia de Computação');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursoCategoria`
--

DROP TABLE IF EXISTS `cursoCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursoCategoria` (
  `codCurso` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  `cargaHoraria` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`codCurso`,`codCategoria`),
  KEY `fk_curso_has_categoria_categoria1_idx` (`codCategoria`),
  KEY `fk_curso_has_categoria_curso1_idx` (`codCurso`),
  CONSTRAINT `fk_curso_has_categoria_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_categoria_curso1` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursoCategoria`
--

LOCK TABLES `cursoCategoria` WRITE;
/*!40000 ALTER TABLE `cursoCategoria` DISABLE KEYS */;
INSERT INTO `cursoCategoria` VALUES (3900,1,'100'),(3900,2,'100'),(3900,3,'100'),(3910,1,'100'),(3910,2,'100'),(3910,3,'100');
/*!40000 ALTER TABLE `cursoCategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `semestre` varchar(1) DEFAULT NULL,
  `codUsuario` varchar(11) NOT NULL,
  `codStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_usuario1_idx` (`codUsuario`),
  KEY `codUsuario` (`codUsuario`),
  KEY `fk_status` (`codStatus`),
  KEY `id` (`id`),
  CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_status` FOREIGN KEY (`codStatus`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Em espera'),(2,'Em análise'),(3,'Pronto'),(4,'Necessita correção');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoAtividade`
--

DROP TABLE IF EXISTS `tipoAtividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoAtividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `horas` int(11) NOT NULL,
  `maxHoras` int(11) DEFAULT NULL,
  `codCategoria` int(11) NOT NULL,
  `codUnidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipoAtividade_categoria1_idx` (`codCategoria`),
  KEY `fk_tipoAtividade_unidade1_idx` (`codUnidade`),
  CONSTRAINT `fk_tipoAtividade_categoria1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipoAtividade_unidade1` FOREIGN KEY (`codUnidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoAtividade`
--

LOCK TABLES `tipoAtividade` WRITE;
/*!40000 ALTER TABLE `tipoAtividade` DISABLE KEYS */;
INSERT INTO `tipoAtividade` VALUES (1,'Monitoria',51,102,2,2),(2,'Projetos de Ensino',34,102,2,2),(3,'Semanas Acadêmicas',34,102,2,2),(4,'Cursos e Escolas',51,102,2,2),(5,'Representação Estudantil',51,102,2,3),(6,'Certificações profissionais',51,102,2,2),(7,'Livre ou Opcional',34,102,2,2),(8,'Iniciação Científica',51,153,1,2),(9,'Participação em Eventos Científicos Regional',17,68,1,1),(10,'Participação em Eventos Científicos Nacional',34,68,1,1),(11,'Participação em Eventos Científicos Internacional',34,68,1,1),(12,'Publicação de Artigo Científico Regional',34,68,1,1),(13,'Publicação de Artigo Científico Nacional',51,102,1,1),(14,'Publicação de Artigo Científico Internacional',68,136,1,1),(15,'Obtenção de Prêmios e distinções',68,136,1,1),(16,'Bolsa de Graduação da UFPel',51,102,3,2),(17,'Participação em Atividades de Extensão (como organizador, colaborador, ou ministrante)',34,153,3,2),(18,'Projetos Voluntários',51,102,3,2);
/*!40000 ALTER TABLE `tipoAtividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoUsuario`
--

DROP TABLE IF EXISTS `tipoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoUsuario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoUsuario`
--

LOCK TABLES `tipoUsuario` WRITE;
/*!40000 ALTER TABLE `tipoUsuario` DISABLE KEYS */;
INSERT INTO `tipoUsuario` VALUES (1,'Administrador'),(2,'Gerenciador'),(3,'Coordenador'),(4,'Aluno');
/*!40000 ALTER TABLE `tipoUsuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidade`
--

DROP TABLE IF EXISTS `unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidade`
--

LOCK TABLES `unidade` WRITE;
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` VALUES (1,'Unidade'),(2,'Horas'),(3,'Semestre');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `codCurso` int(11) NOT NULL,
  `codTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_usuario_curso_idx` (`codCurso`),
  KEY `fk_usuario_tipoUsuario1_idx` (`codTipoUsuario`),
  CONSTRAINT `fk_usuario_curso` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipoUsuario1` FOREIGN KEY (`codTipoUsuario`) REFERENCES `tipoUsuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('01767688075','André Guimarães Peil','agpeil@inf.ufpel.edu.br','21232f297a57a5a743894a0e4a801fc3',3900,4),('11111111111','Gerente','gerente@inf.ufpel.edu.br','21232f297a57a5a743894a0e4a801fc3',3900,2),('22222222222','Aluno','aluno@inf.ufpel.edu.br','21232f297a57a5a743894a0e4a801fc3',3900,4),('33333333333','Coordenador','coordenador@inf.ufpel.edu.br','21232f297a57a5a743894a0e4a801fc3',3900,3),('44444444444','Admin','admin@inf.ufpel.edu.br','21232f297a57a5a743894a0e4a801fc3',3900,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-22  4:02:05
