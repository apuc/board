<?php

use yii\db\Migration;

class m161215_072528_add_column_dt_send_msg_ads_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'dt_send_msg', \yii\db\Schema::TYPE_INTEGER . '(11) DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('ads', 'dt_send_msg');
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
