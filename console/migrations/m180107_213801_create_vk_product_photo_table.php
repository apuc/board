<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vk_product_photo`.
 */
class m180107_213801_create_vk_product_photo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vk_product_photo', [
            'id' => $this->primaryKey(),
            'vk_product_id' => $this->integer(11)->notNull(),
            'photo' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vk_product_photo');
    }
}
