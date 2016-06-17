<?php

use yii\db\Migration;

class m160616_102659_add_column_ads_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'name', $this->string('255'));
        $this->addColumn('ads', 'phone', $this->string('255'));
        $this->addColumn('ads', 'mail', $this->string('255'));
    }

    public function down()
    {
        $this->dropColumn('ads', 'name');
        $this->dropColumn('phone', 'name');
        $this->dropColumn('phone', 'mail');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
