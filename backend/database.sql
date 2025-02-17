CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE clients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  data_nascimento DATE NOT NULL,
  cpf VARCHAR(14) NOT NULL,
  rg VARCHAR(12) NOT NULL,
  telefone VARCHAR(20)
);

CREATE TABLE addresses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT NOT NULL,
  logradouro VARCHAR(255),
  numero VARCHAR(10),
  bairro VARCHAR(50),
  cidade VARCHAR(50),
  estado VARCHAR(2),
  cep VARCHAR(9),
  FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);
