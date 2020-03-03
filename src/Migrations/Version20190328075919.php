<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328075919 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banque CHANGE telephone_banque telephone_banque INT NOT NULL');
        $this->addSql('ALTER TABLE charge CHANGE charge_cnss_patron charge_cnss_patron DOUBLE PRECISION NOT NULL, CHANGE charge_cnss_employe charge_cnss_employe DOUBLE PRECISION NOT NULL, CHANGE taxe taxe DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banque CHANGE telephone_banque telephone_banque VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE charge CHANGE charge_cnss_patron charge_cnss_patron VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE charge_cnss_employe charge_cnss_employe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE taxe taxe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}