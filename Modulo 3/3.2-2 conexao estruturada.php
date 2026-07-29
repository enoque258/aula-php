<?
//DIA 29/07/2026
//OBJETIVO: ver deversas formas/maneiras de acesso a basse de dados

//conexao com mysqli connect e o conn
$conn = new mysqli_connect ('localhost', 'meu_usuario', 'minha_senha', 'meu_banco');

pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (1, 'Fulano de Tal')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (2, 'Joao')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (3, 'pedro')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (4, 'Maria')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (5, 'joao')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (6, 'Maria joa')");
pg_query($conn, "INSERT INTO famosos famosos(codigo, nome) VALUES (7, 'jessica')");

//fechar a conexao 
mysqli_close($conn);

