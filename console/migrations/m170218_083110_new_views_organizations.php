<?php

use yii\db\Migration;

class m170218_083110_new_views_organizations extends Migration
{
    public function up()
    {
        $this->db->createCommand('DROP VIEW org_info')->query();

        $this->db->createCommand("CREATE VIEW org_info
            AS SELECT `organizations`.*, `category_organizations`.`name` AS category_name,`category_organizations`.`slug` AS category_slug, `category_organizations`.`title` AS category_title, `geobase_city`.`name` AS city_name, `geobase_region`.`name` AS region_name, `parent_cat`.`name` AS category_parent_name, `parent_cat`.`id` AS category_parent_id, `parent_cat`.`slug` AS category_parent_slug, `parent_cat`.`title` AS category_parent_title
            FROM `organizations`
            LEFT JOIN `category_organizations` ON `category_organizations`.`id` = `organizations`.`category_id`
            LEFT JOIN `geobase_city` ON `geobase_city`.`id` = `organizations`.`city_id`
            LEFT JOIN `geobase_region` ON `geobase_region`.`id` = `organizations`.`region_id`
            LEFT JOIN `category_organizations` AS parent_cat ON `parent_cat`.`id` = `category_organizations`.`parent_id")->query();
    }

    public function down()
    {
        return true;
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
