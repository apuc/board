<?php

use yii\db\Migration;

class m170123_131303_add_column_ads_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'private_business', $this->integer(1)->defaultValue(0));
        $this->addColumn('ads', 'business_id', $this->integer(11)->defaultValue(null) );
    }

    public function down()
    {
        $this->dropColumn('ads', 'private_business');
        $this->dropColumn('ads', 'business_id');
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
