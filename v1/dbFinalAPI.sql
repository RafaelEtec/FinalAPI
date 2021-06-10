create database dbEmpresa;

use dbEmpresa;

CREATE TABLE tbProdutos (
  codigo int NOT NULL,
  descricao varchar(255) NOT NULL,
  quantidade varchar(255) NOT NULL,
  valor varchar(255) NOT NULL,
  dataEntrada date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`) 
VALUES (1, 'vassoura', 580, 8.99, CURRENT_DATE);

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`) 
VALUES (2, 'enxada', 390, 24.99, CURRENT_DATE);

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`) 
VALUES (3, 'flanela', 1024, 4.25, CURRENT_DATE);

INSERT INTO `tbprodutos`(`descricao`, `quantidade`, `valor`, `dataEntrada`) 
VALUES ('Vaso Marrom', 85, 14.99, CURRENT_DATE);

ALTER TABLE tbProdutos
  ADD PRIMARY KEY (codigo);

ALTER TABLE tbProdutos
  MODIFY codigo int NOT NULL AUTO_INCREMENT;