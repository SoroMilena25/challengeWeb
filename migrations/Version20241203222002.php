<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203222002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aimer (user_id_id INT NOT NULL, publication_id_id INT NOT NULL, INDEX IDX_C2D0C6E89D86650F (user_id_id), INDEX IDX_C2D0C6E89A9AD8DB (publication_id_id), PRIMARY KEY(user_id_id, publication_id_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commenter (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, publication_id_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_AB751D0A9D86650F (user_id_id), INDEX IDX_AB751D0A9A9AD8DB (publication_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, createur_id INT NOT NULL, img VARCHAR(255) DEFAULT NULL, img2 VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_AF3C677973A201E5 (createur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation (abonne_id INT NOT NULL, abonnement_id INT NOT NULL, INDEX IDX_62894749C325A696 (abonne_id), INDEX IDX_62894749F1D74413 (abonnement_id), PRIMARY KEY(abonne_id, abonnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aimer ADD CONSTRAINT FK_C2D0C6E89D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE aimer ADD CONSTRAINT FK_C2D0C6E89A9AD8DB FOREIGN KEY (publication_id_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE commenter ADD CONSTRAINT FK_AB751D0A9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE commenter ADD CONSTRAINT FK_AB751D0A9A9AD8DB FOREIGN KEY (publication_id_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677973A201E5 FOREIGN KEY (createur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749C325A696 FOREIGN KEY (abonne_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749F1D74413 FOREIGN KEY (abonnement_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aimer DROP FOREIGN KEY FK_C2D0C6E89D86650F');
        $this->addSql('ALTER TABLE aimer DROP FOREIGN KEY FK_C2D0C6E89A9AD8DB');
        $this->addSql('ALTER TABLE commenter DROP FOREIGN KEY FK_AB751D0A9D86650F');
        $this->addSql('ALTER TABLE commenter DROP FOREIGN KEY FK_AB751D0A9A9AD8DB');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677973A201E5');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749C325A696');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749F1D74413');
        $this->addSql('DROP TABLE aimer');
        $this->addSql('DROP TABLE commenter');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE relation');
        $this->addSql('DROP TABLE `user`');
    }
}
