<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_score`.
 */
class m171115_095831_create_user_score_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_score', [
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'deb_kred' => $this->integer(1)->notNull(),
            'sum' => $this->double()->notNull(),
            'dt_add' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_score');
    }
}
