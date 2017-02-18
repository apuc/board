<?php

use yii\db\Migration;

/**
 * Handles adding views to table `news`.
 */
class m170209_171736_add_views_column_to_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('news', 'views', $this->integer(11)->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('news', 'views');
    }
}
