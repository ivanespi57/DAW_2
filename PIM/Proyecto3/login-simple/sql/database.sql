-- database.sql
CREATE DATABASE IF NOT EXISTS login CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE login;

CREATE TABLE IF NOT EXISTS usuarios (
  user VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255) NOT NULL
);

-- usuario de ejemplo: user = test, pass = 123456 (hash de bcrypt)
INSERT INTO usuarios (user, password) VALUES (
  'test',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);
