<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620204630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, commission VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_contact (id INT AUTO_INCREMENT NOT NULL, contact_type_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, telephone VARCHAR(10) NOT NULL, titre VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_DCEADC345F63AD12 (contact_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message_contact ADD CONSTRAINT FK_DCEADC345F63AD12 FOREIGN KEY (contact_type_id) REFERENCES contact (id)');
        $this->addSql('DROP TABLE contact_type');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A5905F5A');
        $this->addSql('DROP INDEX IDX_1483A5E9A5905F5A ON users');
        $this->addSql('ALTER TABLE users DROP messages_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_contact DROP FOREIGN KEY FK_DCEADC345F63AD12');
        $this->addSql('CREATE TABLE contact_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, commission VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE message_contact');
        $this->addSql('ALTER TABLE users ADD messages_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A5905F5A FOREIGN KEY (messages_id) REFERENCES messages (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9A5905F5A ON users (messages_id)');
    }
}
