<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `category_table`.
 */
class m160608_092433_create_category_table extends Migration
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

        $this->createTable('category', [
            'id'                => Schema::TYPE_PK,
            'name'              => Schema::TYPE_STRING . '(100) NOT NULL',
            'icon'              => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'slug'              => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'parent_id'         => Schema::TYPE_INTEGER . '(255) DEFAULT NULL',
            'description'       => Schema::TYPE_TEXT . ' DEFAULT NULL',
            'show_menu'         => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'images'            => Schema::TYPE_STRING . ' DEFAULT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
