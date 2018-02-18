<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stock`.
 */
class m180218_204839_create_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'descr' => $this->text(),
            'icon' => $this->string(255),
            'slug' => $this->string(255),
            'status' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('stock');
    }
}
