<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109135018 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail ADD postesdetravail_id INT NOT NULL');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80A69790D26 FOREIGN KEY (postesdetravail_id) REFERENCES delegation (id)');
        $this->addSql('CREATE INDEX IDX_DD84E80A69790D26 ON poste_de_travail (postesdetravail_id)');
        $this->addSql('ALTER TABLE salaire ADD bulletin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salaire ADD CONSTRAINT FK_3BCBBD11D1AAB236 FOREIGN KEY (bulletin_id) REFERENCES bulletin_de_paie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3BCBBD11D1AAB236 ON salaire (bulletin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poste_de_travail DROP FOREIGN KEY FK_DD84E80A69790D26');
        $this->addSql('DROP INDEX IDX_DD84E80A69790D26 ON poste_de_travail');
        $this->addSql('ALTER TABLE poste_de_travail DROP postesdetravail_id');
        $this->addSql('ALTER TABLE salaire DROP FOREIGN KEY FK_3BCBBD11D1AAB236');
        $this->addSql('DROP INDEX UNIQ_3BCBBD11D1AAB236 ON salaire');
        $this->addSql('ALTER TABLE salaire DROP bulletin_id');
    }
}
