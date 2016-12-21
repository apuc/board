<?php

use yii\db\Migration;

/**
 * Handles the creation for table `organizations`.
 */
class m161214_105920_create_organizations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('organizations', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'logo' => $this->string(255),
            'header' => $this->string(255),
            'slug' => $this->string(255),
            'descr' => $this->text()->notNull(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'status' => $this->integer(1)->defaultValue(0),
            'views' => $this->integer(11)->defaultValue(0),
            'region_id' => $this->integer(5),
            'city_id' => $this->integer(5),
            'user_id' => $this->integer(11)->notNull(),
            'mail' => $this->string(255),
            'phone' => $this->string(255),
            'site' => $this->string(255),
            'schedule' => $this->string(255),
            'vip' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('organizations');
    }
}
