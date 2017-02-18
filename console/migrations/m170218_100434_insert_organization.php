<?php

use yii\db\Migration;

class m170218_100434_insert_organization extends Migration
{
    public function up()
    {
        $this->delete('category_organizations');

        $this->insert('category_organizations', [
            'id' => 1,
            'name' => 'ЖКХ и благоустройство',
            'icon' => '/media/upload/home-organization-icon/20.png',
            'slug' => 'zhkh-i-blagoustroystvo',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/fence.png',
            'title' => 'ЖКХ и благоустройство: все организации ЖКХ на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 2,
                'name' => 'Жилщно-коммунальные услуги',
                'icon' => '',
                'slug' => 'zhilschno-kommunalnyie-uslugi',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Жилщно-коммунальные услуги все организации ЖКХ на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 3,
                'name' => 'Кладбища',
                'icon' => '',
                'slug' => 'kladbischa',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кладбища на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 4,
                'name' => 'Помощ в организации похорон',
                'icon' => '',
                'slug' => 'pomosch-v-organizatsii-pohoron',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ритуальные услуги на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 5,
                'name' => 'Студенческие общежития',
                'icon' => '',
                'slug' => 'studencheskie-obschezhitiya',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Общежития на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 6,
                'name' => 'Теплоснабжение',
                'icon' => '',
                'slug' => 'teplosnabzhenie',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Организации по теплоснабжению на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 7,
                'name' => 'Энергоснабжение',
                'icon' => '',
                'slug' => 'energosnabzhenie',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Организации по энергоснабжению на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 8,
                'name' => 'Водоснабжение',
                'icon' => '',
                'slug' => 'vodosnabzhenie',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Организации по водоснабжению на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 9,
                'name' => 'Благоустройство улиц',
                'icon' => '',
                'slug' => 'blagoustroystvo-ulits',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Благоустройство улиц на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 10,
                'name' => 'Общественные туалеты',
                'icon' => '',
                'slug' => 'obschestvennyie-tualetyi',
                'parent_id' => 1,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Общественные туалеты на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 11,
            'name' => 'Дом и интерьер',
            'icon' => '/media/upload/home-organization-icon/19.png',
            'slug' => 'dom-i-interer',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/sofa-with-armrest.png',
            'title' => 'Дом и интерьер на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 12,
                'name' => 'Корпусная мебель',
                'icon' => '',
                'slug' => 'korpusnaya-mebel',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Корпусная мебель на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 13,
                'name' => 'Мебель для кухни',
                'icon' => '',
                'slug' => 'mebel-dlya-kuhni',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мебель для кухни на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 14,
                'name' => 'Изготовление мебели под заказ',
                'icon' => '',
                'slug' => 'izgotovlenie-mebeli-pod-zakaz',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Изготовление мебели под заказ на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 15,
                'name' => 'Офисная мебель',
                'icon' => '',
                'slug' => 'ofisnaya-mebel',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'офисная мебель на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 16,
                'name' => 'Мягкая мебель',
                'icon' => '',
                'slug' => 'myagkaya mebel',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мягкая мебель на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 17,
                'name' => 'Детская мебель',
                'icon' => '',
                'slug' => 'detskaya-mebel',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Детская мебель на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 18,
                'name' => 'Мебель для ванных комнат',
                'icon' => '',
                'slug' => 'mebel-dlya-vannyih-komnat',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мебель для ванных комнат на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 19,
                'name' => 'Мебельная фурнитура',
                'icon' => '',
                'slug' => 'mebelnaya-furnitura',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мебельная фурнитура на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 20,
                'name' => 'Матрасы',
                'icon' => '',
                'slug' => 'matrasyi',
                'parent_id' => 11,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Матрасы на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 21,
            'name' => 'Красота и здоровье',
            'icon' => '/media/upload/home-organization-icon/18.png',
            'slug' => 'krasota-i-zdorove',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/lipstick.png',
            'title' => 'Красота и здоровье на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 22,
                'name' => 'Аптеки',
                'icon' => '',
                'slug' => 'apteki',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Аптеки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 23,
                'name' => 'Парикмахерские',
                'icon' => '',
                'slug' => 'parikmaherskie',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Парикмахерские на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 24,
                'name' => 'Ногтевые студии',
                'icon' => '',
                'slug' => 'nogtevyie-studii',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ногтевые студии на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 25,
                'name' => 'Косметика для салонов',
                'icon' => '',
                'slug' => 'kosmetika-dlya-salonov',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Косметика для салонов на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 26,
                'name' => 'Стоматологическе центры',
                'icon' => '',
                'slug' => 'stomatologicheske tsentryi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Стоматологическе центры на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 27,
                'name' => 'Визаж',
                'icon' => '',
                'slug' => 'vizazh',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Визаж на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 27,
                'name' => 'Загар',
                'icon' => '',
                'slug' => 'zagar',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Загар на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 28,
                'name' => 'Наращивание ресниц',
                'icon' => '',
                'slug' => 'naraschivanie resnits',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Наращивание ресниц на RUB-ON.ru',
            ]);
    }

    public function down()
    {
        $this->delete('category_organizations');
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
