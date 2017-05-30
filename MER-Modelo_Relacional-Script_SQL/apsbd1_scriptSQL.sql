-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema apsbd1
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `apsbd1` ;

-- -----------------------------------------------------
-- Schema apsbd1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `apsbd1` DEFAULT CHARACTER SET utf8 ;
USE `apsbd1` ;

-- -----------------------------------------------------
-- Table `apsbd1`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`pessoa` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`pessoa` (
  `idpessoa` INT NOT NULL AUTO_INCREMENT,
  `tipopessoa` VARCHAR(45) NOT NULL,
  `classificapessoa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpessoa`),
  UNIQUE INDEX `idpessoa_UNIQUE` (`idpessoa` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`fisica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`fisica` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`fisica` (
  `idfisica` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(70) NOT NULL,
  `rg` VARCHAR(9) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `datanasc` VARCHAR(8) NULL,
  `pessoa_idpessoa` INT NOT NULL,
  PRIMARY KEY (`idfisica`),
  UNIQUE INDEX `idcadastro_UNIQUE` (`idfisica` ASC),
  CONSTRAINT `fk_cliente_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `apsbd1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`estado` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`estado` (
  `idestado` INT NOT NULL AUTO_INCREMENT,
  `uf` VARCHAR(2) NOT NULL,
  `nomeestado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestado`),
  UNIQUE INDEX `idestado_UNIQUE` (`idestado` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`cidade` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`cidade` (
  `idcidade` INT NOT NULL AUTO_INCREMENT,
  `nomecidade` VARCHAR(200) NOT NULL,
  `estado_idestado` INT NOT NULL,
  PRIMARY KEY (`idcidade`),
  UNIQUE INDEX `idcidade_UNIQUE` (`idcidade` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_idestado`)
    REFERENCES `apsbd1`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`endereco` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`endereco` (
  `idendereco` INT NOT NULL AUTO_INCREMENT,
  `logradouro` VARCHAR(200) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade_idcidade` INT NOT NULL,
  PRIMARY KEY (`idendereco`),
  UNIQUE INDEX `idendereco_UNIQUE` (`idendereco` ASC),
  CONSTRAINT `fk_endereco_cidade1`
    FOREIGN KEY (`cidade_idcidade`)
    REFERENCES `apsbd1`.`cidade` (`idcidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`contato` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`contato` (
  `idcontato` INT NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(15) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcontato`),
  UNIQUE INDEX `idcontato_UNIQUE` (`idcontato` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`funcionario` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `funcao` VARCHAR(45) NOT NULL,
  `admissao` VARCHAR(8) NOT NULL,
  `salario` FLOAT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `fisica_idfisica` INT NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  UNIQUE INDEX `idfuncionario_UNIQUE` (`idfuncionario` ASC),
  CONSTRAINT `fk_funcionario_fisica1`
    FOREIGN KEY (`fisica_idfisica`)
    REFERENCES `apsbd1`.`fisica` (`idfisica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`cliente` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `pessoa_idpessoa` INT NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE INDEX `idcliente_UNIQUE` (`idcliente` ASC),
  CONSTRAINT `fk_cliente_pessoa2`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `apsbd1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`venda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`venda` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`venda` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `valorv` FLOAT NOT NULL,
  `datav` VARCHAR(8) NOT NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  `cliente_idcliente` INT NOT NULL,
  PRIMARY KEY (`idvenda`),
  UNIQUE INDEX `idcompra_UNIQUE` (`idvenda` ASC),
  CONSTRAINT `fk_venda_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `apsbd1`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `apsbd1`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`categoriaproduto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`categoriaproduto` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`categoriaproduto` (
  `idcategoriaproduto` INT NOT NULL AUTO_INCREMENT,
  `nomecategoria` VARCHAR(45) NOT NULL,
  `descricaocategoria` VARCHAR(200) NULL,
  PRIMARY KEY (`idcategoriaproduto`),
  UNIQUE INDEX `idcategoriaproduto_UNIQUE` (`idcategoriaproduto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`produto` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nomeproduto` VARCHAR(100) NOT NULL,
  `lote` VARCHAR(20) NOT NULL,
  `valorvenda` FLOAT NOT NULL,
  `valorcompra` FLOAT NOT NULL,
  `qtdestoque` INT NOT NULL,
  `categoriaproduto_idcategoriaproduto` INT NOT NULL,
  PRIMARY KEY (`idproduto`),
  UNIQUE INDEX `idproduto_UNIQUE` (`idproduto` ASC),
  CONSTRAINT `fk_produto_categoriaproduto1`
    FOREIGN KEY (`categoriaproduto_idcategoriaproduto`)
    REFERENCES `apsbd1`.`categoriaproduto` (`idcategoriaproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`juridica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`juridica` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`juridica` (
  `idjuridica` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(14) NOT NULL,
  `inscrestad` VARCHAR(45) NOT NULL,
  `razaosocial` VARCHAR(150) NOT NULL,
  `nomefantasia` VARCHAR(150) NOT NULL,
  `pessoa_idpessoa` INT NOT NULL,
  PRIMARY KEY (`idjuridica`),
  UNIQUE INDEX `idjuridica_UNIQUE` (`idjuridica` ASC),
  CONSTRAINT `fk_juridica_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `apsbd1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`fornecedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`fornecedor` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`fornecedor` (
  `idfornecedor` INT NOT NULL AUTO_INCREMENT,
  `juridica_idjuridica` INT NOT NULL,
  PRIMARY KEY (`idfornecedor`),
  UNIQUE INDEX `idfornecedor_UNIQUE` (`idfornecedor` ASC),
  CONSTRAINT `fk_fornecedor_juridica1`
    FOREIGN KEY (`juridica_idjuridica`)
    REFERENCES `apsbd1`.`juridica` (`idjuridica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`compra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`compra` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`compra` (
  `idcompra` INT NOT NULL AUTO_INCREMENT,
  `valorc` FLOAT NOT NULL,
  `datac` VARCHAR(8) NOT NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  `fornecedor_idfornecedor` INT NOT NULL,
  PRIMARY KEY (`idcompra`),
  UNIQUE INDEX `idcompra_UNIQUE` (`idcompra` ASC),
  CONSTRAINT `fk_compra_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `apsbd1`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_fornecedor1`
    FOREIGN KEY (`fornecedor_idfornecedor`)
    REFERENCES `apsbd1`.`fornecedor` (`idfornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`parcelavenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`parcelavenda` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`parcelavenda` (
  `idparcelavenda` INT NOT NULL AUTO_INCREMENT,
  `vdatavcto` VARCHAR(8) NOT NULL,
  `vvalorpar` FLOAT NOT NULL,
  `vdatapagto` VARCHAR(8) NOT NULL,
  `vvalorpgo` FLOAT NOT NULL,
  `venda_idvenda` INT NOT NULL,
  PRIMARY KEY (`idparcelavenda`),
  UNIQUE INDEX `idparcela_UNIQUE` (`idparcelavenda` ASC),
  CONSTRAINT `fk_parcela_venda1`
    FOREIGN KEY (`venda_idvenda`)
    REFERENCES `apsbd1`.`venda` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`prodvendido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`prodvendido` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`prodvendido` (
  `venda_idvenda` INT NOT NULL,
  `produto_idproduto` INT NOT NULL,
  `valorunitariov` FLOAT NOT NULL,
  `qtdventida` INT NOT NULL,
  PRIMARY KEY (`venda_idvenda`, `produto_idproduto`),
  CONSTRAINT `fk_prodvendido_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `apsbd1`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prodvendido_venda1`
    FOREIGN KEY (`venda_idvenda`)
    REFERENCES `apsbd1`.`venda` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`produtocomprado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`produtocomprado` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`produtocomprado` (
  `compra_idcompra` INT NOT NULL,
  `produto_idproduto` INT NOT NULL,
  `valorunitarioc` FLOAT NOT NULL,
  `qtdcomprada` INT NOT NULL,
  PRIMARY KEY (`compra_idcompra`, `produto_idproduto`),
  CONSTRAINT `fk_produtocomprado_compra1`
    FOREIGN KEY (`compra_idcompra`)
    REFERENCES `apsbd1`.`compra` (`idcompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtocomprado_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `apsbd1`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`parcelacompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`parcelacompra` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`parcelacompra` (
  `idparcelacompra` INT NOT NULL AUTO_INCREMENT,
  `cdatavcto` VARCHAR(8) NOT NULL,
  `cvalorpar` FLOAT NOT NULL,
  `cdatapagto` VARCHAR(8) NOT NULL,
  `cvalorpgo` FLOAT NOT NULL,
  `compra_idcompra` INT NOT NULL,
  PRIMARY KEY (`idparcelacompra`),
  UNIQUE INDEX `idparcela_UNIQUE` (`idparcelacompra` ASC),
  CONSTRAINT `fk_parcelacompra_compra1`
    FOREIGN KEY (`compra_idcompra`)
    REFERENCES `apsbd1`.`compra` (`idcompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`contatopessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`contatopessoa` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`contatopessoa` (
  `pessoa_idpessoa` INT NOT NULL,
  `contato_idcontato` INT NOT NULL,
  PRIMARY KEY (`pessoa_idpessoa`, `contato_idcontato`),
  CONSTRAINT `fk_contatopessoa_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `apsbd1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contatopessoa_contato1`
    FOREIGN KEY (`contato_idcontato`)
    REFERENCES `apsbd1`.`contato` (`idcontato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`login` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`login` (
  `idlogin` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  PRIMARY KEY (`idlogin`),
  UNIQUE INDEX `idlogin_UNIQUE` (`idlogin` ASC),
  CONSTRAINT `fk_login_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `apsbd1`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apsbd1`.`enderecopessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apsbd1`.`enderecopessoa` ;

CREATE TABLE IF NOT EXISTS `apsbd1`.`enderecopessoa` (
  `endereco_idendereco` INT NOT NULL,
  `pessoa_idpessoa` INT NOT NULL,
  `numero` INT NOT NULL,
  `complemento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`endereco_idendereco`, `pessoa_idpessoa`),
  CONSTRAINT `fk_endereco_has_fisica_endereco1`
    FOREIGN KEY (`endereco_idendereco`)
    REFERENCES `apsbd1`.`endereco` (`idendereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enderecopessoa_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `apsbd1`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
