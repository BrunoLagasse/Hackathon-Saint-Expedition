DROP DATABASE IF EXISTS saintexpedition;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE saintexpedition;


USE saintexpedition;



CREATE TABLE piece(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name VARCHAR(50) NOT NULL,
  image TEXT
  );

INSERT INTO piece (name, image) VALUES 
("entree","" ),("bar","barephemere.JPG" ),("fablab","" ),("atelierrobotique",""),("atelierscientifique",""),("vacancesdigitales", ""),("expo","" ),("theatre", ""),("bar2", "");

CREATE TABLE objet(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name VARCHAR(50) NOT NULL,
  image TEXT
);

INSERT INTO objet (name, image) VALUES
("microscope",""),("kinect",""),("cartouche",""),("robot",""),("tableau",""),("homme",""),("masque",""),("coupe","");

CREATE TABLE pieceObjet(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  piece_id INT,
  objet_id INT,
    CONSTRAINT fk_pieceObjet_piece
    FOREIGN KEY (piece_id) REFERENCES piece(id),
    CONSTRAINT fk_pieceObjet_objet
    FOREIGN KEY (objet_id) REFERENCES objet(id)
);

