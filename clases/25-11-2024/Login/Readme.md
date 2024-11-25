
# Clase 25 de noviembre de 2024
## Script
Creacion de la base de datos

```sql
CREATE DATABASE login;
USE login_example;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```