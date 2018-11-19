<?php

use yii\db\Migration;

/**
 * Class m181119_032301_admin_data
 */
class m181119_032301_admin_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        INSERT INTO `user` (`id`, `username`, `email`, `password`, `hashpass`, `create_date`) VALUES
(14, 'Alex', 'alex@test.ru', '123456', '$2y$13$c8brPHi0jA5vCTBGemNpWOJGkgGpA.wx/luoUC7hKvQpKYsb8fzPu', '2018-11-07 13:23:46');
        ");
            
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181119_032301_admin_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181119_032301_admin_data cannot be reverted.\n";

        return false;
    }
    */
}
