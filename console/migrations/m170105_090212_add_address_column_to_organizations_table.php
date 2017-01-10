<?php

use yii\db\Migration;

/**
 * Handles adding address to table `organizations`.
 */
class m170105_090212_add_address_column_to_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('organizations', 'address', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('organizations', 'address');
    }
}
