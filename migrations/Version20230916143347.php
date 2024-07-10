<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230916143347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, id_character_id INT NOT NULL, tete_id INT NOT NULL, jambes_id INT NOT NULL, main_id INT NOT NULL, corps_id INT NOT NULL, melee_id INT NOT NULL, distance_id INT NOT NULL, INDEX IDX_B8B4C6F332F7CB07 (id_character_id), INDEX IDX_B8B4C6F344D8E8B3 (tete_id), INDEX IDX_B8B4C6F32D00D7A8 (jambes_id), INDEX IDX_B8B4C6F3627EA78A (main_id), INDEX IDX_B8B4C6F3190A1B68 (corps_id), INDEX IDX_B8B4C6F34C5E254E (melee_id), INDEX IDX_B8B4C6F313192463 (distance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventory (id INT AUTO_INCREMENT NOT NULL, id_character_id INT NOT NULL, size INT NOT NULL, INDEX IDX_B12D4A3632F7CB07 (id_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, saleprice INT NOT NULL, buyprice INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_inventory (id INT AUTO_INCREMENT NOT NULL, id_item_id INT NOT NULL, id_inventory_id INT NOT NULL, INDEX IDX_BDF75CC6CCF2FB2E (id_item_id), INDEX IDX_BDF75CC62A2FD22B (id_inventory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, palier INT NOT NULL, badge VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, classe_id INT NOT NULL, lvl_id INT NOT NULL, nom VARCHAR(255) NOT NULL, hp INT NOT NULL, pm INT NOT NULL, xp INT NOT NULL, atk INT NOT NULL, def INT NOT NULL, mag INT NOT NULL, pwr INT NOT NULL, intel INT NOT NULL, agi INT NOT NULL, INDEX IDX_6AEA486D99E6F5DF (player_id), INDEX IDX_6AEA486D8F5EA509 (classe_id), INDEX IDX_6AEA486D50962F74 (lvl_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F332F7CB07 FOREIGN KEY (id_character_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F344D8E8B3 FOREIGN KEY (tete_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F32D00D7A8 FOREIGN KEY (jambes_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3627EA78A FOREIGN KEY (main_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3190A1B68 FOREIGN KEY (corps_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F34C5E254E FOREIGN KEY (melee_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F313192463 FOREIGN KEY (distance_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A3632F7CB07 FOREIGN KEY (id_character_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE item_inventory ADD CONSTRAINT FK_BDF75CC6CCF2FB2E FOREIGN KEY (id_item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_inventory ADD CONSTRAINT FK_BDF75CC62A2FD22B FOREIGN KEY (id_inventory_id) REFERENCES inventory (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D99E6F5DF FOREIGN KEY (player_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D50962F74 FOREIGN KEY (lvl_id) REFERENCES level (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F332F7CB07');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F344D8E8B3');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F32D00D7A8');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3627EA78A');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3190A1B68');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F34C5E254E');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F313192463');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A3632F7CB07');
        $this->addSql('ALTER TABLE item_inventory DROP FOREIGN KEY FK_BDF75CC6CCF2FB2E');
        $this->addSql('ALTER TABLE item_inventory DROP FOREIGN KEY FK_BDF75CC62A2FD22B');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D99E6F5DF');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D8F5EA509');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D50962F74');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE inventory');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_inventory');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
