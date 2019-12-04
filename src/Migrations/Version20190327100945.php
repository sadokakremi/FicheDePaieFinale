<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327100945 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail ADD arrondissement_id INT NOT NULL');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80A407DBC11 FOREIGN KEY (arrondissement_id) REFERENCES arrondissement (id)');
        $this->addSql('CREATE INDEX IDX_DD84E80A407DBC11 ON poste_de_travail (arrondissement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail DROP FOREIGN KEY FK_DD84E80A407DBC11');
        $this->addSql('DROP INDEX IDX_DD84E80A407DBC11 ON poste_de_travail');
        $this->addSql('ALTER TABLE poste_de_travail DROP arrondissement_id');
    }
}
