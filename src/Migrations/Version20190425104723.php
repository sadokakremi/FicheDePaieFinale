<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190425104723 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salaire DROP FOREIGN KEY FK_3BCBBD11D1AAB236');
        $this->addSql('DROP INDEX UNIQ_3BCBBD11D1AAB236 ON salaire');
        $this->addSql('ALTER TABLE salaire DROP bulletin_id');
        $this->addSql('ALTER TABLE employe CHANGE cnss cnss INT NOT NULL, CHANGE telephone telephone INT NOT NULL');
        $this->addSql('ALTER TABLE part_responsable_payement CHANGE telephone_employeur telephone_employeur INT NOT NULL');
        $this->addSql('ALTER TABLE poste CHANGE telephone_poste telephone_poste INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employe CHANGE cnss cnss VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE part_responsable_payement CHANGE telephone_employeur telephone_employeur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE poste CHANGE telephone_poste telephone_poste VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE salaire ADD bulletin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salaire ADD CONSTRAINT FK_3BCBBD11D1AAB236 FOREIGN KEY (bulletin_id) REFERENCES bulletin_de_paie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3BCBBD11D1AAB236 ON salaire (bulletin_id)');
    }
}
