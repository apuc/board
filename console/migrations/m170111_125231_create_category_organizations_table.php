<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category_organizations`.
 */
class m170111_125231_create_category_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category_organizations', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'icon' => $this->string(255)->notNull(),
            'slug' => $this->string(255),
            'parent_id' => $this->integer(11)->defaultValue(0),
            'descr' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category_organizations');
    }
}
