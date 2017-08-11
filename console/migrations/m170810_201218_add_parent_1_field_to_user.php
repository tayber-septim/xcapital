<?php

use yii\db\Migration;

class m170810_201218_add_parent_1_field_to_user extends Migration
{
        public function up()
    {
        $this->addColumn('user', 'parent_1', 'string AFTER `parent`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('user', 'parent_1');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170810_201218_add_parent_1_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
