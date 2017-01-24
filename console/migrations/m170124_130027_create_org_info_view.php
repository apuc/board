<?php

use yii\db\Migration;

class m170124_130027_create_org_info_view extends Migration
{
    public function up()
    {
        $this->db->createCommand("CREATE VIEW org_info
            AS SELECT `organizations`.*, `category_organizations`.`name` AS category_name, `geobase_city`.`name` AS city_name, `geobase_region`.`name` AS region_name
            FROM `organizations`
            LEFT JOIN `category_organizations` ON `category_organizations`.`id` = `organizations`.`category_id`
            LEFT JOIN `geobase_city` ON `geobase_city`.`id` = `organizations`.`city_id`
            LEFT JOIN `geobase_region` ON `geobase_region`.`id` = `organizations`.`region_id`")->queryScalar();
    }

    public function down()
    {
        $this->db->createCommand('DROP VIEW org_info')->queryScalar();
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
