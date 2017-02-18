<?php

use yii\db\Migration;

class m170218_080228_add_title_column_category_organizations_table extends Migration
{
    public function up()
    {
        $this->addColumn('category_organizations', 'title', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('category_organizations', 'title');
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
