<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_stock`.
 */
class m180218_205141_create_user_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_stock', [
            'user_id' => $this->integer(11)->unsigned()->unique()->notNull(),
            'stock_id' => $this->integer(11)->unsigned()->unique()->notNull(),
            'code' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_stock');
    }
}
