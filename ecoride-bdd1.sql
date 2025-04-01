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
   Id_marque INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(Id_marque)
);

CREATE TABLE avis(
   Id_avis INT AUTO_INCREMENT,
   commentaire VARCHAR(50),
   note VARCHAR(50),
   statut VARCHAR(50),
   PRIMARY KEY(Id_avis)
);

CREATE TABLE preferences(
   Id_preferences INT AUTO_INCREMENT,
   PRIMARY KEY(Id_preferences)
);

CREATE TABLE voiture(
   Id_voiture INT AUTO_INCREMENT,
   modele VARCHAR(50),
   immatriculation VARCHAR(50),
   energie VARCHAR(255),
   couleur VARCHAR(50),
   date_immatriculation VARCHAR(50),
   Id INT NOT NULL,
   Id_marque INT NOT NULL,
   PRIMARY KEY(Id_voiture),
   FOREIGN KEY(Id) REFERENCES users(Id),
   FOREIGN KEY(Id_marque) REFERENCES marque(Id_marque)
);

CREATE TABLE covoiturage(
   Id_covoiturage INT AUTO_INCREMENT,
   date_depart DATE,
   heure_depart TIME,
   lieu_depart VARCHAR(50),
   date_arrivee DATE,
   heure_arrivee TIME,
   lieu_arrivee VARCHAR(50),
   statut VARCHAR(50),
   nbplace INT,
   prixpersonne DECIMAL(15,2),
   Id_voiture INT NOT NULL,
   PRIMARY KEY(Id_covoiturage),
   FOREIGN KEY(Id_voiture) REFERENCES voiture(Id_voiture)
);

CREATE TABLE participe(
   Id_covoiturage INT,
   Id INT,
   PRIMARY KEY(Id_covoiturage, Id),
   FOREIGN KEY(Id_covoiturage) REFERENCES covoiturage(Id_covoiturage),
   FOREIGN KEY(Id) REFERENCES users(Id)
);

CREATE TABLE depose(
   Id INT,
   Id_avis INT,
   PRIMARY KEY(Id, Id_avis),
   FOREIGN KEY(Id) REFERENCES users(Id),
   FOREIGN KEY(Id_avis) REFERENCES avis(Id_avis)
);
