<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `ads_fields_group_ads_fields_table`.
 */
class m160610_102945_create_ads_fields_group_ads_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('ads_fields_group_ads_fields', [
            'id'                => Schema::TYPE_PK,
            'fields_id'         => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'group_ads_fields_id'  => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('ads_fields_group_ads_fields_fields_fk', 'ads_fields_group_ads_fields', 'fields_id', 'ads_fields', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('ads_fields_group_ads_group_ads_fields_fk', 'ads_fields_group_ads_fields', 'group_ads_fields_id', 'group_ads_fields', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('ads_fields_group_ads_group_ads_fields_fk', 'ads_fields_group_ads_fields');
        $this->dropForeignKey('ads_fields_group_ads_fields_fields_fk', 'ads_fields_group_ads_fields');
        $this->dropTable('ads_fields_group_ads_fields');
    }
}
