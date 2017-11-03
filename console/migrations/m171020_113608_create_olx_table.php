<?php

use yii\db\Migration;

/**
 * Handles the creation of table `olx`.
 */
class m171020_113608_create_olx_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('olx', [
            'id' => $this->primaryKey(),
            'id_ads' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auto_ria');
    }
}
