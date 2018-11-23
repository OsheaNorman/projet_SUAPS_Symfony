/* recharge rapide des tables pour test */
DROP TABLE IF EXISTS aua_etudiant_unicampus; 
DROP TABLE IF EXISTS aua_personnel_unicampus; 
DROP TABLE IF EXISTS aua_autre_unicampus;
DROP TABLE IF EXISTS aua_exterieur_sport;
DROP TABLE IF EXISTS aua_presence_seance;
DROP TABLE IF EXISTS aua_etudiant; 
DROP TABLE IF EXISTS aua_personnel;
DROP TABLE IF EXISTS aua_liste_seance;

/*--------------------- declaration des tables ---------------------*/

CREATE TABLE IF NOT EXISTS aua_etudiant(
	no_etudiant integer(8) NOT NULL,
	nom_usuel varchar(40) NOT NULL,
	prenom varchar(20) NOT NULL,
	photo BLOB,
	PRIMARY KEY (no_etudiant)
);


CREATE TABLE IF NOT EXISTS aua_personnel(
    no_individu integer(8) NOT NULL,
    nom_usuel varchar(40) NOT NULL,
	prenom varchar(20) NOT NULL,
	photo BLOB,
	PRIMARY KEY (no_individu)
);


CREATE TABLE IF NOT EXISTS aua_etudiant_unicampus(
	no_individu integer(8) NOT NULL,
	no_mifare_inverse varchar(30) NOT NULL,
	FOREIGN KEY (no_individu) REFERENCES aua_etudiant(no_etudiant)
	
);


CREATE TABLE IF NOT EXISTS aua_personnel_unicampus(
	no_individu integer(8) NOT NULL,
	no_mifare_inverse varchar(30) NOT NULL,
	FOREIGN KEY (no_individu) REFERENCES aua_personnel(no_individu)
);


/*clés etrangeres non prise en compte soucis du choix entre aua_etudiant.no_etudiant ou aua_personnel.no_individu */
CREATE TABLE IF NOT EXISTS aua_autre_unicampus(
	no_individu integer(8) NOT NULL,
	no_mifare_inverse varchar(30) NOT NULL,
	photo BLOB
);


CREATE TABLE IF NOT EXISTS aua_exterieur_sport(
	no_exterieur varchar(20) NOT NULL,
	nom varchar(30) NOT NULL,
	prenom varchar(20) NOT NULL,
	photo BLOB
);


CREATE TABLE IF NOT EXISTS aua_liste_seance(
 	idSeance integer NOT NULL AUTO_INCREMENT,
	tempsSeance datetime NOT NULL,
	limitePersonnes integer NOT NULL,
	PRIMARY KEY (idSeance)
);


CREATE TABLE IF NOT EXISTS aua_presence_seance(
 	idSeance integer DEFAULT 1 NOT NULL,
	no_mifare_inverse varchar(30) NOT NULL,
	temps datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
	entreesSorties varchar(30) NOT NULL,
	FOREIGN KEY (idSeance) REFERENCES aua_liste_seance(idSeance)
);

/*--------------------- insertions pour test ---------------------*/

INSERT INTO aua_etudiant(no_etudiant,nom_usuel,prenom,photo)
VALUES
 ('15000922', 'Viaux', 'Kylian','/home/etudiant/blog/img/etud.png'),
 ('14003792', 'Deramaix', 'Jonathan','/home/etudiant/blog/img/etud.png'),
 ('15005493', 'Ndayishima', 'Divin','/home/etudiant/blog/img/etud.png'),
 ('16008930', 'Roger', 'Victoria','/home/etudiant/blog/img/etud2.png'),
 ('15003650', 'Arapari', 'Mateanui','/home/etudiant/blog/img/etud.png'),
 ('17007058', 'Marignale', 'Ian','/home/etudiant/blog/img/etud.png'),
 ('15002023', 'Campos Do Nascimento', 'Daniel','/home/etudiant/blog/img/etud.png');
		


INSERT INTO aua_personnel(no_individu,nom_usuel,prenom,photo)
VALUES
 ('180007001', 'Barichard', 'Vincent','/home/etudiant/blog/img/ens.png'),
 ('180007002', 'Garcia', 'Laurent','/home/etudiant/blog/img/ens.png'),
 ('180007003', 'Genest', 'David','/home/etudiant/blog/img/ens.png');


INSERT INTO aua_etudiant_unicampus(no_individu,no_mifare_inverse)
VALUES
 ('15000922', '04391b8a813a80'),
 ('14003792', '042d87ca253980'),
 ('15005493', '04598ec2983b80'),
 ('16008930', '046c3a4a734380'),
 ('15003650', '0427858a813a80'),
 ('17007058', '0454797afe4280'),
 ('15002023', '0419282aa73a80');


INSERT INTO aua_personnel_unicampus(no_individu,no_mifare_inverse)
VALUES
 ('180007001', 'ABCDEF01234564'),
 ('180007002', 'ABCDEF01234565'),
 ('180007003', 'ABCDEF01234566');


/* les valeurs ne font reference a aucune table cf plus haut pas de foreign key */
INSERT INTO aua_autre_unicampus(no_individu,no_mifare_inverse,photo)
VALUES
 ('100000000', 'ABCDEF01234567','/home/etudiant/blog/img/autre.png'),
 ('100000001', 'ABCDEF01234568','/home/etudiant/blog/img/autre.png'),
 ('100000002', 'ABCDEF01234569','/home/etudiant/blog/img/autre.png');


INSERT INTO aua_liste_seance(idSeance,tempsSeance,limitePersonnes)
VALUES
('1','2018-10-10 00:01:30','10');


