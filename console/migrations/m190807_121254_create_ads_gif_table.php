<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ads_gif}}`.
 */
class m190807_121254_create_ads_gif_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

        $this->createTable('{{%ads_gif}}', [
            'id' => $this->primaryKey(),
			'ads_id'	=>	$this->integer(),
			'user_id'	=>	$this->integer()->notNull()->unsigned(),
			'img'		=>	$this->string()->notNull(),
			'img_small'	=>	$this->string()->notNull(),
			'img_thumb'	=>	$this->string()->notNull(),
        ], $tableOptions);

		$this->addForeignKey(
			'ads_gif_ads_fk',
			'ads_gif',
			'ads_id',
			'ads',
			'id',
			'RESTRICT',
			'CASCADE'
		);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropForeignKey('ads_gif_ads_fk', 'ads_gif');
		$this->dropTable('{{%ads_gif}}');
	}
}
