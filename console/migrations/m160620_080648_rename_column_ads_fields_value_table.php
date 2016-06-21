<?php

use yii\db\Migration;

class m160620_080648_rename_column_ads_fields_value_table extends Migration
{
    public function up()
    {
        //$this->dropForeignKey('ads_fields_value_ads_fields_fk', 'ads_fields_value');
        $this->renameColumn('ads_fields_value', 'ads_fields_id', 'ads_fields_name');
        $this->alterColumn('ads_fields_value', 'ads_fields_name', \yii\db\Schema::TYPE_STRING . '(255) DEFAULT NULL');
    }

    public function down()
    {
        //$this->addForeignKey('ads_fields_value_ads_fields_fk', 'ads_fields_value', 'ads_fields_id', 'ads_fields', 'id', 'RESTRICT', 'CASCADE');
        $this->renameColumn('ads_fields_value', 'ads_fields_name', 'ads_fields_id');
        $this->alterColumn('ads_fields_value', 'ads_fields_name', \yii\db\Schema::TYPE_INTEGER . '(255) DEFAULT NULL');
        $this->addForeignKey('ads_fields_value_ads_fields_fk', 'ads_fields_value', 'ads_fields_id', 'ads_fields', 'id', 'RESTRICT', 'CASCADE');

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
