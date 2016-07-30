<?php

use yii\db\Migration;

class m160728_124309_status_table_filling extends Migration
{
    public function up()
    {
        $this->delete('ads');
        $this->delete('status');
        $this->insert('status',[
            'id' => 1,
            'name' => 'На модерации',
        ]);
        $this->insert('status',[
            'id' => 2,
            'name' => 'Опубликованно',
        ]);
        $this->insert('status',[
            'id' => 3,
            'name' => 'Удалено',
        ]);
        $this->insert('status',[
            'id' => 4,
            'name' => 'VIP',
        ]);
        $this->insert('status',[
            'id' => 5,
            'name' => 'Снято с публикации',
        ]);

        $this->insert('ads', [
            'id' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'dt_add' => 11111,
            'dt_update' => 111,
            'title' => 'Не удалять',
            'content' => 'ssss',
            'slug' => 'sss',
            'status' => 3,
            'cover' => '',
            'region_id' => 1,
            'city_id' => 1,
            'state' => 1,
        ]);


    }

    public function down()
    {
        $this->delete('ads');
        $this->delete('status');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
