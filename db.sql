-- Active: 1733818924772@@127.0.0.1@3306@phpmyadmin
CREATE DATABASE taskflow;

USE taskflow;

CREATE TABLE users (
    id INT  PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    assigned_to INT NOT NULL,
    type ENUM('simple', 'bug', 'feature') NOT NULL,
    status ENUM('Pending', 'In Progress', 'Completed') DEFAULT 'Pending',
    severity VARCHAR(50),
    priority VARCHAR(50),
    FOREIGN KEY (assigned_to) REFERENCES users(id)
);
