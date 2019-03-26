<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109134023 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE delegation ADD delegations_id INT NOT NULL');
        $this->addSql('ALTER TABLE delegation ADD CONSTRAINT FK_292F436D2AF0700A FOREIGN KEY (delegations_id) REFERENCES arrondissement (id)');
        $this->addSql('CREATE INDEX IDX_292F436D2AF0700A ON delegation (delegations_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE delegation DROP FOREIGN KEY FK_292F436D2AF0700A');
        $this->addSql('DROP INDEX IDX_292F436D2AF0700A ON delegation');
        $this->addSql('ALTER TABLE delegation DROP delegations_id');
    }
}
