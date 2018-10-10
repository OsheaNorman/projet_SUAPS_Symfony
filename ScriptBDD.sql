/* recharge rapide du fichier */

 
DROP TABLE IF EXISTS aua_etudiant_unicampus; 
DROP TABLE IF EXISTS aua_personnel_unicampus; 
DROP TABLE IF EXISTS aua_autre_unicampus;
DROP TABLE IF EXISTS aua_exterieur_sport;
DROP TABLE IF EXISTS aua_presence_seance;
DROP TABLE IF EXISTS aua_etudiant; 
DROP TABLE IF EXISTS aua_personnel;



/*--------------------- declaration des tables ---------------------*/

CREATE TABLE IF NOT EXISTS aua_etudiant(
	no_etudiant integer(8),
	nom_usuel varchar(40),
	prenom varchar(20),
	PRIMARY KEY (no_etudiant)
);

CREATE TABLE IF NOT EXISTS aua_personnel(
        no_individu integer(8),
        nom_usuel varchar(40),
	prenom varchar(20),
	PRIMARY KEY (no_individu)
);

CREATE TABLE IF NOT EXISTS aua_etudiant_unicampus(
	no_individu integer(8),
	no_mifare_inverse varchar(30),
	FOREIGN KEY (no_individu) REFERENCES aua_etudiant(no_etudiant)
	
);

CREATE TABLE IF NOT EXISTS aua_personnel_unicampus(
	no_individu integer(8),
	no_mifare_inverse varchar(30),
	FOREIGN KEY (no_individu) REFERENCES aua_personnel(no_individu)
);

/*clés etrangeres non prise en compte soucis du choix entre aua_etudiant.no_etudiant ou aua_personnel.no_individu */

CREATE TABLE IF NOT EXISTS aua_autre_unicampus(
	no_individu integer(8),
	no_mifare_inverse varchar(30)
);

CREATE TABLE IF NOT EXISTS aua_exterieur_sport(
	no_exterieur varchar(20),
	nom varchar(30),
	prenom varchar(20)
);

CREATE TABLE IF NOT EXISTS aua_presence_seance(
 	id integer NOT NULL AUTO_INCREMENT,
	temps datetime,
	no_mifare_inverse varchar(30),
	typeBadge integer,
	PRIMARY KEY (id)
);
	

/*--------------------- insertions ---------------------*/

INSERT INTO aua_etudiant(no_etudiant,nom_usuel,prenom)
VALUES
 ('14003792', 'Deramaix', 'Jonathan'),
 ('15005493', 'Ndayishima', 'Divin'),
 ('16008930', 'Roger', 'Victoria');


INSERT INTO aua_personnel(no_individu,nom_usuel,prenom)
VALUES
 ('180007001', 'Barichard', 'Vincent'),
 ('180007002', 'Garcia', 'Laurent'),
 ('180007003', 'Genest', 'David');


INSERT INTO aua_etudiant_unicampus(no_individu,no_mifare_inverse)
VALUES
 ('14003792', '042d87ca253980'),
 ('15005493', '04598ec2983b80'),
 ('16008930', '046c3a4a734380');


INSERT INTO aua_personnel_unicampus(no_individu,no_mifare_inverse)
VALUES
 ('180007001', 'ABCDEF01234564'),
 ('180007002', 'ABCDEF01234565'),
 ('180007003', 'ABCDEF01234566');


/* les valeurs ne font reference a aucune table cf plus haut pas de foreign key */
INSERT INTO aua_autre_unicampus(no_individu,no_mifare_inverse)
VALUES
 ('100000000', 'ABCDEF01234567'),
 ('100000001', 'ABCDEF01234568'),
 ('100000002', 'ABCDEF01234569');


INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom)
VALUES
 ('15000922', 'Viaux', 'Kylian'),
 ('15003650', 'Arapari', 'Mateanui'),
 ('17007058', 'Marignale', 'Ian'),
 ('10001000', 'Campos Do Nascimento', 'Daniel');
	

/*--------------------- trigger ---------------------*/



	


