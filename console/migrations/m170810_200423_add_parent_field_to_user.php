<?php

use yii\db\Migration;

class m170810_200423_add_parent_field_to_user extends Migration
{
        public function up()
    {
        $this->addColumn('user', 'parent', 'string AFTER `user_hash`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('user', 'parent');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170810_200423_add_parent_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
