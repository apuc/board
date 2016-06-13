<?php

use yii\db\Migration;

/**
 * Handles the creation for table `edit_columt_parent_id_category_table`.
 */
class m160611_194703_create_edit_columt_parent_id_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->alterColumn('category', 'parent_id', \yii\db\Schema::TYPE_INTEGER . '(11) DEFAULT 0');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        return true;
    }
}
