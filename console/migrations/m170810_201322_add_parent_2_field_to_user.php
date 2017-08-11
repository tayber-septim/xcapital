<?php

use yii\db\Migration;

class m170810_201322_add_parent_2_field_to_user extends Migration
{
        public function up()
    {
        $this->addColumn('user', 'parent_2', 'string AFTER `parent_1`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('user', 'parent_2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170810_201322_add_parent_2_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
