<?php

use yii\db\Migration;

class m170218_082704_alter_column_icon_category_organizations_table extends Migration
{
    public function up()
    {
        $this->alterColumn('category_organizations','icon', $this->string(255));
    }

    public function down()
    {
        return true;
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
