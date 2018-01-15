<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vk_prod_ads`.
 */
class m180114_214629_create_vk_prod_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vk_prod_ads', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'ad_id' => $this->integer(11)->notNull(),
            'vk_prod_id' => $this->integer(11)->notNull(),
            'owner_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vk_prod_ads');
    }
}
