<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site_access_api`.
 */
class m170911_104749_create_site_access_api_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('site_access_api', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'mail' => $this->string(255)->notNull(),
            'site' => $this->string(255)->notNull(),
            'visible_ads' => $this->integer(1)->defaultValue(1),
            'api_key' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('site_access_api');
    }
}
