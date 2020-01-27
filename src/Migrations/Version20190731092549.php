<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731092549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trails (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre LONGTEXT DEFAULT NULL, niveau INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, denivele INT DEFAULT NULL, altitude_de_depart INT DEFAULT NULL, altitude_d_arrivee INT DEFAULT NULL, temps_a_la_montee INT DEFAULT NULL, temps_a_la_descente INT DEFAULT NULL, temps_total INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, date DATE DEFAULT NULL, INDEX IDX_66BB393FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trails_user (id INT AUTO_INCREMENT NOT NULL, trails_id INT DEFAULT NULL, user_id INT DEFAULT NULL, favori TINYINT(1) DEFAULT NULL, note INT DEFAULT NULL, INDEX IDX_8448E3FE1B418045 (trails_id), INDEX IDX_8448E3FEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_album (id INT AUTO_INCREMENT NOT NULL, trails_id INT DEFAULT NULL, album VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_83C969F41B418045 (trails_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trails_user ADD CONSTRAINT FK_8448E3FE1B418045 FOREIGN KEY (trails_id) REFERENCES trails (id)');
        $this->addSql('ALTER TABLE photo_album ADD CONSTRAINT FK_83C969F41B418045 FOREIGN KEY (trails_id) REFERENCES trails (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE trails_user DROP FOREIGN KEY FK_8448E3FE1B418045');
        $this->addSql('ALTER TABLE photo_album DROP FOREIGN KEY FK_83C969F41B418045');
        $this->addSql('DROP TABLE trails');
        $this->addSql('DROP TABLE trails_user');
        $this->addSql('DROP TABLE photo_album');
    }
}
