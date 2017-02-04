<?php

use yii\db\Migration;

class m170125_173629_add_columns_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('category', 'title', $this->string(255)->notNull());
    }

    public function down()
    {
        $this->dropColumn('category', 'title');
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
