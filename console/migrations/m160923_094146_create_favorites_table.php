<?php

use yii\db\Migration;

/**
 * Handles the creation for table `favorites`.
 */
class m160923_094146_create_favorites_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('favorites', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'gist' => $this->string(255)->notNull(),
            'gist_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('favorites');
    }
}
