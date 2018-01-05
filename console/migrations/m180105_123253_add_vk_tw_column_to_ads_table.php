<?php

use yii\db\Migration;

/**
 * Handles adding vk_tw to table `ads`.
 */
class m180105_123253_add_vk_tw_column_to_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('ads', 'post_vk', 'tinyint(1) null default null');
        $this->addColumn('ads', 'post_tw', 'tinyint(1) null default null');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('ads', 'post_vk');
        $this->dropColumn('ads', 'post_tw');
    }
}
