-- item table --
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category VARCHAR(50),
    brand VARCHAR(50),
    title VARCHAR(255),
    old INT(10),
    new INT(10),
    uses VARCHAR(100),
    location VARCHAR(100),
    whatsapp VARCHAR(255),
    facebook VARCHAR(255),
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255),
    image4 VARCHAR(255),
    upload_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- users table --
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code INT(50) NOT NULL,
    email VARCHAR(255),
    username VARCHAR(100),
    password VARCHAR(255),
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100),
    last_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    location VARCHAR(100) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    profile_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE buy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    c_number VARCHAR(20) NOT NULL,
    buy_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);