<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170208_115800_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'short_text' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'img' => $this->string(255),
            'slug' => $this->string(255),
            'dt_add' => $this->integer(),
            'dt_update' => $this->integer(),
            'title' => $this->string(255),
            'description' => $this->string(255),
         ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
