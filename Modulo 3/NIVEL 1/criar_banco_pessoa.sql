-- Crie o banco de dados e as tabelas necessárias para o cadastro de pessoas.

CREATE DATABASE IF NOT EXISTS livro;
USE livro;

CREATE TABLE IF NOT EXISTS estado (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sigla CHAR(2),
    nome TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS cidade (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT,
    id_estado INT,
    FOREIGN KEY (id_estado) REFERENCES estado(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS pessoa (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT,
    endereco TEXT,
    bairro TEXT,
    telefone TEXT,
    email TEXT,
    id_cidade INT,
    FOREIGN KEY (id_cidade) REFERENCES cidade(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
