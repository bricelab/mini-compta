<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200101172907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE depense_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fournisseur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recette_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, numero VARCHAR(255) NOT NULL, nom_complet VARCHAR(255) NOT NULL, adresse TEXT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE depense (id INT NOT NULL, fournisseur_id INT DEFAULT NULL, date DATE NOT NULL, reference_piece VARCHAR(255) DEFAULT NULL, nature VARCHAR(255) NOT NULL, montant_ht DOUBLE PRECISION NOT NULL, tva DOUBLE PRECISION DEFAULT NULL, montant_ttc DOUBLE PRECISION NOT NULL, moyen VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_34059757670C757F ON depense (fournisseur_id)');
        $this->addSql('CREATE TABLE fournisseur (id INT NOT NULL, numero VARCHAR(255) NOT NULL, nom_complet VARCHAR(255) NOT NULL, adresse TEXT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE recette (id INT NOT NULL, client_id INT DEFAULT NULL, date DATE NOT NULL, reference_piece VARCHAR(255) DEFAULT NULL, nature VARCHAR(255) NOT NULL, montant_ht DOUBLE PRECISION NOT NULL, tva DOUBLE PRECISION DEFAULT NULL, montant_ttc DOUBLE PRECISION NOT NULL, moyen VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_49BB639019EB6921 ON recette (client_id)');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F85E0677 ON utilisateur (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639019EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        //$this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE recette DROP CONSTRAINT FK_49BB639019EB6921');
        $this->addSql('ALTER TABLE depense DROP CONSTRAINT FK_34059757670C757F');
        $this->addSql('DROP SEQUENCE client_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE depense_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fournisseur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recette_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_id_seq CASCADE');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE utilisateur');
    }
}
