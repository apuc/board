<?php

use yii\db\Migration;

/**
 * Handles adding check_google to table `ads`.
 */
class m180310_193810_add_check_google_column_to_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ads', 'check_google', 'tinyint(1) null default null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('ads', 'check_google');
    }
}
