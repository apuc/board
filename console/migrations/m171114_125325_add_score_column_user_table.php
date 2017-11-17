<?php

use yii\db\Migration;

/**
 * Class m171114_125325_add_score_column_user_table
 */
class m171114_125325_add_score_column_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'score', $this->double(11)->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'score');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171114_125325_add_score_column_user_table cannot be reverted.\n";

        return false;
    }
    */
}
