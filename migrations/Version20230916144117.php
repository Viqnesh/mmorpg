<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230916144117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ability (id INT AUTO_INCREMENT NOT NULL, coup_speciale_id INT NOT NULL, arme_speciale_id INT NOT NULL, skill_id INT NOT NULL, id_character_id INT NOT NULL, INDEX IDX_35CFEE3CBDF616C0 (coup_speciale_id), INDEX IDX_35CFEE3C7EF9E973 (arme_speciale_id), INDEX IDX_35CFEE3C5585C142 (skill_id), INDEX IDX_35CFEE3C32F7CB07 (id_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_speciale (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coup_speciale (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ability ADD CONSTRAINT FK_35CFEE3CBDF616C0 FOREIGN KEY (coup_speciale_id) REFERENCES coup_speciale (id)');
        $this->addSql('ALTER TABLE ability ADD CONSTRAINT FK_35CFEE3C7EF9E973 FOREIGN KEY (arme_speciale_id) REFERENCES arme_speciale (id)');
        $this->addSql('ALTER TABLE ability ADD CONSTRAINT FK_35CFEE3C5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE ability ADD CONSTRAINT FK_35CFEE3C32F7CB07 FOREIGN KEY (id_character_id) REFERENCES personnage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ability DROP FOREIGN KEY FK_35CFEE3CBDF616C0');
        $this->addSql('ALTER TABLE ability DROP FOREIGN KEY FK_35CFEE3C7EF9E973');
        $this->addSql('ALTER TABLE ability DROP FOREIGN KEY FK_35CFEE3C5585C142');
        $this->addSql('ALTER TABLE ability DROP FOREIGN KEY FK_35CFEE3C32F7CB07');
        $this->addSql('DROP TABLE ability');
        $this->addSql('DROP TABLE arme_speciale');
        $this->addSql('DROP TABLE coup_speciale');
        $this->addSql('DROP TABLE skill');
    }
}
