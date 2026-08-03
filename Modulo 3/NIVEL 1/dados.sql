USE livro;

-- 1. Inserir Estados
INSERT INTO estado (sigla, nome) VALUES
('MP', 'Maputo'),
('GZ', 'Gaza'),
('IN', 'Inhambane');

-- 2. Inserir Cidades
INSERT INTO cidade (nome, id_estado) VALUES
('Maputo', 1),
('Matola', 1),
('Xai-Xai', 2),
('Inhambane', 3);

-- 3. Inserir 15 Pessoas
INSERT INTO pessoa (nome, endereco, bairro, telefone, email, id_cidade) VALUES
('Pessoa 1', 'Rua da Pessoa 1', 'Centro', '841234567', 'pessoa1@email.com', 1),
('Pessoa 2', 'Rua da Pessoa 2', 'Centro', '841234568', 'pessoa2@email.com', 1),
('Pessoa 3', 'Rua da Pessoa 3', 'Polana', '841234569', 'pessoa3@email.com', 1),
('Pessoa 4', 'Rua da Pessoa 4', 'Alto Maé', '841234570', 'pessoa4@email.com', 1),
('Pessoa 5', 'Rua da Pessoa 5', 'Sommerschield', '841234571', 'pessoa5@email.com', 1),
('Pessoa 6', 'Rua da Pessoa 6', 'Matola A', '841234572', 'pessoa6@email.com', 2),
('Pessoa 7', 'Rua da Pessoa 7', 'Filipe Samuel', '841234573', 'pessoa7@email.com', 2),
('Pessoa 8', 'Rua da Pessoa 8', 'Liberdade', '841234574', 'pessoa8@email.com', 2),
('Pablo', 'Rua teste', 'Centro', '841234575', 'pablo@email.com', 1),
('Pessoa 10', 'Avenida Principal 10', 'Praia', '841234576', 'pessoa10@email.com', 3),
('Pessoa 11', 'Avenida Principal 11', 'Bairro 1', '841234577', 'pessoa11@email.com', 3),
('Pessoa 12', 'Rua Central 12', 'Balane', '841234578', 'pessoa12@email.com', 4),
('Pessoa 13', 'Rua Central 13', 'Chamanculo', '841234579', 'pessoa13@email.com', 1),
('Pessoa 14', 'Avenida das Acácias 14', 'Coop', '841234580', 'pessoa14@email.com', 1),
('Pessoa 15', 'Rua das Palmeiras 15', 'Tsalala', '841234581', 'pessoa15@email.com', 2);