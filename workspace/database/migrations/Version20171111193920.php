<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20171111193920 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `currency` (  `id`,`title`, `rate`, `iso`, `is_enabled`)
 VALUES (1, 'Рубль', 1, 'RUB', 1);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
