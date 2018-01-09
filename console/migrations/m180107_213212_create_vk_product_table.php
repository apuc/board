<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vk_product`.
 */
class m180107_213212_create_vk_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vk_product', [
            'id' => $this->primaryKey(),
            'vk_id' => $this->integer(11)->notNull(),
            'owner_id' => $this->integer(11)->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'price' => $this->integer(8),
            'currency' => $this->string(25),
            'cat_id' => $this->integer(11)->defaultValue(null),
            'dt_add' => $this->integer(11)->defaultValue(null),
            'thumb_photo' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vk_product');
    }
}
