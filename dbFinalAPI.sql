create database dbEmpresa;

use dbEmpresa;

CREATE TABLE tbProdutos (
  codigo int NOT NULL,
  descricao varchar(255) NOT NULL,
  quantidade varchar(255) NOT NULL,
  valor varchar(255) NOT NULL,
  dataEntrada date NOT NULL,
  imagem varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`, `imagem`) 
VALUES (1, 'vassoura', 580, 8.99, CURRENT_DATE, 'https://telhanorte.vteximg.com.br/arquivos/ids/306512-NaN-NaN/Vassoura-casa-e-rua-1642-Bettanin.jpg?v=636645732918670000');

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`, `imagem`) 
VALUES (2, 'enxada', 390, 24.99, CURRENT_DATE, 'https://a-static.mlcdn.com.br/618x463/enxada-estreita-max-25-litros-com-cabo/casaegaragem2/2556/d0af53bf1bacb414cadb77cdd417cad3.jpg');

INSERT INTO `tbprodutos`(`codigo`, `descricao`, `quantidade`, `valor`, `dataEntrada`, `imagem`) 
VALUES (3, 'picareta', 1024, 4.25, CURRENT_DATE, 'https://amoedo-i3.cloudhub.com.br/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/2/3/2325736.jpg');

ALTER TABLE tbProdutos
  ADD PRIMARY KEY (codigo);

ALTER TABLE tbProdutos
  MODIFY codigo int NOT NULL AUTO_INCREMENT;