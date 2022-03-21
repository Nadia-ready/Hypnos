<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321164458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishments ADD manager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE establishments ADD CONSTRAINT FK_5C67EFC5783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_5C67EFC5783E3463 ON establishments (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishments DROP FOREIGN KEY FK_5C67EFC5783E3463');
        $this->addSql('DROP INDEX IDX_5C67EFC5783E3463 ON establishments');
        $this->addSql('ALTER TABLE establishments DROP manager_id');
    }
}
