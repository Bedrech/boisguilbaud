<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318120655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD premierelongueur VARCHAR(255) DEFAULT NULL, ADD deuxiemelongueur VARCHAR(255) DEFAULT NULL, ADD troisiemelongueur VARCHAR(255) DEFAULT NULL, ADD surplace VARCHAR(255) DEFAULT NULL, ADD livraison VARCHAR(255) DEFAULT NULL, ADD surplacepremierprix DOUBLE PRECISION DEFAULT NULL, ADD surplacedeuxiemeprix DOUBLE PRECISION DEFAULT NULL, ADD surplacetroisiemeprix DOUBLE PRECISION DEFAULT NULL, ADD livraisonpremierprix DOUBLE PRECISION DEFAULT NULL, ADD livraisondeuxiemeprix DOUBLE PRECISION DEFAULT NULL, ADD livraisontroisiemeprix DOUBLE PRECISION DEFAULT NULL, DROP livraisonun, DROP longueurun, DROP longueurdeux, DROP longueurtrois, DROP livraisondeux, DROP surplacepriceun, DROP surplacepricedeux, DROP surplacepricetrois, DROP livraisonpriceun, DROP livraisonpricedeux, DROP livraisonpricetrois');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD livraisonun VARCHAR(255) DEFAULT NULL, ADD longueurun VARCHAR(255) DEFAULT NULL, ADD longueurdeux VARCHAR(255) DEFAULT NULL, ADD longueurtrois VARCHAR(255) DEFAULT NULL, ADD livraisondeux VARCHAR(255) DEFAULT NULL, ADD surplacepriceun DOUBLE PRECISION DEFAULT NULL, ADD surplacepricedeux DOUBLE PRECISION DEFAULT NULL, ADD surplacepricetrois DOUBLE PRECISION DEFAULT NULL, ADD livraisonpriceun DOUBLE PRECISION DEFAULT NULL, ADD livraisonpricedeux DOUBLE PRECISION DEFAULT NULL, ADD livraisonpricetrois DOUBLE PRECISION DEFAULT NULL, DROP premierelongueur, DROP deuxiemelongueur, DROP troisiemelongueur, DROP surplace, DROP livraison, DROP surplacepremierprix, DROP surplacedeuxiemeprix, DROP surplacetroisiemeprix, DROP livraisonpremierprix, DROP livraisondeuxiemeprix, DROP livraisontroisiemeprix');
    }
}
