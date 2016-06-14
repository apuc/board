<?php

use yii\db\Migration;

class m160614_092111_add_column_price_ads_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'price', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('ads', 'price');
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
