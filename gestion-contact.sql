CREATE DATABASE IF NOT EXISTS `Gestion des contacts`;

USE `Gestion des contacts`;

CREATE TABLE `Contact` (
	`ID_Contact` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(40) NOT NULL,
	`prenom` varchar(40) NOT NULL,
	`email` varchar(70) NOT NULL,
	`imageProfil` varchar(70) NOT NULL,
	PRIMARY KEY (`ID_Contact`)
);

INSERT INTO `contact` (`ID_Contact`, `nom`, `prenom`, `email`, `imageProfil`) VALUES (NULL, 'Alpha', 'Bebou', 'trummureiffofu-8180@yopmail.com', 'image\\images (1).jpg'), (NULL, 'Beta', 'Toto', 'waxoujoiveloi-4207@yopmail.com', 'image\\images.jpg');

INSERT INTO `contact` (`ID_Contact`, `nom`, `prenom`, `email`, `imageProfil`) VALUES (NULL, 'Charlie', 'Chris', 'notauvizetri-7082@yopmail.com', 'image\\téléchargement (2).jpg'), (NULL, 'Delta', 'Mia', 'rauxebuddeha-5725@yopmail.com', 'image\\téléchargement.png');

