<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225130853 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE arrondissement ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE arrondissement ADD CONSTRAINT FK_3A3B64C4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3A3B64C4A76ED395 ON arrondissement (user_id)');
        $this->addSql('ALTER TABLE salaire ADD CONSTRAINT FK_3BCBBD111B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('CREATE INDEX IDX_3BCBBD111B65292 ON salaire (employe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE arrondissement DROP FOREIGN KEY FK_3A3B64C4A76ED395');
        $this->addSql('DROP INDEX IDX_3A3B64C4A76ED395 ON arrondissement');
        $this->addSql('ALTER TABLE arrondissement DROP user_id');
        $this->addSql('ALTER TABLE salaire DROP FOREIGN KEY FK_3BCBBD111B65292');
        $this->addSql('DROP INDEX IDX_3BCBBD111B65292 ON salaire');
    }
}
