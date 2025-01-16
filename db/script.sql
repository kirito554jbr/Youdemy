-- Active: 1736763442989@@127.0.0.1@3306@user_managment
CREATE DATABASE Youdemy;

USE Youdemy;

DROP DATABASE Youdemy;

DROP TABLE Roles;
DROP TABLE Utilisateur;

DROP TABLE Etiquette;

DROP TABLE categories;


DROP TABLE tags;





CREATE TABLE Roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(25),
    
    role_description TEXT
)ENGINE=INNODB;




CREATE TABLE Utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    email VARCHAR(50),
    password VARCHAR(50),
    phone VARCHAR(15),
    photo VARCHAR(255),
    role_id INT ,
    Foreign Key (role_id) REFERENCES Roles(id) 
)ENGINE=INNODB;



CREATE TABLE Etiquette (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20),
    description TEXT
)ENGINE=INNODB;



CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    description TEXT
)ENGINE=INNODB;

CREATE TABLE tags(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(35),
    description TEXT,
    logo VARCHAR(225)
)ENGINE=INNODB;



CREATE TABLE Cours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50),
    description TEXT,
    contenu VARCHAR(255),
    tag VARCHAR(50),
    categorie_id INT ,
    Foreign Key (categorie_id) REFERENCES categories(id),
    created_at DATE,
    enseignant_id INT,
    Foreign Key (enseignant_id) REFERENCES Utilisateur(id)
)ENGINE=INNODB;

CREATE TABLE tag_cour(
    cour_id INT,
    FOREIGN KEY (cour_id) REFERENCES Cours(id),
    tag_id INT, 
    FOREIGN KEY  (tag_id) REFERENCES tags(id),
    PRIMARY KEY (cour_id, tag_id)
)ENGINE=INNODB;

CREATE TABLE etudiant (
    user_id INT,
    Foreign Key (user_id) REFERENCES Utilisateur(id),
    cour_id INT,
    Foreign Key (cour_id) REFERENCES Cours(id),
    PRIMARY KEY (cour_id, user_id)
);
