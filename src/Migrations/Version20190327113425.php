<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327113425 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attestation_arret_travail ADD employe_id INT DEFAULT NULL, ADD partresponsablepayement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation_arret_travail ADD CONSTRAINT FK_F7393E841B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE attestation_arret_travail ADD CONSTRAINT FK_F7393E8421A546E8 FOREIGN KEY (partresponsablepayement_id) REFERENCES part_responsable_payement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7393E841B65292 ON attestation_arret_travail (employe_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7393E8421A546E8 ON attestation_arret_travail (partresponsablepayement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attestation_arret_travail DROP FOREIGN KEY FK_F7393E841B65292');
        $this->addSql('ALTER TABLE attestation_arret_travail DROP FOREIGN KEY FK_F7393E8421A546E8');
        $this->addSql('DROP INDEX UNIQ_F7393E841B65292 ON attestation_arret_travail');
        $this->addSql('DROP INDEX UNIQ_F7393E8421A546E8 ON attestation_arret_travail');
        $this->addSql('ALTER TABLE attestation_arret_travail DROP employe_id, DROP partresponsablepayement_id');
    }
}
