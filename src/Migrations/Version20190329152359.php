<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190329152359 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banque CHANGE telephone_banque telephone_banque INT NOT NULL');
        $this->addSql('ALTER TABLE charge CHANGE charge_cnss_patron charge_cnss_patron DOUBLE PRECISION NOT NULL, CHANGE charge_cnss_employe charge_cnss_employe DOUBLE PRECISION NOT NULL, CHANGE taxe taxe DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE employe CHANGE cnss cnss INT NOT NULL, CHANGE telephone telephone INT NOT NULL');
        $this->addSql('ALTER TABLE part_responsable_payement CHANGE telephone_employeur telephone_employeur INT NOT NULL');
        $this->addSql('ALTER TABLE poste CHANGE telephone_poste telephone_poste INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banque CHANGE telephone_banque telephone_banque VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE charge CHANGE charge_cnss_patron charge_cnss_patron VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE charge_cnss_employe charge_cnss_employe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE taxe taxe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE employe CHANGE cnss cnss VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE part_responsable_payement CHANGE telephone_employeur telephone_employeur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE poste CHANGE telephone_poste telephone_poste VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
