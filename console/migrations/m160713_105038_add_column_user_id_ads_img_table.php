<?php

use yii\db\Migration;

class m160713_105038_add_column_user_id_ads_img_table extends Migration
{
    public function up()
    {
        $this->addColumn('ads_img', 'user_id', \yii\db\Schema::TYPE_INTEGER . '(11) NOT NULL');
    }

    public function down()
    {

        $this->dropColumn('ads_img', 'user_id');
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
