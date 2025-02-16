<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250215102506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_continent (animal_id INT NOT NULL, continent_id INT NOT NULL, INDEX IDX_946321138E962C16 (animal_id), INDEX IDX_94632113921F4C77 (continent_id), PRIMARY KEY(animal_id, continent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_continent ADD CONSTRAINT FK_946321138E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_continent ADD CONSTRAINT FK_94632113921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_continent DROP FOREIGN KEY FK_946321138E962C16');
        $this->addSql('ALTER TABLE animal_continent DROP FOREIGN KEY FK_94632113921F4C77');
        $this->addSql('DROP TABLE animal_continent');
        $this->addSql('DROP TABLE continent');
    }
}
