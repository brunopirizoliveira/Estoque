<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200626161132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE almoxarifado (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_empresa_id INTEGER NOT NULL, nome VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_3E578C62F7949946 ON almoxarifado (id_empresa_id)');
        $this->addSql('CREATE TABLE empresa (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, razao VARCHAR(255) NOT NULL, cnpj VARCHAR(14) NOT NULL, fantasia VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE almoxarifado');
        $this->addSql('DROP TABLE empresa');
    }
}
