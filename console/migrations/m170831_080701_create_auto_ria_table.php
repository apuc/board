<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auto_ria`.
 */
class m170831_080701_create_auto_ria_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auto_ria', [
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
