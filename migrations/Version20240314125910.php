<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314125910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products CHANGE livraisonun livraisonun VARCHAR(255) DEFAULT NULL, CHANGE longueurun longueurun VARCHAR(255) DEFAULT NULL, CHANGE longueurdeux longueurdeux VARCHAR(255) DEFAULT NULL, CHANGE longueurtrois longueurtrois VARCHAR(255) DEFAULT NULL, CHANGE livraisondeux livraisondeux VARCHAR(255) DEFAULT NULL, CHANGE livraisontrois livraisontrois VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products CHANGE longueurun longueurun VARCHAR(255) NOT NULL, CHANGE longueurdeux longueurdeux VARCHAR(255) NOT NULL, CHANGE longueurtrois longueurtrois VARCHAR(255) NOT NULL, CHANGE livraisonun livraisonun VARCHAR(255) NOT NULL, CHANGE livraisondeux livraisondeux VARCHAR(255) NOT NULL, CHANGE livraisontrois livraisontrois VARCHAR(255) NOT NULL');
    }
}
