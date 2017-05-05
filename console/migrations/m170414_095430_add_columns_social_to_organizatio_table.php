<?php

use yii\db\Migration;

class m170414_095430_add_columns_social_to_organizatio_table extends Migration
{
    public function up()
    {
        $this->addColumn('organizations', 'link_vk', $this->string(255));
        $this->addColumn('organizations', 'link_google', $this->string(255));
        $this->addColumn('organizations', 'link_fb', $this->string(255));
        $this->addColumn('organizations', 'link_tw', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('organizations', 'link_vk');
        $this->dropColumn('organizations', 'link_google');
        $this->dropColumn('organizations', 'link_fb');
        $this->dropColumn('organizations', 'link_tw');
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
