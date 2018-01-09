<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vk_groups`.
 */
class m180106_222239_create_vk_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vk_groups', [
            'id' => $this->primaryKey(),
            'domain' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'owner_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(1)->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vk_groups');
    }
}
