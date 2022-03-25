<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220316130723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chemins (id INT AUTO_INCREMENT NOT NULL, expert_actif_id INT DEFAULT NULL, client_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_2E7F45D2A49D6A5C (expert_actif_id), INDEX IDX_2E7F45D219EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chemins_categories (chemins_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_B5FE57EEA5F8F3AD (chemins_id), INDEX IDX_B5FE57EEA21214B7 (categories_id), PRIMARY KEY(chemins_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chemins_sous_categories (chemins_id INT NOT NULL, sous_categories_id INT NOT NULL, INDEX IDX_BE4B719DA5F8F3AD (chemins_id), INDEX IDX_BE4B719D9F751138 (sous_categories_id), PRIMARY KEY(chemins_id, sous_categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chemins_experts (chemins_id INT NOT NULL, experts_id INT NOT NULL, INDEX IDX_21551097A5F8F3AD (chemins_id), INDEX IDX_2155109740D3CDC8 (experts_id), PRIMARY KEY(chemins_id, experts_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, customer_success_id INT DEFAULT NULL, user_id INT NOT NULL, email VARCHAR(180) NOT NULL, civilite VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, activite VARCHAR(255) NOT NULL, siret VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_desactivation DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C82E74E7927C74 (email), INDEX IDX_C82E745BF23273 (customer_success_id), UNIQUE INDEX UNIQ_C82E74A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_success (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, email VARCHAR(180) NOT NULL, civilite VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_73DD7B0CE7927C74 (email), UNIQUE INDEX UNIQ_73DD7B0CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experts (id INT AUTO_INCREMENT NOT NULL, rendez_vous_id INT DEFAULT NULL, user_id INT NOT NULL, email VARCHAR(180) NOT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, presentation LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_desactivation DATETIME DEFAULT NULL, disponibilités LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8393F424E7927C74 (email), INDEX IDX_8393F42491EF7EAA (rendez_vous_id), UNIQUE INDEX UNIQ_8393F424A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experts_categories (experts_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_58F69A6440D3CDC8 (experts_id), INDEX IDX_58F69A64A21214B7 (categories_id), PRIMARY KEY(experts_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experts_sous_categories (experts_id INT NOT NULL, sous_categories_id INT NOT NULL, INDEX IDX_24F9336C40D3CDC8 (experts_id), INDEX IDX_24F9336C9F751138 (sous_categories_id), PRIMARY KEY(experts_id, sous_categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, chemin_id INT NOT NULL, date_heure VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_65E8AA0A19EB6921 (client_id), INDEX IDX_65E8AA0A3BD6E429 (chemin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categories (id INT AUTO_INCREMENT NOT NULL, categorie_parent_id INT NOT NULL, titre VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_DC8B1382DF25C577 (categorie_parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chemins ADD CONSTRAINT FK_2E7F45D2A49D6A5C FOREIGN KEY (expert_actif_id) REFERENCES experts (id)');
        $this->addSql('ALTER TABLE chemins ADD CONSTRAINT FK_2E7F45D219EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE chemins_categories ADD CONSTRAINT FK_B5FE57EEA5F8F3AD FOREIGN KEY (chemins_id) REFERENCES chemins (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chemins_categories ADD CONSTRAINT FK_B5FE57EEA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chemins_sous_categories ADD CONSTRAINT FK_BE4B719DA5F8F3AD FOREIGN KEY (chemins_id) REFERENCES chemins (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chemins_sous_categories ADD CONSTRAINT FK_BE4B719D9F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chemins_experts ADD CONSTRAINT FK_21551097A5F8F3AD FOREIGN KEY (chemins_id) REFERENCES chemins (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chemins_experts ADD CONSTRAINT FK_2155109740D3CDC8 FOREIGN KEY (experts_id) REFERENCES experts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E745BF23273 FOREIGN KEY (customer_success_id) REFERENCES customer_success (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customer_success ADD CONSTRAINT FK_73DD7B0CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE experts ADD CONSTRAINT FK_8393F42491EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id)');
        $this->addSql('ALTER TABLE experts ADD CONSTRAINT FK_8393F424A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE experts_categories ADD CONSTRAINT FK_58F69A6440D3CDC8 FOREIGN KEY (experts_id) REFERENCES experts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experts_categories ADD CONSTRAINT FK_58F69A64A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experts_sous_categories ADD CONSTRAINT FK_24F9336C40D3CDC8 FOREIGN KEY (experts_id) REFERENCES experts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experts_sous_categories ADD CONSTRAINT FK_24F9336C9F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A3BD6E429 FOREIGN KEY (chemin_id) REFERENCES chemins (id)');
        $this->addSql('ALTER TABLE sous_categories ADD CONSTRAINT FK_DC8B1382DF25C577 FOREIGN KEY (categorie_parent_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chemins_categories DROP FOREIGN KEY FK_B5FE57EEA21214B7');
        $this->addSql('ALTER TABLE experts_categories DROP FOREIGN KEY FK_58F69A64A21214B7');
        $this->addSql('ALTER TABLE sous_categories DROP FOREIGN KEY FK_DC8B1382DF25C577');
        $this->addSql('ALTER TABLE chemins_categories DROP FOREIGN KEY FK_B5FE57EEA5F8F3AD');
        $this->addSql('ALTER TABLE chemins_sous_categories DROP FOREIGN KEY FK_BE4B719DA5F8F3AD');
        $this->addSql('ALTER TABLE chemins_experts DROP FOREIGN KEY FK_21551097A5F8F3AD');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A3BD6E429');
        $this->addSql('ALTER TABLE chemins DROP FOREIGN KEY FK_2E7F45D219EB6921');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A19EB6921');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E745BF23273');
        $this->addSql('ALTER TABLE chemins DROP FOREIGN KEY FK_2E7F45D2A49D6A5C');
        $this->addSql('ALTER TABLE chemins_experts DROP FOREIGN KEY FK_2155109740D3CDC8');
        $this->addSql('ALTER TABLE experts_categories DROP FOREIGN KEY FK_58F69A6440D3CDC8');
        $this->addSql('ALTER TABLE experts_sous_categories DROP FOREIGN KEY FK_24F9336C40D3CDC8');
        $this->addSql('ALTER TABLE experts DROP FOREIGN KEY FK_8393F42491EF7EAA');
        $this->addSql('ALTER TABLE chemins_sous_categories DROP FOREIGN KEY FK_BE4B719D9F751138');
        $this->addSql('ALTER TABLE experts_sous_categories DROP FOREIGN KEY FK_24F9336C9F751138');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E74A76ED395');
        $this->addSql('ALTER TABLE customer_success DROP FOREIGN KEY FK_73DD7B0CA76ED395');
        $this->addSql('ALTER TABLE experts DROP FOREIGN KEY FK_8393F424A76ED395');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE chemins');
        $this->addSql('DROP TABLE chemins_categories');
        $this->addSql('DROP TABLE chemins_sous_categories');
        $this->addSql('DROP TABLE chemins_experts');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE customer_success');
        $this->addSql('DROP TABLE experts');
        $this->addSql('DROP TABLE experts_categories');
        $this->addSql('DROP TABLE experts_sous_categories');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE sous_categories');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
