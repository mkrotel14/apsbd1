DROP TABLE IF EXISTS contato;
DROP TABLE IF EXISTS despesas;
DROP TABLE IF EXISTS endereco_contato;
DROP TABLE IF EXISTS telefone_contato;
DROP TABLE IF EXISTS tipo_desp;
DROP TABLE IF EXISTS valor_desp;

CREATE TABLE IF NOT EXISTS `apsbd1`.`contato` (
  `id_Contato` INT NOT NULL,
  `nome_Contato` VARCHAR(45) NOT NULL,
  `sobrenome_Contato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Contato`));

CREATE TABLE IF NOT EXISTS `apsbd1`.`despesas` (
  `id_Desp` INT NOT NULL,
  `id_Contato` INT NOT NULL,
  PRIMARY KEY (`id_Desp`, `id_Contato`),
  INDEX `fk_despesas_contato1_idx` (`id_Contato` ASC),
  CONSTRAINT `fk_despesas_contato1`
    FOREIGN KEY (`id_Contato`)
    REFERENCES `apsbd1`.`contato` (`id_Contato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `apsbd1`.`endereco_contato` (
  `id_Contato` INT NOT NULL,
  `rua_Contato` VARCHAR(45) NOT NULL,
  `cep_Contato` INT NOT NULL,
  `numero_Contato` INT NOT NULL,
  `cidade_Contato` VARCHAR(45) NOT NULL,
  `estado_Contato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Contato`, `rua_Contato`, `cep_Contato`, `numero_Contato`),
  INDEX `fk_endereco_contato_contato1_idx` (`id_Contato` ASC),
  CONSTRAINT `fk_endereco_contato_contato1`
    FOREIGN KEY (`id_Contato`)
    REFERENCES `apsbd1`.`contato` (`id_Contato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `apsbd1`.`telefone_contato` (
  `id_Contato` INT NOT NULL,
  `tel_residencial` INT NULL,
  `tel_comercial` INT NULL,
  `tel_celular` INT NULL,
  PRIMARY KEY (`id_Contato`),
  CONSTRAINT `fk_telefone_contato_contato1`
    FOREIGN KEY (`id_Contato`)
    REFERENCES `apsbd1`.`contato` (`id_Contato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `apsbd1`.`tipo_desp` (
  `id_Desp` INT NOT NULL,
  `nome_tipo` INT NOT NULL,
  `descricao_tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Desp`, `nome_tipo`),
  INDEX `fk_tipo_desp_despesas1_idx` (`id_Desp` ASC),
  CONSTRAINT `fk_tipo_desp_despesas1`
    FOREIGN KEY (`id_Desp`)
    REFERENCES `apsbd1`.`despesas` (`id_Desp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `apsbd1`.`valor_desp` (
  `id_Desp` INT NOT NULL,
  `valor_Desp` INT NOT NULL,
  `data_Desp` DATE NOT NULL,
  `venc_Desp` DATE NOT NULL,
  PRIMARY KEY (`id_Desp`, `valor_Desp`),
  INDEX `fk_valor_desp_despesas_idx` (`id_Desp` ASC),
  CONSTRAINT `fk_valor_desp_despesas`
    FOREIGN KEY (`id_Desp`)
    REFERENCES `apsbd1`.`despesas` (`id_Desp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


