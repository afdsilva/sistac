CREATE TABLE `certificado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `idPedido` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_certificado_1_idx` (`idPedido`),
  CONSTRAINT `fk_certificado_pedido1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `sistac-db`.`atividade` 
CHANGE COLUMN `arquivoURL` `idCertificado` INT(11) NULL ,
ADD INDEX `fk_atividade_certificado1_idx` (`idCertificado` ASC);
ALTER TABLE `sistac-db`.`atividade` 
ADD CONSTRAINT `fk_atividade_certificado1`
  FOREIGN KEY (`idCertificado`)
  REFERENCES `sistac-db`.`certificado` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `sistac-db`.`certificado` 
DROP FOREIGN KEY `fk_certificado_pedido1`;
ALTER TABLE `sistac-db`.`certificado` 
CHANGE COLUMN `idPedido` `idAluno` VARCHAR(11) NOT NULL ;
ALTER TABLE `sistac-db`.`certificado` 
ADD CONSTRAINT `fk_certificado_pedido1`
  FOREIGN KEY (`idAluno`)
  REFERENCES `sistac-db`.`usuario` (`cpf`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `sistac-db`.`certificado` 
CHANGE COLUMN `path` `arquivo` VARCHAR(255) NULL DEFAULT NULL ;

