CREATE DATABASE sre;

USE sre;

CREATE TABLE requerimentos (
    InputRequerimento   INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    campus              VARCHAR(35) NOT NULL,
    nome                VARCHAR(100) NOT NULL,
    num_matricula       VARCHAR(30) NOT NULL UNIQUE,
    periodo             INT(2) NOT NUll,
    curso               VARCHAR(50) NOT NULL,
    turno               VARCHAR(5) NOT NULL,
    email               VARCHAR(150) NOT NULL,
    usr_cpf             VARCHAR(11) NOT NULL UNIQUE,
    usr_rg              VARCHAR(9) NOT NULL UNIQUE,
    usr_org             VARCHAR(20) NOT NULL,
    tipo_vinculo        INT(1) NOT NULL,
    contato             VARCHAR(13) NOT NULL,
    obs                 VARCHAR(250) NOT NULL
);

--Para alimentar, caso necessário:
INSERT INTO requerimentos (InputRequerimento, campus, nome, num_matricula, periodo, curso, turno, email, usr_cpf, usr_rg, usr_org, tipo_vinculo, contato, obs) VALUES
('1', 'IGARASSU', 'DOLLY', 'ONLYPIPIUS', '6', 'TECNOLOGO EM SISTEMAS PARA INTERNET', 'TARDE', 'TEKOMONAKAMA.TESTE@GMAIL.COM', '69696969690', '6969690', 'SDS', '1', '081969696969 ', 'No princípio era o Verbo, e o Verbo estava com Deus, e o Verbo era Deus.');
--Implementação adicional: id para poder usar a mesma requisição

