<?php

use yii\db\Migration;

/**
 * Class m171106_090948_add_column_pars_ads_table
 */
class m171106_090948_add_column_pars_ads_table extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('ads', 'pars', $this->integer(1)->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('ads', 'pars');
    }

}
