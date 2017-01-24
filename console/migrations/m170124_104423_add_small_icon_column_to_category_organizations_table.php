<?php

use yii\db\Migration;

/**
 * Handles adding small_icon to table `category_organizations`.
 */
class m170124_104423_add_small_icon_column_to_category_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('category_organizations', 'small_icon', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('category_organizations', 'small_icon');
    }
}
