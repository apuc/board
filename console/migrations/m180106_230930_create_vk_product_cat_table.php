<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vk_product_cat`.
 */
class m180106_230930_create_vk_product_cat_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vk_product_cat', [
            'id' => $this->primaryKey(),
            'cat_id' => $this->integer(11)->notNull(),
            'cat_name' => $this->string(255)->notNull(),
            'section_id' => $this->integer(11)->notNull(),
            'section_name' => $this->string(255)->notNull(),
            'board_cat_id' => $this->integer(11)->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vk_product_cat');
    }
}
