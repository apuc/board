<?php

use yii\db\Migration;

class m160725_095528_add_column_ads_fields_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads_fields', 'hint', \yii\db\Schema::TYPE_STRING . ('(255) NOT NULL'));
        $this->addColumn('ads', 'state', \yii\db\Schema::TYPE_INTEGER . ('(5) NOT NULL'));
    }

    public function down()
    {
        $this->dropColumn('ads_fields', 'hint');
        $this->dropColumn('ads', 'state');
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
