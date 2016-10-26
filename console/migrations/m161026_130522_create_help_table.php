<?php

use yii\db\Migration;

/**
 * Handles the creation for table `help`.
 */
class m161026_130522_create_help_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('help', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'slug' => $this->string(255),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'status' => $this->integer(1)->defaultValue(0),
            'views' => $this->integer(11)->defaultValue(0),
            'category_id' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('help');
    }
}
