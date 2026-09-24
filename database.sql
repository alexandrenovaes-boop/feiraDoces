-- Banco de dados usado pelo projeto (config/conexao.php espera o banco "doces")
CREATE DATABASE IF NOT EXISTS doces CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE doces;

CREATE TABLE IF NOT EXISTS doces (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    nome           VARCHAR(100) NOT NULL,
    preco          DECIMAL(10,2) NOT NULL,
    quantidade     INT NOT NULL,      
);

-- Dados de exemplo (opcional)
INSERT INTO doces (nome, preco, quantidade) VALUES 
('Fini 15g ursinho',1.25 ,12 ), 
('Fini beijinhos 15g',1.25,8), 
('Tubes morango 15g', 2.0, 12), 
('Fini dentadura 15g', 1.0, 12), 
('Fini banana 15g' , 1.0 ,11 ), 
('Paçoca' , 1.0,11 );