<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921132800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE base (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, bedrijfsnaam VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C0B4FE61A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE btw (id INT AUTO_INCREMENT NOT NULL, percentage INT NOT NULL, omschrijving VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factuur (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, factuur_date DATETIME NOT NULL, INDEX IDX_321477109D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factuur_regel (id INT AUTO_INCREMENT NOT NULL, factuur_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, aantal INT NOT NULL, INDEX IDX_62560F5945CCBDB9 (factuur_id_id), INDEX IDX_62560F59DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, product_id_id INT DEFAULT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C53D045FDE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memo (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_AB4A902AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, btw_id INT DEFAULT NULL, naam VARCHAR(255) NOT NULL, omschrijving VARCHAR(255) NOT NULL, prijs INT NOT NULL, frontpage VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD9744CDFA (btw_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base ADD CONSTRAINT FK_C0B4FE61A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factuur ADD CONSTRAINT FK_321477109D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factuur_regel ADD CONSTRAINT FK_62560F5945CCBDB9 FOREIGN KEY (factuur_id_id) REFERENCES factuur (id)');
        $this->addSql('ALTER TABLE factuur_regel ADD CONSTRAINT FK_62560F59DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE memo ADD CONSTRAINT FK_AB4A902AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9744CDFA FOREIGN KEY (btw_id) REFERENCES btw (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9744CDFA');
        $this->addSql('ALTER TABLE factuur_regel DROP FOREIGN KEY FK_62560F5945CCBDB9');
        $this->addSql('ALTER TABLE factuur_regel DROP FOREIGN KEY FK_62560F59DE18E50B');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FDE18E50B');
        $this->addSql('DROP TABLE base');
        $this->addSql('DROP TABLE btw');
        $this->addSql('DROP TABLE factuur');
        $this->addSql('DROP TABLE factuur_regel');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE memo');
        $this->addSql('DROP TABLE product');
    }
}
