<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `column_state_ads`.
 */
class m170215_105034_drop_column_state_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('ads','state');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('ads', 'state', $this->integer(5)->defaultValue(0));
    }
}
