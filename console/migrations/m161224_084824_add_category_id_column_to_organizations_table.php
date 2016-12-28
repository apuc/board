<?php

use yii\db\Migration;

/**
 * Handles adding category_id to table `organizations`.
 */
class m161224_084824_add_category_id_column_to_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('organizations', 'category_id', $this->integer(11)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('organizations', 'category_id');
    }
}
