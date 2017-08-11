<?php

use yii\db\Migration;

class m170811_105116_add_user_id_field_to_referal_system extends Migration
{
        public function up()
    {
        $this->addColumn('referal_system', 'user_id', 'integer AFTER `percent` ');
    }

    public function down()
    {
        $this->dropColumn('referal_system', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170811_105116_add_user_id_field_to_referal_system cannot be reverted.\n";

        return false;
    }
    */
}
