<?php

use yii\db\Migration;

/**
 * Class m181119_030613_access1
 */
class m181119_030613_access1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        CREATE TABLE IF NOT EXISTS `access1` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `note_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clndr_access_1_idx` (`note_id`),
  KEY `fk_clndr_access_2_idx` (`user_id`),
  CONSTRAINT `access1_ibfk_1` 
  FOREIGN KEY (`note_id`) 
  REFERENCES `calendr` (`id`) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT `access1_ibfk_2`
  FOREIGN KEY (`user_id`)
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
            DROP TABLE IF EXISTS `access1`;
        ");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181119_030613_access1 cannot be reverted.\n";

        return false;
    }
    */
}
