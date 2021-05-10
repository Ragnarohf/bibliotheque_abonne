<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510122646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt ADD user_id INT DEFAULT NULL, ADD livres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7EBF07F38 FOREIGN KEY (livres_id) REFERENCES livre (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_364071D7A76ED395 ON emprunt (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_364071D7EBF07F38 ON emprunt (livres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7A76ED395');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7EBF07F38');
        $this->addSql('DROP INDEX UNIQ_364071D7A76ED395 ON emprunt');
        $this->addSql('DROP INDEX UNIQ_364071D7EBF07F38 ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP user_id, DROP livres_id');
    }
}
