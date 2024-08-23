CREATE DATABASE formulaire_db;

USE formulaire_db;

CREATE TABLE demandes_retrait (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(100) NOT NULL,
    numero_matricule VARCHAR(50) NOT NULL,
    filiere VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    quittance VARCHAR(255) NOT NULL,
    photo_identite VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    motif TEXT NOT NULL,
    date_demande DATE NOT NULL
);
