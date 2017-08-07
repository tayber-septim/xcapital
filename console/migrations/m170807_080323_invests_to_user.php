<?php

use yii\db\Migration;

class m170807_080323_invests_to_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%invests_to_user}}', [
            'id' => $this->primaryKey(),
            'id_invest' => $this->integer(),
            'id_user' => $this->integer(),
            'user_name' => $this->string(),
            'invest_name' => $this->string(),
            'price' => $this->integer(),
            'day' => $this->integer(),
            'percentoftake' => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m170807_080323_invests_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170807_080323_invests_to_user cannot be reverted.\n";

        return false;
    }
    */
}
