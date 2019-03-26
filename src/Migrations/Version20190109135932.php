<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109135932 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poste_part_responsable_payement (poste_id INT NOT NULL, part_responsable_payement_id INT NOT NULL, INDEX IDX_F0823A76A0905086 (poste_id), INDEX IDX_F0823A76A2ED5EED (part_responsable_payement_id), PRIMARY KEY(poste_id, part_responsable_payement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poste_part_responsable_payement ADD CONSTRAINT FK_F0823A76A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poste_part_responsable_payement ADD CONSTRAINT FK_F0823A76A2ED5EED FOREIGN KEY (part_responsable_payement_id) REFERENCES part_responsable_payement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE poste_part_responsable_payement');
    }
}
