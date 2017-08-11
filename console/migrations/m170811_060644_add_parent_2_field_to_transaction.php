<?php

use yii\db\Migration;

class m170811_060644_add_parent_2_field_to_transaction extends Migration
{
       public function up()
    {
        $this->addColumn('transaction', 'parent_2', 'string AFTER `parent_1`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('transaction', 'parent_2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170811_060644_add_parent_2_field_to_transaction cannot be reverted.\n";

        return false;
    }
    */
}
