<?php

use yii\db\Migration;

class m170811_110647_add_your_percent_field_to_referal_system extends Migration
{
        public function up()
    {
        $this->addColumn('referal_system', 'your_percent', 'string AFTER `percent`',$this->string());
    }

    public function down()
    {
        $this->dropColumn('referal_system', 'your_percent');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170811_110647_add_your_percent_field_to_referal_system cannot be reverted.\n";

        return false;
    }
    */
}
