<?php

use yii\db\Migration;

class m170811_100235_referal_system extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%referal_system}}', [
            'id' => $this->primaryKey(),
            'user_hash' => $this->string(),
            'sum' => $this->float(),
            'invest_name' => $this->string(),
            'percent' => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%referal_system}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170811_100235_referal_system cannot be reverted.\n";

        return false;
    }
    */
}
