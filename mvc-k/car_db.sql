
CREATE DATABASE IF NOT EXISTS car_db;
USE car_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT 0
);

CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    specs TEXT,
    category VARCHAR(50),
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

INSERT INTO users (username, email, password, is_admin)
VALUES ('Admin', 'admin@example.com', '$2y$10$uEJ5ZcFOPwZTzq45uYjwkeECBEIMni4n5bBQaiYbnhnl63uj2fMru', 1);

INSERT INTO cars (name, price, image, specs, category, created_by)
VALUES ('Toyota Supra', 39999.99, 'uploads/supra.jpg', '2-door coupe, 335 HP, RWD', 'Sports', 1);
