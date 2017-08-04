<?php

use yii\db\Migration;

class m170803_171010_invests extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%invests}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->string(),
            'day' => $this->integer(),
            'take' => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
         $this->dropTable('{{%invets}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_165639_invests cannot be reverted.\n";

        return false;
    }
    */
}
