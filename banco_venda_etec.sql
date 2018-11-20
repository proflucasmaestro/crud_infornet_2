create database etec_venda

CREATE TABLE `funcionario` (
	`funcionario` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(80) NOT NULL,
	`cpf` VARCHAR(11) NOT NULL,
	`email` VARCHAR(80) NOT NULL,
	`data_nascimento` DATE,
	`login` VARCHAR(10) NOT NULL,
	`senha` VARCHAR(50) NOT NULL,
	`ativo` BOOLEAN not null,
	`categoria_id` INT NOT NULL,
	PRIMARY KEY (`funcionario`)
);

CREATE TABLE `categoria` (
	`categoria` INT NOT NULL AUTO_INCREMENT,
	`nome_categoria` VARCHAR(80) NOT NULL,
	`ativo` BOOLEAN NOT NULL,
	PRIMARY KEY (`categoria`)
);

CREATE TABLE `produto` (
	`produto` INT NOT NULL AUTO_INCREMENT,
	`nome_produto` VARCHAR(80) NOT NULL,
	`referencia` VARCHAR(25) NOT NULL,
	`valor` VARCHAR(25) NOT NULL,
	`garatua` VARCHAR(2) NOT NULL,
	`ativo` BOOLEAN NOT NULL,
	PRIMARY KEY (`produto`)
);

CREATE TABLE `venda` (
	`venda` INT NOT NULL AUTO_INCREMENT,
	`data` TIMESTAMP NOT NULL ,
	`funcionario` INT NOT NULL,
	PRIMARY KEY (`venda`)
);

CREATE TABLE `venda_item` (
	`venda_item` INT NOT NULL AUTO_INCREMENT,
	`venda` INT NOT NULL,
	`produto` INT NOT NULL,
	`qtde` INT NOT NULL,
	`valor_unit` DECIMAL(9.2) NOT NULL,
	`desconto` DECIMAL(9.2) NOT NULL,
	PRIMARY KEY (`venda_item`)
);

ALTER TABLE `funcionario` ADD CONSTRAINT `funcionario_fk0` FOREIGN KEY (`categoria_id`) REFERENCES `categoria`(`categoria`);

ALTER TABLE `venda` ADD CONSTRAINT `venda_fk0` FOREIGN KEY (`funcionario`) REFERENCES `funcionario`(`funcionario`);

ALTER TABLE `venda_item` ADD CONSTRAINT `venda_item_fk0` FOREIGN KEY (`venda`) REFERENCES `venda`(`venda`);

ALTER TABLE `venda_item` ADD CONSTRAINT `venda_item_fk1` FOREIGN KEY (`produto`) REFERENCES `produto`(`produto`);



#Fazendo retore database
#mysqldump -u root -p etec_venda < banco_venda_etec.sql

 