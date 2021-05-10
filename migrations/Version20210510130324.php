<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510130324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP INDEX UNIQ_364071D7A76ED395, ADD INDEX IDX_364071D7A76ED395 (user_id)');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7EBF07F38');
        $this->addSql('DROP INDEX UNIQ_364071D7EBF07F38 ON emprunt');
        $this->addSql('ALTER TABLE emprunt CHANGE livres_id livre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D737D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_364071D737D925CB ON emprunt (livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP INDEX IDX_364071D7A76ED395, ADD UNIQUE INDEX UNIQ_364071D7A76ED395 (user_id)');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D737D925CB');
        $this->addSql('DROP INDEX IDX_364071D737D925CB ON emprunt');
        $this->addSql('ALTER TABLE emprunt CHANGE livre_id livres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7EBF07F38 FOREIGN KEY (livres_id) REFERENCES livre (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_364071D7EBF07F38 ON emprunt (livres_id)');
    }
}
