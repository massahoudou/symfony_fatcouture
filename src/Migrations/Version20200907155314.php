<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907155314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande CHANGE idproduit_id idproduit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD iduser_id INT DEFAULT NULL, DROP iduser');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638786A81FB ON contact (iduser_id)');
        $this->addSql('ALTER TABLE produit CHANGE iduser_id iduser_id INT DEFAULT NULL, CHANGE solder solder TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande CHANGE idproduit_id idproduit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638786A81FB');
        $this->addSql('DROP INDEX IDX_4C62E638786A81FB ON contact');
        $this->addSql('ALTER TABLE contact ADD iduser INT DEFAULT NULL, DROP iduser_id');
        $this->addSql('ALTER TABLE produit CHANGE iduser_id iduser_id INT DEFAULT NULL, CHANGE solder solder TINYINT(1) DEFAULT \'NULL\'');
    }
}
