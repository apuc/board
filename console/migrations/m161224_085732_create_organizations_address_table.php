<?php

use yii\db\Migration;

/**
 * Handles the creation for table `organizations_address`.
 */
class m161224_085732_create_organizations_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('organizations_address', [
            'id' => $this->primaryKey(),
            'organizations_id' => $this->integer(11),
            'region_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'address' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('organizations_address');
    }
}
