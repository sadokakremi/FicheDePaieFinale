<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327090156 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE part_responsable_payement ADD poste_id INT NOT NULL');
        $this->addSql('ALTER TABLE part_responsable_payement ADD CONSTRAINT FK_D5DFEA45A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_D5DFEA45A0905086 ON part_responsable_payement (poste_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE part_responsable_payement DROP FOREIGN KEY FK_D5DFEA45A0905086');
        $this->addSql('DROP INDEX IDX_D5DFEA45A0905086 ON part_responsable_payement');
        $this->addSql('ALTER TABLE part_responsable_payement DROP poste_id');
    }
}
