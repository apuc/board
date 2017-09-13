<?php

use yii\db\Migration;

class m170911_110043_add_columns_ads_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'site_id', $this->integer(11)->defaultValue(0));
        $this->addColumn('ads', 'visibility', $this->integer(1)->defaultValue(1));
    }

    public function down()
    {
        $this->dropColumn('ads', 'site_id');
        $this->dropColumn('ads', 'visibility');
    }

    /*public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170911_110043_add_columns_ads_table cannot be reverted.\n";

        return false;
    }*/

    /*
    // Use up()/down() to run migration code without a transaction.

    */
}
