<?php

use yii\db\Migration;

/**
 * Handles the creation for table `msg`.
 */
class m170319_182319_create_msg_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('msg', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'status' => $this->integer(2)->defaultValue(0),
            'read' => $this->integer(1)->defaultValue(0),
            'message' => $this->text(),
            'to' => $this->integer(11),
            'from' => $this->integer(11),
            'is_del_to' => $this->integer(11),
            'is_del_from' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('msg');
    }
}
