
<?
//criar base de dados

CREATE TABLE estado (
    id integer PRIMARY KEY NOT NULL,
    sigla char(2),
    nome text
);

CREATE TABLE cidade (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    id_estado INTEGER REFERENCES estado (id)
);

CREATE TABLE pessoa (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    endereco text,
    bairro text,
    telefone text,
    email text,
    id_cidade integer references cidade(id)
);