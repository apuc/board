<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promokod`.
 */
class m171129_135931_create_promokod_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('promokod', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->string(255),
            'one_time' => $this->integer(1)->defaultValue(0),
            'price' => $this->integer(11)->notNull(),
            'dt_add' => $this->integer(11)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('promokod');
    }
}
