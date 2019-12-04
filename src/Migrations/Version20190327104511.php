<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327104511 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attestation_travail ADD employe_id INT DEFAULT NULL, ADD partresponsablepayement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation_travail ADD CONSTRAINT FK_FEFEF56A1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE attestation_travail ADD CONSTRAINT FK_FEFEF56A21A546E8 FOREIGN KEY (partresponsablepayement_id) REFERENCES part_responsable_payement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEFEF56A1B65292 ON attestation_travail (employe_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEFEF56A21A546E8 ON attestation_travail (partresponsablepayement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attestation_travail DROP FOREIGN KEY FK_FEFEF56A1B65292');
        $this->addSql('ALTER TABLE attestation_travail DROP FOREIGN KEY FK_FEFEF56A21A546E8');
        $this->addSql('DROP INDEX UNIQ_FEFEF56A1B65292 ON attestation_travail');
        $this->addSql('DROP INDEX UNIQ_FEFEF56A21A546E8 ON attestation_travail');
        $this->addSql('ALTER TABLE attestation_travail DROP employe_id, DROP partresponsablepayement_id');
    }
}
