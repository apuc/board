<?php

use yii\db\Migration;

class m160620_072848_add_column_name_ads_fields_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads_fields', 'name', $this->string('255'));
    }

    public function down()
    {
        $this->dropColumn('ads_fields', 'name');

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
