<?php

use yii\db\Migration;

class m161022_101812_alert_column_cover_ads_table extends Migration
{
    public function up()
    {
        $this->alterColumn('ads', 'cover', \yii\db\Schema::TYPE_STRING . '(255) DEFAULT NULL');
    }

    public function down()
    {


        return true;
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
