<?php

use yii\db\Migration;

/**
 * Class m171124_071719_insert_status_table
 */
class m171124_071719_insert_status_table extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->insert('status',[
            'id' => 7,
            'name' => 'Выделенное объявление',
        ]);

        $this->insert('status',[
            'id' => 8,
            'name' => 'Поднятое объявление',
        ]);
    }

    public function down()
    {
        $this->delete('status', [
            'name' => 'Выделенное объявление'
        ]);

        $this->delete('status', [
            'name' => 'Поднятое объявление'
        ]);
    }

}
