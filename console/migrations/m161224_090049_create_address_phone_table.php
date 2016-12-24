<?php

use yii\db\Migration;

/**
 * Handles the creation for table `address_phone`.
 */
class m161224_090049_create_address_phone_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address_phone', [
            'id' => $this->primaryKey(),
            'organizations_id' => $this->integer(11),
            'address_id' => $this->integer(11),
            'phone' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('address_phone');
    }
}
