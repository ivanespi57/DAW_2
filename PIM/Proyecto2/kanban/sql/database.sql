-- Crear base de datos y tabla tasks (migrado desde kanban_setup.sql)
CREATE DATABASE IF NOT EXISTS kanban_board;
USE kanban_board;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    status ENUM('deleted','Some day','This week','Tomorrow','Today','In progress','To do','Done') DEFAULT 'Some day',
    priority ENUM('top','high','medium','low') DEFAULT 'medium',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Datos de ejemplo
INSERT INTO tasks (description, status, priority) VALUES
('Diseñar la interfaz del tablero', 'Today', 'high'),
('Preparar la reunión semanal', 'This week', 'medium'),
('Actualizar documentación técnica', 'Some day', 'low'),
('Implementar API REST', 'In progress', 'top'),
('Revisar código del frontend', 'Tomorrow', 'high');
