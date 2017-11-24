<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ads_dop_status`.
 */
class m171124_082854_create_ads_dop_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ads_dop_status', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer(11)->notNull(),
            'ads_id' => $this->integer(11)->notNull(),
            'dt_add' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'ads_dop_status_to_status_fk',
            'ads_dop_status',
            'status_id',
            'status',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'ads_dop_status_to_ads_fk',
            'ads_dop_status',
            'ads_id',
            'ads',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('ads_dop_status_to_status_fk', 'ads_dop_status');
        $this->dropForeignKey('ads_dop_status_to_ads_fk', 'ads_dop_status');
        $this->dropTable('ads_dop_status');
    }
}
