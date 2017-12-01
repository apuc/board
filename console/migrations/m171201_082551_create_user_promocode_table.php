<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_promocode`.
 */
class m171201_082551_create_user_promocode_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_promocode', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'code_id' => $this->integer(11)->notNull(),
            'dt_add' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'user_promocode_to_user_fk',
            'user_promocode',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'user_promocode_to_promocode_fk',
            'user_promocode',
            'code_id',
            'promokod',
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
        $this->dropForeignKey('user_promocode_to_user_fk', 'user_promocode');
        $this->dropForeignKey('user_promocode_to_promocode_fk', 'user_promocode');
        $this->dropTable('user_promocode');
    }
}
