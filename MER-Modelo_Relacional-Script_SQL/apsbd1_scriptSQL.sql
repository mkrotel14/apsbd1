-- -----------------------------------------------------
-- Table pessoa
-- -----------------------------------------------------
DROP TABLE IF EXISTS pessoa ;

CREATE TABLE IF NOT EXISTS pessoa (
  idpessoa INT NOT NULL,
  tipopessoa VARCHAR(45) NOT NULL,
  PRIMARY KEY (idpessoa)
);

-- -----------------------------------------------------
-- Table fisica
-- -----------------------------------------------------
DROP TABLE IF EXISTS fisica ;

CREATE TABLE IF NOT EXISTS fisica (
  idfisica INT NOT NULL,
  nome VARCHAR(70) NOT NULL,
  rg VARCHAR(15) NOT NULL,
  cpf VARCHAR(15) NOT NULL,
  datanasc VARCHAR(15) NULL,
  pessoa_idpessoa INT NOT NULL,
  PRIMARY KEY (idfisica),
  FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa)
);

-- -----------------------------------------------------
-- Table estado
-- -----------------------------------------------------
DROP TABLE IF EXISTS estado ;

CREATE TABLE IF NOT EXISTS estado (
  idestado INT NOT NULL,
  uf VARCHAR(2) NOT NULL,
  nomeestado VARCHAR(45) NOT NULL,
  PRIMARY KEY (idestado)
);

-- -----------------------------------------------------
-- Table cidade
-- -----------------------------------------------------
DROP TABLE IF EXISTS cidade ;

CREATE TABLE IF NOT EXISTS cidade (
  idcidade INT NOT NULL,
  nomecidade VARCHAR(200) NOT NULL,
  estado_idestado INT NOT NULL,
  PRIMARY KEY (idcidade),
    FOREIGN KEY (estado_idestado) REFERENCES estado (idestado)
);

-- -----------------------------------------------------
-- Table endereco
-- -----------------------------------------------------
DROP TABLE IF EXISTS endereco ;

CREATE TABLE IF NOT EXISTS endereco (
  idendereco INT NOT NULL,
  logradouro VARCHAR(200) NOT NULL,
  cep VARCHAR(15) NOT NULL,
  bairro VARCHAR(45) NOT NULL,
  cidade_idcidade INT NOT NULL,
  PRIMARY KEY (idendereco),
    FOREIGN KEY (cidade_idcidade) REFERENCES cidade (idcidade)
);

-- -----------------------------------------------------
-- Table contato
-- -----------------------------------------------------
DROP TABLE IF EXISTS contato ;

CREATE TABLE IF NOT EXISTS contato (
  idcontato INT NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  PRIMARY KEY (idcontato)
);

-- -----------------------------------------------------
-- Table funcionario
-- -----------------------------------------------------
DROP TABLE IF EXISTS funcionario ;

CREATE TABLE IF NOT EXISTS funcionario (
  idfuncionario INT NOT NULL,
  funcao VARCHAR(45) NOT NULL,
  admissao VARCHAR(15) NOT NULL,
  salario FLOAT NOT NULL,
  status VARCHAR(45) NOT NULL,
  fisica_idfisica INT NOT NULL,
  PRIMARY KEY (idfuncionario),
    FOREIGN KEY (fisica_idfisica) REFERENCES fisica (idfisica)
);

-- -----------------------------------------------------
-- Table cliente
-- -----------------------------------------------------
DROP TABLE IF EXISTS cliente ;

CREATE TABLE IF NOT EXISTS cliente (
  idcliente INT NOT NULL,
  pessoa_idpessoa INT NOT NULL,
  PRIMARY KEY (idcliente),
    FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa)
);

-- -----------------------------------------------------
-- Table venda
-- -----------------------------------------------------
DROP TABLE IF EXISTS venda ;

CREATE TABLE IF NOT EXISTS venda (
  idvenda INT NOT NULL,
  valorv FLOAT NOT NULL,
  datav VARCHAR(15) NOT NULL,
  funcionario_idfuncionario INT NOT NULL,
  cliente_idcliente INT NOT NULL,
  PRIMARY KEY (idvenda),
    FOREIGN KEY (funcionario_idfuncionario) REFERENCES funcionario (idfuncionario),
    FOREIGN KEY (cliente_idcliente) REFERENCES cliente (idcliente)
);

-- -----------------------------------------------------
-- Table categoriaproduto
-- -----------------------------------------------------
DROP TABLE IF EXISTS categoriaproduto ;

CREATE TABLE IF NOT EXISTS categoriaproduto (
  idcategoriaproduto INT NOT NULL,
  nomecategoria VARCHAR(45) NOT NULL,
  descricaocategoria VARCHAR(200) NULL,
  PRIMARY KEY (idcategoriaproduto)
);

-- -----------------------------------------------------
-- Table produto
-- -----------------------------------------------------
DROP TABLE IF EXISTS produto ;

CREATE TABLE IF NOT EXISTS produto (
  idproduto INT NOT NULL,
  nomeproduto VARCHAR(100) NOT NULL,
  lote VARCHAR(20) NOT NULL,
  valorvenda FLOAT NOT NULL,
  valorcompra FLOAT NOT NULL,
  qtdestoque INT NOT NULL,
  categoriaproduto_idcategoriaproduto INT NOT NULL,
  PRIMARY KEY (idproduto),
    FOREIGN KEY (categoriaproduto_idcategoriaproduto) REFERENCES categoriaproduto (idcategoriaproduto)
);

-- -----------------------------------------------------
-- Table juridica
-- -----------------------------------------------------
DROP TABLE IF EXISTS juridica ;

CREATE TABLE IF NOT EXISTS juridica (
  idjuridica INT NOT NULL,
  cnpj VARCHAR(25) NOT NULL,
  inscrestad VARCHAR(45) NOT NULL,
  razaosocial VARCHAR(150) NOT NULL,
  nomefantasia VARCHAR(150) NOT NULL,
  pessoa_idpessoa INT NOT NULL,
  PRIMARY KEY (idjuridica),
    FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa)
);

-- -----------------------------------------------------
-- Table fornecedor
-- -----------------------------------------------------
DROP TABLE IF EXISTS fornecedor ;

CREATE TABLE IF NOT EXISTS fornecedor (
  idfornecedor INT NOT NULL,
  juridica_idjuridica INT NOT NULL,
  PRIMARY KEY (idfornecedor),
    FOREIGN KEY (juridica_idjuridica) REFERENCES juridica (idjuridica)
);

-- -----------------------------------------------------
-- Table compra
-- -----------------------------------------------------
DROP TABLE IF EXISTS compra ;

CREATE TABLE IF NOT EXISTS compra (
  idcompra INT NOT NULL,
  valorc FLOAT NOT NULL,
  datac VARCHAR(15) NOT NULL,
  funcionario_idfuncionario INT NOT NULL,
  fornecedor_idfornecedor INT NOT NULL,
  PRIMARY KEY (idcompra),
    FOREIGN KEY (funcionario_idfuncionario) REFERENCES funcionario (idfuncionario),
    FOREIGN KEY (fornecedor_idfornecedor) REFERENCES fornecedor (idfornecedor)
);

-- -----------------------------------------------------
-- Table parcelavenda
-- -----------------------------------------------------
DROP TABLE IF EXISTS parcelavenda ;

CREATE TABLE IF NOT EXISTS parcelavenda (
  idparcelavenda INT NOT NULL,
  vdatavcto VARCHAR(15) NOT NULL,
  vvalorpar FLOAT NOT NULL,
  vdatapagto VARCHAR(15) NOT NULL,
  vvalorpgo FLOAT NOT NULL,
  venda_idvenda INT NOT NULL,
  PRIMARY KEY (idparcelavenda),
    FOREIGN KEY (venda_idvenda) REFERENCES venda (idvenda)
);

-- -----------------------------------------------------
-- Table prodvendido
-- -----------------------------------------------------
DROP TABLE IF EXISTS prodvendido ;

CREATE TABLE IF NOT EXISTS prodvendido (
  venda_idvenda INT NOT NULL,
  produto_idproduto INT NOT NULL,
  valorunitariov FLOAT NOT NULL,
  qtdventida INT NOT NULL,
  PRIMARY KEY (venda_idvenda, produto_idproduto),
    FOREIGN KEY (produto_idproduto) REFERENCES produto (idproduto),
    FOREIGN KEY (venda_idvenda) REFERENCES venda (idvenda)
);

-- -----------------------------------------------------
-- Table produtocomprado
-- -----------------------------------------------------
DROP TABLE IF EXISTS produtocomprado ;

CREATE TABLE IF NOT EXISTS produtocomprado (
  compra_idcompra INT NOT NULL,
  produto_idproduto INT NOT NULL,
  valorunitarioc FLOAT NOT NULL,
  qtdcomprada INT NOT NULL,
  PRIMARY KEY (compra_idcompra, produto_idproduto),
    FOREIGN KEY (compra_idcompra) REFERENCES compra (idcompra),
    FOREIGN KEY (produto_idproduto) REFERENCES produto (idproduto)
);

-- -----------------------------------------------------
-- Table parcelacompra
-- -----------------------------------------------------
DROP TABLE IF EXISTS parcelacompra ;

CREATE TABLE IF NOT EXISTS parcelacompra (
  idparcelacompra INT NOT NULL,
  cdatavcto VARCHAR(15) NOT NULL,
  cvalorpar FLOAT NOT NULL,
  cdatapagto VARCHAR(15) NOT NULL,
  cvalorpgo FLOAT NOT NULL,
  compra_idcompra INT NOT NULL,
  PRIMARY KEY (idparcelacompra),
    FOREIGN KEY (compra_idcompra) REFERENCES compra (idcompra)
);

-- -----------------------------------------------------
-- Table contatopessoa
-- -----------------------------------------------------
DROP TABLE IF EXISTS contatopessoa ;

CREATE TABLE IF NOT EXISTS contatopessoa (
  pessoa_idpessoa INT NOT NULL,
  contato_idcontato INT NOT NULL,
  PRIMARY KEY (pessoa_idpessoa, contato_idcontato),
    FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa),
    FOREIGN KEY (contato_idcontato) REFERENCES contato (idcontato)
);

-- -----------------------------------------------------
-- Table login
-- -----------------------------------------------------
DROP TABLE IF EXISTS login ;

CREATE TABLE IF NOT EXISTS login (
  idlogin INT NOT NULL,
  login VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  funcionario_idfuncionario INT NOT NULL,
  PRIMARY KEY (idlogin),
    FOREIGN KEY (funcionario_idfuncionario) REFERENCES funcionario (idfuncionario)
);

-- -----------------------------------------------------
-- Table enderecopessoa
-- -----------------------------------------------------
DROP TABLE IF EXISTS enderecopessoa ;

CREATE TABLE IF NOT EXISTS enderecopessoa (
  endereco_idendereco INT NOT NULL,
  pessoa_idpessoa INT NOT NULL,
  numero INT NOT NULL,
  complemento VARCHAR(45) NOT NULL,
  PRIMARY KEY (endereco_idendereco, pessoa_idpessoa),
    FOREIGN KEY (endereco_idendereco) REFERENCES endereco (idendereco),
    FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa)
);


