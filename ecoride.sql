CREATE TABLE users(
   id INT AUTO_INCREMENT,
   email VARCHAR(50),
   password VARCHAR(50),
   role VARCHAR(50),
   nom VARCHAR(50),
   prenom VARCHAR(50),
   telephone VARCHAR(50),
   adresse VARCHAR(50),
   date_naissance VARCHAR(50),
   photo VARCHAR(50),
   pseudo VARCHAR(50),
   credit INT,
   actif BOOLEAN,
   PRIMARY KEY(id)
);

--
-- Déchargement des données de la table `users`
--
/*
INSERT INTO `users` (`id`, `email`, `password`, `nom`, `pseudo`, `role`) VALUES
(1, 'coco@test.com', '$2y$10$0H5ANXRIxV4n.p/zDB1QJeTtflFMbSrCyG.EMrYUCc3j6RY356uKe', 'christelle', 'coco', 'conducteur'),
(2, 'admin@coco.com', '$2y$10$RLOOYkojLTZNEGYluSZAxeaTgEylfL0JsjLUMcFA20TxJMHIXVyBy', 'admin', 'admin', 'admin');

*/

CREATE TABLE marque(
   id_marque INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(id_marque)
);
/*
INSERT INTO `marque` (`id_marque`, `libelle`) VALUES
(1,'Renault'),
(2,'Peugeot');

*/

CREATE TABLE avis(
   id_avis INT AUTO_INCREMENT,
   commentaire VARCHAR(50),
   note VARCHAR(50),
   statut VARCHAR(50),
   PRIMARY KEY(id_avis)
);

CREATE TABLE preferences(
   id_preferences INT AUTO_INCREMENT,
   PRIMARY KEY(id_preferences)
);

CREATE TABLE voiture(
   id_voiture INT AUTO_INCREMENT,
   modele VARCHAR(50),
   immatriculation VARCHAR(50),
   energie VARCHAR(255),
   couleur VARCHAR(50),
   date_immatriculation VARCHAR(50),
   id INT NOT NULL,
   id_marque INT NOT NULL,
   PRIMARY KEY(id_voiture),
   FOREIGN KEY(id) REFERENCES users(id),
   FOREIGN KEY(id_marque) REFERENCES marque(id_marque)
);

CREATE TABLE covoiturage(
   id_covoiturage INT AUTO_INCREMENT,
   date_depart DATE,
   heure_depart TIME,
   lieu_depart VARCHAR(50),
   date_arrivee DATE,
   heure_arrivee TIME,
   lieu_arrivee VARCHAR(50),
   statut VARCHAR(50),
   nbplace INT,
   prixpersonne DECIMAL(15,2),
   id_voiture INT NOT NULL,
   PRIMARY KEY(id_covoiturage),
   FOREIGN KEY(id_voiture) REFERENCES voiture(id_voiture)
);

CREATE TABLE participe(
   id_covoiturage INT,
   id INT,
   PRIMARY KEY(id_covoiturage, id),
   FOREIGN KEY(id_covoiturage) REFERENCES covoiturage(id_covoiturage),
   FOREIGN KEY(id) REFERENCES users(id)
);

CREATE TABLE depose(
   id INT,
   id_avis INT,
   PRIMARY KEY(id, id_avis),
   FOREIGN KEY(id) REFERENCES users(id),
   FOREIGN KEY(id_avis) REFERENCES avis(id_avis)
);
