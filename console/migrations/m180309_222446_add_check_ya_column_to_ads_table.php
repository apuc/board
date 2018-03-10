<?php

use yii\db\Migration;

/**
 * Handles adding check_ya to table `ads`.
 */
class m180309_222446_add_check_ya_column_to_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ads', 'check_ya', 'tinyint(1) null default null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('ads', 'check_ya');
    }
}
