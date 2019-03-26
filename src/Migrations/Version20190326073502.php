<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326073502 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail DROP FOREIGN KEY FK_DD84E80A69790D26');
        $this->addSql('DROP INDEX IDX_DD84E80A69790D26 ON poste_de_travail');
        $this->addSql('ALTER TABLE poste_de_travail CHANGE postesdetravail_id delegation_id INT NOT NULL');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80A56CBBCF5 FOREIGN KEY (delegation_id) REFERENCES delegation (id)');
        $this->addSql('CREATE INDEX IDX_DD84E80A56CBBCF5 ON poste_de_travail (delegation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail DROP FOREIGN KEY FK_DD84E80A56CBBCF5');
        $this->addSql('DROP INDEX IDX_DD84E80A56CBBCF5 ON poste_de_travail');
        $this->addSql('ALTER TABLE poste_de_travail CHANGE delegation_id postesdetravail_id INT NOT NULL');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80A69790D26 FOREIGN KEY (postesdetravail_id) REFERENCES delegation (id)');
        $this->addSql('CREATE INDEX IDX_DD84E80A69790D26 ON poste_de_travail (postesdetravail_id)');
    }
}
