<?php

use yii\db\Migration;

/**
 * Class m181119_031056_calendr
 */
class m181119_031056_calendr extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        CREATE TABLE IF NOT EXISTS `calendr` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `creator` int(20) NOT NULL,
  `date_event` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `calendr_ibfk_1` (`creator`),
  CONSTRAINT `calendr_ibfk_1`
  FOREIGN KEY (`creator`)
  REFERENCES `user` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("
            DROP TABLE IF EXISTS `calendr`;
        ");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181119_031056_calendr cannot be reverted.\n";

        return false;
    }
    */
}
