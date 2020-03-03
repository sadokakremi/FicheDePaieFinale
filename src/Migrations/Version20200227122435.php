<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200227122435 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attestation_travail_employe (attestation_travail_id INT NOT NULL, employe_id INT NOT NULL, INDEX IDX_23BD0D9C10CF41DB (attestation_travail_id), INDEX IDX_23BD0D9C1B65292 (employe_id), PRIMARY KEY(attestation_travail_id, employe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attestation_travail_part_responsable_payement (attestation_travail_id INT NOT NULL, part_responsable_payement_id INT NOT NULL, INDEX IDX_B3A8E8DB10CF41DB (attestation_travail_id), INDEX IDX_B3A8E8DBA2ED5EED (part_responsable_payement_id), PRIMARY KEY(attestation_travail_id, part_responsable_payement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attestation_travail_employe ADD CONSTRAINT FK_23BD0D9C10CF41DB FOREIGN KEY (attestation_travail_id) REFERENCES attestation_travail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attestation_travail_employe ADD CONSTRAINT FK_23BD0D9C1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attestation_travail_part_responsable_payement ADD CONSTRAINT FK_B3A8E8DB10CF41DB FOREIGN KEY (attestation_travail_id) REFERENCES attestation_travail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attestation_travail_part_responsable_payement ADD CONSTRAINT FK_B3A8E8DBA2ED5EED FOREIGN KEY (part_responsable_payement_id) REFERENCES part_responsable_payement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attestation_travail DROP FOREIGN KEY FK_FEFEF56A1B65292');
        $this->addSql('ALTER TABLE attestation_travail DROP FOREIGN KEY FK_FEFEF56A21A546E8');
        $this->addSql('DROP INDEX UNIQ_FEFEF56A21A546E8 ON attestation_travail');
        $this->addSql('DROP INDEX UNIQ_FEFEF56A1B65292 ON attestation_travail');
        $this->addSql('ALTER TABLE attestation_travail DROP employe_id, DROP partresponsablepayement_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE attestation_travail_employe');
        $this->addSql('DROP TABLE attestation_travail_part_responsable_payement');
        $this->addSql('ALTER TABLE attestation_travail ADD employe_id INT DEFAULT NULL, ADD partresponsablepayement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation_travail ADD CONSTRAINT FK_FEFEF56A1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE attestation_travail ADD CONSTRAINT FK_FEFEF56A21A546E8 FOREIGN KEY (partresponsablepayement_id) REFERENCES part_responsable_payement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEFEF56A21A546E8 ON attestation_travail (partresponsablepayement_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEFEF56A1B65292 ON attestation_travail (employe_id)');
    }
}
