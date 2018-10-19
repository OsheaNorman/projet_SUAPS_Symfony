<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181013160832 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aua_etudiant_unicampus DROP FOREIGN KEY aua_etudiant_unicampus_ibfk_1');
        $this->addSql('ALTER TABLE aua_personnel_unicampus DROP FOREIGN KEY aua_personnel_unicampus_ibfk_1');
        $this->addSql('CREATE TABLE carte (idcarte VARCHAR(55) NOT NULL, numEtud INT DEFAULT NULL, PRIMARY KEY(idcarte)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etud (nom VARCHAR(55) DEFAULT NULL, numEtud INT NOT NULL, PRIMARY KEY(numEtud)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testVue (nom VARCHAR(55) NOT NULL, idcarte VARCHAR(55) NOT NULL, PRIMARY KEY(nom, idcarte)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE aua_autre_unicampus');
        $this->addSql('DROP TABLE aua_etudiant');
        $this->addSql('DROP TABLE aua_etudiant_unicampus');
        $this->addSql('DROP TABLE aua_exterieur_sport');
        $this->addSql('DROP TABLE aua_liste_seance');
        $this->addSql('DROP TABLE aua_personnel');
        $this->addSql('DROP TABLE aua_personnel_unicampus');
        $this->addSql('ALTER TABLE vue_presence ADD id INT NOT NULL, CHANGE no_etudiant no_etudiant INT NOT NULL, CHANGE tempsseance temps_seance DATETIME NOT NULL, ADD PRIMARY KEY (id, nom, prenom, temps, no_etudiant, temps_seance)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aua_autre_unicampus (no_individu INT NOT NULL, no_mifare_inverse VARCHAR(30) NOT NULL COLLATE utf8_bin) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_etudiant (no_etudiant INT NOT NULL, nom_usuel VARCHAR(40) NOT NULL COLLATE utf8_bin, prenom VARCHAR(20) NOT NULL COLLATE utf8_bin, PRIMARY KEY(no_etudiant)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_etudiant_unicampus (no_individu INT NOT NULL, no_mifare_inverse VARCHAR(30) NOT NULL COLLATE utf8_bin, INDEX no_individu (no_individu)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_exterieur_sport (no_exterieur VARCHAR(20) NOT NULL COLLATE utf8_bin, nom VARCHAR(30) NOT NULL COLLATE utf8_bin, prenom VARCHAR(20) NOT NULL COLLATE utf8_bin) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_liste_seance (idSeance INT AUTO_INCREMENT NOT NULL, tempsSeance DATETIME NOT NULL, limitePersonnes INT NOT NULL, PRIMARY KEY(idSeance)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_personnel (no_individu INT NOT NULL, nom_usuel VARCHAR(40) NOT NULL COLLATE utf8_bin, prenom VARCHAR(20) NOT NULL COLLATE utf8_bin, PRIMARY KEY(no_individu)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aua_personnel_unicampus (no_individu INT NOT NULL, no_mifare_inverse VARCHAR(30) NOT NULL COLLATE utf8_bin, INDEX no_individu (no_individu)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aua_etudiant_unicampus ADD CONSTRAINT aua_etudiant_unicampus_ibfk_1 FOREIGN KEY (no_individu) REFERENCES aua_etudiant (no_etudiant)');
        $this->addSql('ALTER TABLE aua_personnel_unicampus ADD CONSTRAINT aua_personnel_unicampus_ibfk_1 FOREIGN KEY (no_individu) REFERENCES aua_personnel (no_individu)');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE etud');
        $this->addSql('DROP TABLE testVue');
        $this->addSql('ALTER TABLE vue_presence DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vue_presence DROP id, CHANGE no_etudiant no_etudiant INT DEFAULT NULL, CHANGE temps_seance tempsSeance DATETIME NOT NULL');
    }
}
