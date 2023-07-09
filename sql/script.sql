CREATE DATABASE animais;
USE animais;

CREATE TABLE animais(
    id INT PRIMARY KEY IDENTITY(1, 1),
    nome VARCHAR(50),
    tutor VARCHAR(50),
    tipo VARCHAR(20),
    data_nasc DATETIME,
    foto VARCHAR(40)
); 


INSERT INTO cad_animais(nome,tutor,tipo,data_nasc,foto)
    VALUES('Lulu','Luiz Flávio', 'Gato', '2019-04-15 15:00:00', '../arquivos/gato.jpg');

INSERT INTO cad_animais(nome,tutor,tipo,data_nasc,foto)
    VALUES('Bilu','Moisés', 'Cachorro', '2020-10-11 11:00:00', '../arquivos/cachorro.jpg');

INSERT INTO cad_animais(nome,tutor,tipo,data_nasc,foto)
    VALUES('Tufão','Anderson', 'Elefante', '2011-06-11 06:13:05', '../arquivos/elefante.jpg');

INSERT INTO cad_animais(nome,tutor,tipo,data_nasc,foto)
    VALUES('Zadraque','José', 'Cabra', '2018-07-19 18:35:00', '../arquivos/cabra.jpg');

INSERT INTO cad_animais(nome,tutor,tipo,data_nasc,foto)
    VALUES('Aurelino','Cristiane Mota', 'Porco', '2022-01-29 08:55:00', '../arquivos/porco.jpg');