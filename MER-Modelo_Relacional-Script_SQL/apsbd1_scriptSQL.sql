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
  complemento VARCHAR(45),
  PRIMARY KEY (endereco_idendereco, pessoa_idpessoa),
    FOREIGN KEY (endereco_idendereco) REFERENCES endereco (idendereco),
    FOREIGN KEY (pessoa_idpessoa) REFERENCES pessoa (idpessoa)
);


INSERT INTO pessoa (idpessoa, tipopessoa) VALUES (0, 'fisica');
INSERT INTO pessoa (idpessoa, tipopessoa) VALUES (1, 'juridica');
INSERT INTO pessoa (idpessoa, tipopessoa) VALUES (2, 'juridica');
INSERT INTO pessoa (idpessoa, tipopessoa) VALUES (3, 'cliente');
INSERT INTO pessoa (idpessoa, tipopessoa) VALUES (4, 'fisica');

INSERT INTO fisica (idfisica, nome, rg, cpf, datanasc, pessoa_idpessoa) VALUES (0, 'Otávio Caio', '37.356.292-5', '118.807.204-85', '17/01/1995', 0);
INSERT INTO juridica (idjuridica, cnpj, inscrestad, razaosocial, nomefantasia, pessoa_idpessoa) VALUES (0, '66.974.999/0001-88', '995.857.826.630', 'Theo Publicidade e Propaganda', 'Theo Publicidade e Propaganda', 1);
INSERT INTO juridica (idjuridica, cnpj, inscrestad, razaosocial, nomefantasia, pessoa_idpessoa) VALUES (1, '29.448.726/0001-73', '037.061.095.058', 'Arthur e Isabel Lavanderia ME', 'Arthur e Isabel Lavanderia ME', 2);
INSERT INTO cliente (idcliente, pessoa_idpessoa) VALUES (0, 3);
INSERT INTO fisica (idfisica, nome, rg, cpf, datanasc, pessoa_idpessoa) VALUES (1, 'Benjamin Bernardo', '50.097.434-2', '273.045.384-90', '25/07/1989', 4);

INSERT INTO funcionario (idfuncionario, funcao, admissao, salario, status, fisica_idfisica) VALUES (0, 'vendedor', '25/07/2005', 1500.00, 'ativo', 0);
INSERT INTO funcionario (idfuncionario, funcao, admissao, salario, status, fisica_idfisica) VALUES (1, 'gerente', '15/03/2002', 4200.00, 'ativo', 4);
INSERT INTO fornecedor (idfornecedor, juridica_idjuridica) VALUES (0,1);
INSERT INTO fornecedor (idfornecedor, juridica_idjuridica) VALUES (1,2);

INSERT INTO contato (idcontato, telefone, email) VALUES (0, '(27) 2728-1294', 'otavio_caio@depotit.com.br');
INSERT INTO contato (idcontato, telefone, email) VALUES (1, '(51) 3715-1211', 'theo-publi@br.ibm.com');
INSERT INTO contato (idcontato, telefone, email) VALUES (2, '(18) 2915-9652', 'rh@arthurisabel.com.br');
INSERT INTO contato (idcontato, telefone, email) VALUES (3, '(62) 2505-0550', 'htdias@vipsaude.com.br');
INSERT INTO contato (idcontato, telefone, email) VALUES (4, '(27) 98649-7024', 'benjamin_bernardo@depotit.com.br');

INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES (0,0);
INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES (1,1);
INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES (2,2);
INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES (3,3);
INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES (4,4);

INSERT INTO login (idlogin, login, senha, funcionario_idfuncionario) VALUES (0, 'otavio', 'senha123', 0);
INSERT INTO login (idlogin, login, senha, funcionario_idfuncionario) VALUES (1, 'benjamin', 'pass321', 1);

INSERT INTO compra (idcompra, valorc, datac, funcionario_idfuncionario, fornecedor_idfornecedor) VALUES (0, 350.00, '07/09/2006', 0, 1);
INSERT INTO compra (idcompra, valorc, datac, funcionario_idfuncionario, fornecedor_idfornecedor) VALUES (1, 1500.00, '20/11/2006', 1, 1);
INSERT INTO compra (idcompra, valorc, datac, funcionario_idfuncionario, fornecedor_idfornecedor) VALUES (2, 100.00, '13/06/2006', 1, 1);
INSERT INTO compra (idcompra, valorc, datac, funcionario_idfuncionario, fornecedor_idfornecedor) VALUES (3, 299.99, '17/12/2006', 0, 0);
INSERT INTO parcelacompra (idparcelacompra, cdatavcto, cvalorpar, cdatapagto, cvalorpgo, compra_idcompra) VALUES (0, '07/12/2006', 350.00, '07/11/2006', 350.00, 0);
INSERT INTO parcelacompra (idparcelacompra, cdatavcto, cvalorpar, cdatapagto, cvalorpgo, compra_idcompra) VALUES (1, '20/12/2006', 1500.00, '20/12/2006', 1500.00, 1);
INSERT INTO parcelacompra (idparcelacompra, cdatavcto, cvalorpar, cdatapagto, cvalorpgo, compra_idcompra) VALUES (2, '13/06/2006', 100.00, '13/06/2006', 100.00, 2);
INSERT INTO parcelacompra (idparcelacompra, cdatavcto, cvalorpar, cdatapagto, cvalorpgo, compra_idcompra) VALUES (3, '17/02/2007', 299.99, '17/01/2007', 299.99, 3);

INSERT INTO produto (idproduto, nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto) VALUES (0, 'Placa de Som Avermidia', 1337, 450.50, 350.00, 1, 0);
INSERT INTO produto (idproduto, nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto) VALUES (1, 'GTX 1060 6GB', 9875, 1800.00, 1500.00, 3, 0);
INSERT INTO produto (idproduto, nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto) VALUES (2, 'Fone de Ouvido Intraauricular', 220, 150.00, 100.00, 20, 5);
INSERT INTO produto (idproduto, nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto) VALUES (3, 'Mouse Razer DeathAdder 2013', 3669, 320.00, 299.99, 6, 1);

INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (0, 'Placas', 'Placas de computador');
INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (1, 'Periféricos', 'periféricos de computador');
INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (2, 'Monitores', 'Monitores para computador');
INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (3, 'Gabinetes', 'Gabinetes para computador');
INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (4, 'Notebook', 'Produto Notebook');
INSERT INTO categoriaproduto (idcategoriaproduto, nomecategoria, descricaocategoria) VALUES (5, 'Diversos', 'Acessorios variados para informática');

INSERT INTO produtocomprado (compra_idcompra, produto_idproduto, valorunitarioc, qtdcomprada) VALUES (0, 0, 350.00, 1);
INSERT INTO produtocomprado (compra_idcompra, produto_idproduto, valorunitarioc, qtdcomprada) VALUES (1, 1, 4500.00, 3);
INSERT INTO produtocomprado (compra_idcompra, produto_idproduto, valorunitarioc, qtdcomprada) VALUES (2, 2, 1000.00, 10);
INSERT INTO produtocomprado (compra_idcompra, produto_idproduto, valorunitarioc, qtdcomprada) VALUES (3, 3, 599.98, 2);

INSERT INTO estado (idestado, uf, nomeestado) VALUES (0, 'PR', 'Paraná');
INSERT INTO estado (idestado, uf, nomeestado) VALUES (1, 'SC', 'Santa Catarina');
INSERT INTO estado (idestado, uf, nomeestado) VALUES (2, 'RS', 'Rio Grande do Sul');
INSERT INTO estado (idestado, uf, nomeestado) VALUES (3, 'SP', 'São Paulo');

INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (0, 'Campo Mourão', 0);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (1, 'Maringá', 0);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (2, 'Florianópolis', 1);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (3, 'Joinville', 1);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (4, 'Porto Alegre', 2);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (5, 'Caxias do Sul', 2);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (6, 'São Paulo', 3);
INSERT INTO cidade (idcidade, nomecidade, estado_idestado) VALUES (7, 'Campinas', 3);

INSERT INTO endereco (idendereco, logradouro, cep, bairro, cidade_idcidade) VALUES (0, 'Praça Santos Dumont', '69310-006', 'Aeroporto', 0);
INSERT INTO endereco (idendereco, logradouro, cep, bairro, cidade_idcidade) VALUES (1, 'Rua Marçal', '69010-260', 'Centro', 0);
INSERT INTO endereco (idendereco, logradouro, cep, bairro, cidade_idcidade) VALUES (2, 'Rua Ouro', '65632-245', 'Jóia', 6);
INSERT INTO endereco (idendereco, logradouro, cep, bairro, cidade_idcidade) VALUES (3, 'Rua Frei Serafim', '65604-340', 'Nova Caxias', 2);
INSERT INTO endereco (idendereco, logradouro, cep, bairro, cidade_idcidade) VALUES (4, 'Avenida da Fazenda', '69921-443', 'Montanhês', 7);

INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES (0, 0, 225, '');
INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES (1, 4, 1024, 'Apartamento 102');
INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES (2, 1, 356, 'Apartamento 505');
INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES (3, 2, 775, '');
INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES (4, 3, 1275, '');

INSERT INTO venda (idvenda, valorv, datav, funcionario_idfuncionario, cliente_idcliente) VALUES (0, 1800.00, '25/12/2006', 0, 0);
INSERT INTO parcelavenda (idparcelavenda, vdatavcto, vvalorpar, vdatapagto, vvalorpgo, venda_idvenda) VALUES (0, '25/12/2006', 1800.00, '25/12/2006', 1800.00, 0);

INSERT INTO prodvendido (venda_idvenda, produto_idproduto, valorunitariov, qtdventida) VALUES (0, 1, 1800.00, 1);