-- Banco de dados usado pelo projeto (config/conexao.php espera o banco "comidas")
CREATE DATABASE IF NOT EXISTS comidas CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE comidas;

CREATE TABLE IF NOT EXISTS pratos (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    nome           VARCHAR(100) NOT NULL,
    preco          DECIMAL(10,2) NOT NULL,
    quantidade     INT NOT NULL,      
);

-- Dados de exemplo (opcional)
INSERT INTO pratos (nome, preco, quantidade) VALUES
    ('fini ursinho15g', 180, 4.8, ''),
    ('fini beijinho', 20, 4.9, ''),
    ('Caipirinha', 5, 4.5, ''),
    ('Bolinho de Bacalhau', 40, 4.6, '');
