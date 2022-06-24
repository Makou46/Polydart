<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613184835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, commission VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, contact_type_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, titre VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_DB021E965F63AD12 (contact_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payement_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polydart (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, siret VARCHAR(100) NOT NULL, slogan VARCHAR(255) NOT NULL, decription LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, serie_id INT DEFAULT NULL, transaction_id INT DEFAULT NULL, quantite VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix VARCHAR(10) NOT NULL, images VARCHAR(255) NOT NULL, INDEX IDX_29A5EC2712469DE2 (category_id), INDEX IDX_29A5EC27D94388BD (serie_id), INDEX IDX_29A5EC272FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, payement_type_id INT DEFAULT NULL, quantite VARCHAR(255) NOT NULL, payement_reference VARCHAR(255) NOT NULL, INDEX IDX_723705D1BEC4000E (payement_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, messages_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, addresse_rue VARCHAR(255) NOT NULL, addresse_ville VARCHAR(255) NOT NULL, addresse_codepostal VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E9A5905F5A (messages_id), INDEX IDX_1483A5E9F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E965F63AD12 FOREIGN KEY (contact_type_id) REFERENCES contact_type (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D94388BD FOREIGN KEY (serie_id) REFERENCES series (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1BEC4000E FOREIGN KEY (payement_type_id) REFERENCES payement_type (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A5905F5A FOREIGN KEY (messages_id) REFERENCES messages (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2712469DE2');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E965F63AD12');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A5905F5A');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1BEC4000E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D94388BD');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272FC0CB0F');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE contact_type');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE payement_type');
        $this->addSql('DROP TABLE polydart');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE series');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
