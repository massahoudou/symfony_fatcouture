<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907154839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande ADD idproduit_id INT DEFAULT NULL, DROP titreproduit, DROP idproduit');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC29D63C1 FOREIGN KEY (idproduit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC29D63C1 ON commande (idproduit_id)');
        $this->addSql('ALTER TABLE contact CHANGE iduser iduser INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE iduser_id iduser_id INT DEFAULT NULL, CHANGE solder solder TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC29D63C1');
        $this->addSql('DROP INDEX IDX_6EEAA67DC29D63C1 ON commande');
        $this->addSql('ALTER TABLE commande ADD titreproduit VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD idproduit INT DEFAULT NULL, DROP idproduit_id');
        $this->addSql('ALTER TABLE contact CHANGE iduser iduser INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE iduser_id iduser_id INT DEFAULT NULL, CHANGE solder solder TINYINT(1) DEFAULT \'NULL\'');
    }
}
