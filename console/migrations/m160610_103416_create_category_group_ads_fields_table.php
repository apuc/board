<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `category_group_ads_fields_table`.
 */
class m160610_103416_create_category_group_ads_fields_table extends Migration
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

        $this->createTable('category_group_ads_fields', [
            'id'                => Schema::TYPE_PK,
            'category_id'         => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'group_ads_fields_id'  => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('category_group_ads_fields_category_fk', 'category_group_ads_fields', 'category_id', 'category', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('category_group_ads_fields_group_ads_fields_fk', 'category_group_ads_fields', 'group_ads_fields_id', 'group_ads_fields', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('category_group_ads_fields_category_fk', 'category_group_ads_fields');
        $this->dropForeignKey('category_group_ads_fields_group_ads_fields_fk', 'category_group_ads_fields');
        $this->dropTable('category_group_ads_fields');
    }
}
