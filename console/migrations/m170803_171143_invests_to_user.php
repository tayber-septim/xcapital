<?php

use yii\db\Migration;

class m170803_171143_invests_to_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%invests_to_user}}', [
            'id_invest' => $this->integer(),
            'username' => $this->string()->notNull(),
            'investname' => $this->string()->notNull(),
            'price' => $this->string(),
            'day' => $this->integer(),
            'percentoftake' => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%invests_to_user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_171143_invests_to_user cannot be reverted.\n";

        return false;
    }
    */
}
