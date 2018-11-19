<?php

use yii\db\Migration;

/**
 * Class m181116_080557_SigninHistory
 */
class m181116_080557_SigninHistory extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
    CREATE TABLE IF NOT EXISTS `signin_history` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` int(11) NOT NULL,
      `name` varchar(50) DEFAULT NULL,
      `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`),
      KEY `signin_history_ibfk_1` (`user_id`),
      CONSTRAINT `signin_history_ibfk_1` 
      FOREIGN KEY (`user_id`) 
      REFERENCES `user` (`id`) 
      ON DELETE NO ACTION 
      ON UPDATE NO ACTION
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("
            DROP TABLE IF EXISTS `signin_history`;
        ");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181116_080557_SigninHistory cannot be reverted.\n";

        return false;
    }
    */
}
