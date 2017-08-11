<?php

use yii\db\Migration;

class m170811_060336_add_parent_field_to_transaction extends Migration
{
       public function up()
    {
        $this->addColumn('transaction', 'parent', 'string AFTER `invest_name`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('transaction', 'parent');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170811_060336_add_parent_field_to_transaction cannot be reverted.\n";

        return false;
    }
    */
}
