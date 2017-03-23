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
                'id' => 28,
                'name' => 'Загар',
                'icon' => '',
                'slug' => 'zagar',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Загар на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 29,
                'name' => 'Наращивание ресниц',
                'icon' => '',
                'slug' => 'naraschivanie-resnits',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Наращивание ресниц на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 30,
                'name' => 'Бровисты',
                'icon' => '',
                'slug' => 'brovistyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бровисты на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 31,
                'name' => 'Косметика/парфюмерия',
                'icon' => '',
                'slug' => 'kosmetika-parfyumeriya',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Косметика/парфюмерия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 32,
                'name' => 'Пластическая хирургия',
                'icon' => '',
                'slug' => 'plasticheskaya-hirurgiya',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Пластическая хирургия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 33,
                'name' => 'Тату салоны',
                'icon' => '',
                'slug' => 'tatu-salonyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Тату салоны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 34,
                'name' => 'Женские консультации',
                'icon' => '',
                'slug' => 'zhenskie-konsultatsii',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Женские консультации на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 35,
                'name' => 'Медицинские анализы',
                'icon' => '',
                'slug' => 'meditsinskie-analizyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Медицинские анализы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 36,
                'name' => 'Массаж',
                'icon' => '',
                'slug' => 'massazh',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Массаж на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 37,
                'name' => 'Косметика ручной работы',
                'icon' => '',
                'slug' => 'kosmetika-ruchnoy-rabotyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Косметика ручной работы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 38,
                'name' => 'Средства гигиены',
                'icon' => '',
                'slug' => 'sredstva-gigienyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Средства гигиены на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 39,
                'name' => 'Контактные линзы',
                'icon' => '',
                'slug' => 'kontaktnyie-linzyi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Контактные линзы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 40,
                'name' => 'Спа процедуры',
                'icon' => '',
                'slug' => 'spa-protseduryi',
                'parent_id' => 21,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Спа процедуры на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 41,
            'name' => ' Перевозки',
            'icon' => '/media/upload/home-organization-icon/17.png',
            'slug' => 'perevozki',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/sports-car.png',
            'title' => ' Перевозки на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 42,
                'name' => 'Междугородние перевозки',
                'icon' => '',
                'slug' => 'mezhdugorodnie-perevozki',
                'parent_id' => 41,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Междугородние перевозки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 43,
                'name' => 'Такси',
                'icon' => '',
                'slug' => 'taksi',
                'parent_id' => 41,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Такси на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 44,
                'name' => 'Межрегиональные перевозки',
                'icon' => '',
                'slug' => 'mezhregionalnyie-perevozki',
                'parent_id' => 41,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Межрегиональные перевозки на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 45,
            'name' => 'Юриспруденция и право',
            'icon' => '/media/upload/home-organization-icon/16.png',
            'slug' => 'yurisprudentsiya-i-pravo',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/lawyer.png',
            'title' => 'Юриспруденция и право на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 46,
                'name' => 'Нотариусы',
                'icon' => '',
                'slug' => 'notariusyi',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Нотариусы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 47,
                'name' => 'Ломбарды',
                'icon' => '',
                'slug' => 'lombardyi',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ломбарды на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 48,
                'name' => 'Страхование',
                'icon' => '',
                'slug' => 'strahovanie',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Страхование на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 49,
                'name' => 'Таможенное оформление',
                'icon' => '',
                'slug' => 'tamozhennoe-oformlenie',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Таможенное оформление на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 50,
                'name' => 'Юристы',
                'icon' => '',
                'slug' => 'yuristyi',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Юристы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 51,
                'name' => 'Бухгатлерские услуги',
                'icon' => '',
                'slug' => 'buhgatlerskie-uslugi',
                'parent_id' => 45,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бухгатлерские услуги на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 52,
            'name' => 'Охрана и безопастность',
            'icon' => '/media/upload/home-organization-icon/15.png',
            'slug' => 'ohrana-i-bezopastnost',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/security-camera.png',
            'title' => 'Охрана и безопастность на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 53,
                'name' => 'Домофоны',
                'icon' => '',
                'slug' => 'domofonyi',
                'parent_id' => 52,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Домофоны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 54,
                'name' => 'Системы охраны',
                'icon' => '',
                'slug' => 'sistemyi-ohranyi',
                'parent_id' => 52,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Системы охраны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 55,
                'name' => 'Услуги охраны',
                'icon' => '',
                'slug' => 'uslugi-ohranyi',
                'parent_id' => 52,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги охраны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 56,
                'name' => 'Вневедомственная охрана',
                'icon' => '',
                'slug' => 'vnevedomstvennaya-ohrana',
                'parent_id' => 52,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Вневедомственная охрана на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 57,
            'name' => 'Недвижиммость',
            'icon' => '/media/upload/home-organization-icon/14.png',
            'slug' => 'nedvizhimmost',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/mortgage.png',
            'title' => 'Недвижиммость на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 58,
                'name' => 'Бюро технической инвентаризации',
                'icon' => '',
                'slug' => 'byuro-tehnicheskoy-inventarizatsii',
                'parent_id' => 57,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бюро технической инвентаризации на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 59,
                'name' => 'Агентства недвижимости',
                'icon' => '',
                'slug' => 'agentstva-nedvizhimosti',
                'parent_id' => 57,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Агентства недвижимости на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 60,
            'name' => 'Рестораны и кафе',
            'icon' => '/media/upload/home-organization-icon/13.png',
            'slug' => 'restoranyi-i-kafet',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/restaurant.png',
            'title' => 'Рестораны и кафе на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 61,
                'name' => 'Кафе',
                'icon' => '',
                'slug' => 'kafe',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кафе на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 62,
                'name' => 'Кофейня/ кондитерская',
                'icon' => '',
                'slug' => 'kofeynya-konditerskaya',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кофейня/ кондитерская на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 63,
                'name' => 'Суши -бары',
                'icon' => '',
                'slug' => 'sushi-baryi',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Суши -бары  на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 64,
                'name' => 'Рестораны',
                'icon' => '',
                'slug' => 'restoranyi',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Рестораны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 65,
                'name' => 'Бары',
                'icon' => '',
                'slug' => 'baryi',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бары на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 66,
                'name' => 'Пиццерии',
                'icon' => '',
                'slug' => 'pitstserii',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Пиццерии на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 67,
                'name' => 'Кафе/рестораны быстрого питания',
                'icon' => '',
                'slug' => 'kafe-restoranyi-byistrogo-pitaniya',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кафе/рестораны быстрого питания на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 68,
                'name' => 'Столовые',
                'icon' => '',
                'slug' => 'stolovyie',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Столовые на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 69  ,
                'name' => 'Доставка готовых блюд',
                'icon' => '',
                'slug' => 'dostavka-gotovyih-blyud',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Доставка готовых блюд на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 70  ,
                'name' => 'Банкетные залы',
                'icon' => '',
                'slug' => 'banketnyie-zalyi',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Банкетные залы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 71  ,
                'name' => 'Рюмочные',
                'icon' => '',
                'slug' => 'ryumochnyie',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Рюмочные на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 72,
                'name' => 'Чайные клубы',
                'icon' => '',
                'slug' => 'chaynyie-klubyi',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Чайные клубы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 73,
                'name' => 'Кулинария',
                'icon' => '',
                'slug' => 'kulinariya',
                'parent_id' => 60,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кулинария на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 74,
            'name' => 'Путешествия и туризм',
            'icon' => '/media/upload/home-organization-icon/12.png',
            'slug' => 'puteshestviya-i-turizm',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/transport.png',
            'title' => 'Путешествия и туризм на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 75,
                'name' => 'Гостиницы',
                'icon' => '',
                'slug' => 'gostinitsyi',
                'parent_id' => 74,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Гостиницы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 76,
                'name' => 'Туристические агенства',
                'icon' => '',
                'slug' => 'turisticheskie-agenstva',
                'parent_id' => 74,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Туристические агенства на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 77,
                'name' => 'Товары для рыбалки',
                'icon' => '',
                'slug' => 'tovaryi-dlya-ryibalki',
                'parent_id' => 74,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Товары для рыбалки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 78,
                'name' => 'Товары для охоты',
                'icon' => '',
                'slug' => 'tovaryi-dlya-ohotyi',
                'parent_id' => 74,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Товары для охоты на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 79,
                'name' => 'Гостиницы для животных',
                'icon' => '',
                'slug' => 'gostinitsyi-dlya-zhivotnyih',
                'parent_id' => 74,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Гостиницы для животных на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 80,
            'name' => 'Услуги',
            'icon' => '/media/upload/home-organization-icon/11.png',
            'slug' => 'uslugi',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/information.png',
            'title' => 'Услуги на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 81,
                'name' => 'Прокат свадебных платьев',
                'icon' => '',
                'slug' => 'prokat-svadebnyih-platev',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Прокат свадебных платьев на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 82,
                'name' => 'Фото на документы',
                'icon' => '',
                'slug' => 'foto-na-dokumentyi',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Фото на документы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 83,
                'name' => 'Ателье швейное',
                'icon' => '',
                'slug' => 'atele-shveynoe',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ателье швейное на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 84,
                'name' => 'Изготовление ключей',
                'icon' => '',
                'slug' => 'izgotovlenie-klyuchey',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Изготовление ключей на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 85,
                'name' => 'Услуги системного администрирования',
                'icon' => '',
                'slug' => 'uslugi-sistemnogo-administrirovaniya',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги системного администрирования на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 86,
                'name' => 'Химчистки',
                'icon' => '',
                'slug' => 'himchistki',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Химчистки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 87,
                'name' => 'Платежные терминалы',
                'icon' => '',
                'slug' => 'platezhnyie-terminalyi',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Платежные терминалы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 88,
                'name' => 'Услуги вышивки',
                'icon' => '',
                'slug' => 'uslugi-vyishivki',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги вышивки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 89,
                'name' => 'Сборка мебели',
                'icon' => '',
                'slug' => 'sborka-mebeli',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Сборка мебели на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 90,
                'name' => 'Прачечные',
                'icon' => '',
                'slug' => 'prachechnyie',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Прачечные на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 91,
                'name' => 'Уборка помещений и офисов',
                'icon' => '',
                'slug' => 'uborka-pomescheniy-i-ofisov',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Уборка помещений и офисов на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 92,
                'name' => 'Косметические услуги',
                'icon' => '',
                'slug' => 'kosmeticheskie-uslugi',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Косметические услуги на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 93,
                'name' => 'Вскрытие замков',
                'icon' => '',
                'slug' => 'vskryitie-zamkov',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Вскрытие замков на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 94,
                'name' => 'Услуги онколога',
                'icon' => '',
                'slug' => 'uslugi-onkologa',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги онколога на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 95,
                'name' => 'Услуги офтальмолога',
                'icon' => '',
                'slug' => 'uslugi-oftalmologa',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги офтальмолога на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 96,
                'name' => 'Услуги росписи по телу',
                'icon' => '',
                'slug' => 'uslugi-rospisi-po-telu',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги росписи по телу на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 97,
                'name' => 'Услуги гинеколога',
                'icon' => '',
                'slug' => 'uslugi-ginekologa',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги гинеколога на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 98,
                'name' => 'Услуги детских специалистов',
                'icon' => '',
                'slug' => 'uslugi-detskih-spetsialistov',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги детских специалистов на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 99,
                'name' => 'Услуги психолога',
                'icon' => '',
                'slug' => 'uslugi-psihologa',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги психолога на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 100,
                'name' => 'Услуги фото /видео съемки на выезде',
                'icon' => '',
                'slug' => 'uslugi-foto-video-semki-na-vyiezde',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги фото /видео съемки на выезде на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 101,
                'name' => 'Услуги хирурга',
                'icon' => '',
                'slug' => 'uslugi-hirurga',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги хирурга на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 102,
                'name' => 'Полиграфические услуги',
                'icon' => '',
                'slug' => 'poligraficheskie-uslugi',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Полиграфические услуги на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 103,
                'name' => 'Услуги гравировки',
                'icon' => '',
                'slug' => 'uslugi-gravirovki',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги гравировки  на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 104,
                'name' => 'Услуги по уходу за животными',
                'icon' => '',
                'slug' => 'uslugi-po-uhodu-za-zhivotnyimi',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Услуги по уходу за животными на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 105,
                'name' => 'Доставка цветов',
                'icon' => '',
                'slug' => 'dostavka-tsvetov',
                'parent_id' => 80,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Доставка цветов на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 106,
            'name' => 'Одежда и обувь',
            'icon' => '/media/upload/home-organization-icon/10.png',
            'slug' => 'odezhda-i-obuv',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/hanger.png',
            'title' => 'Одежда и обувь на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 107,
                'name' => 'Сумки',
                'icon' => '',
                'slug' => 'sumki',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Сумки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 108,
                'name' => 'Детская одежда',
                'icon' => '',
                'slug' => 'detskaya-odezhda',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Детская одежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 109,
                'name' => 'Товары для новорожденных',
                'icon' => '',
                'slug' => 'tovaryi-dlya-novorozhdennyih',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Товары для новорожденных на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 110,
                'name' => 'Женская одежда',
                'icon' => '',
                'slug' => 'zhenskaya-odezhda',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Женская одежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 111,
                'name' => 'Мужская одежда',
                'icon' => '',
                'slug' => 'muzhskaya-odezhda',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мужская одежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 112,
                'name' => 'Обувные магазины',
                'icon' => '',
                'slug' => 'obuvnyie-magazinyi',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Обувные магазины на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 113,
                'name' => 'Секонд-хенд',
                'icon' => '',
                'slug' => 'sekond-hend',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Секонд-хенд на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 114,
                'name' => 'Детская обувь',
                'icon' => '',
                'slug' => 'detskaya-obuv',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Детская обувь на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 115,
                'name' => 'Спецодежда',
                'icon' => '',
                'slug' => 'spetsodezhda',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Спецодежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 116,
                'name' => 'Меха/кожа',
                'icon' => '',
                'slug' => 'meha-kozha',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Меха/кожа на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 117,
                'name' => 'Верхняя одежда',
                'icon' => '',
                'slug' => 'verhnyaya-odezhda',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Верхняя одежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 118,
                'name' => 'Для беременных',
                'icon' => '',
                'slug' => 'dlya-beremennyih',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Для беременных на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 119,
                'name' => 'Свадебные товары',
                'icon' => '',
                'slug' => 'svadebnyie-tovaryi',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Свадебные товары на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 120,
                'name' => 'Чулочно-носочные изделия',
                'icon' => '',
                'slug' => 'chulochno-nosochnyie-izdeliya',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Чулочно-носочные изделия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 121,
                'name' => 'Головные уборы',
                'icon' => '',
                'slug' => 'golovnyie-uboryi',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Головные уборы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 122,
                'name' => 'Спецобувь',
                'icon' => '',
                'slug' => 'spetsobuv',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Спецобувь на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 123,
                'name' => 'Нижнее белье',
                'icon' => '',
                'slug' => 'spetsobuv',
                'parent_id' => 106,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Нижнее белье на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 124,
            'name' => 'Трансопрт',
            'icon' => '/media/upload/home-organization-icon/9.png',
            'slug' => 'transoprt',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/car-wheel.png',
            'title' => 'Трансопрт на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 125,
                'name' => 'Пассажирские перевозки',
                'icon' => '',
                'slug' => 'passazhirskie-perevozki',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Пассажирские перевозки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 126,
                'name' => 'Зоотакси',
                'icon' => '',
                'slug' => 'zootaksi',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Зоотакси на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 127,
                'name' => 'Гаражные кооперативы',
                'icon' => '',
                'slug' => 'garazhnyie-kooperativyi',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Гаражные кооперативы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 128,
                'name' => 'Продажа автомобилей',
                'icon' => '',
                'slug' => 'prodazha-avtomobiley',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Продажа автомобилей на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 129,
                'name' => 'Заказ автобусов',
                'icon' => '',
                'slug' => 'prodazha-avtomobiley',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Продажа автомобилей на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 130,
                'name' => 'СТО',
                'icon' => '',
                'slug' => 'sto',
                'parent_id' => 124,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'СТО на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 131,
            'name' => 'Спорт',
            'icon' => '/media/upload/home-organization-icon/8.png',
            'slug' => 'sport',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/target-small.png',
            'title' => 'Спорт на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 132,
                'name' => 'Cпортивная одежда',
                'icon' => '',
                'slug' => 'sportivnaya-odezhda',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Cпортивная одежда на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 133,
                'name' => 'Тренажерные залы',
                'icon' => '',
                'slug' => 'trenazhernyie-zalyi',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Тренажерные залы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 134,
                'name' => 'Спортивное питание',
                'icon' => '',
                'slug' => 'sportivnoe-pitanie',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Спортивное питание на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 135,
                'name' => 'Спортивный инвентарь',
                'icon' => '',
                'slug' => 'sportivnyiy-inventar',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Спортивный инвентарь на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 136,
                'name' => 'Фитнес-клубы',
                'icon' => '',
                'slug' => 'fitnes-klubyi',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Фитнес-клубы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 137,
                'name' => 'Бассейны',
                'icon' => '',
                'slug' => 'basseynyi',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бассейны на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 138,
                'name' => 'Прокат спортивного инвентаря',
                'icon' => '',
                'slug' => 'prokat-sportivnogo-inventarya',
                'parent_id' => 131,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Прокат спортивного инвентаря на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 139,
            'name' => 'Строительство',
            'icon' => '/media/upload/home-organization-icon/7.png',
            'slug' => 'stroitelstvo',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/shopping-basket.png',
            'title' => 'Строительство на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 140,
                'name' => 'Строительные магазины',
                'icon' => '',
                'slug' => 'stroitelnyie-magazinyi',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Строительные магазины на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 141,
                'name' => 'Электротехника',
                'icon' => '',
                'slug' => 'elektrotehnika',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Электротехника на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 142,
                'name' => 'Бассейны, сауны, камины',
                'icon' => '',
                'slug' => 'basseynyi-saunyi-kaminyi',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бассейны, сауны, камины на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 143,
                'name' => 'Архитектурные и проектные работы',
                'icon' => '',
                'slug' => 'arhitekturnyie-i-proektnyie-rabotyi',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Архитектурные и проектные работы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 144,
                'name' => 'Сельхоз строительство',
                'icon' => '',
                'slug' => 'selhoz-stroitelstvo',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Сельхоз строительство на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 145,
                'name' => 'Промышленное строительство',
                'icon' => '',
                'slug' => 'promyishlennoe-stroitelstvo',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Промышленное строительство на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 146,
                'name' => 'Дома, дачи, коттеджи, объекты',
                'icon' => '',
                'slug' => 'doma-dachi-kottedzhi-obektyi',
                'parent_id' => 139,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Дома, дачи, коттеджи, объекты на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 147,
            'name' => 'Ремонт',
            'icon' => '/media/upload/home-organization-icon/6.png',
            'slug' => 'remont',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/repairing-service.png',
            'title' => 'Ремонт на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 148,
                'name' => 'Ремонт мобильных телефонов',
                'icon' => '',
                'slug' => 'remont-mobilnyih-telefonov',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт мобильных телефонов на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 149,
                'name' => 'Ремонт часов',
                'icon' => '',
                'slug' => 'remont-chasov',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт часов на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 150,
                'name' => 'Ремонт очков',
                'icon' => '',
                'slug' => 'remont-ochkov',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт очков на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 151,
                'name' => 'Ремонт бытовой техники',
                'icon' => '',
                'slug' => 'remont-byitovoy-tehniki',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт бытовой техники на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 152,
                'name' => 'Ремонт аудио/видео /цифровой техники',
                'icon' => '',
                'slug' => 'remont-audio-video-tsifrovoy-tehniki',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт аудио/видео /цифровой техники на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 153,
                'name' => 'Ремонт компьютеров',
                'icon' => '',
                'slug' => 'remont-kompyuterov',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт компьютеров на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 154,
                'name' => 'Ремонт оргтехники',
                'icon' => '',
                'slug' => 'remont-orgtehniki',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт оргтехники на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 155,
                'name' => 'Ремонт мебели',
                'icon' => '',
                'slug' => 'remont-mebeli',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт мебели на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 156,
                'name' => 'Ремонт медицинского оборудования',
                'icon' => '',
                'slug' => 'remont-meditsinskogo-oborudovaniya',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт медицинского оборудования на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 157,
                'name' => 'Ремонт обуви',
                'icon' => '',
                'slug' => 'remont-obuvi',
                'parent_id' => 147,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ремонт обуви на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 158,
            'name' => 'Торговля',
            'icon' => '/media/upload/home-organization-icon/4.png',
            'slug' => 'torgovlya',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/shopping-basket.png',
            'title' => 'Торговля на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 159,
                'name' => 'ЛСП/ДСП/МДФ',
                'icon' => '',
                'slug' => 'lsp-dsp-mdf',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'ЛСП/ДСП/МДФ на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 160,
                'name' => 'Сейфы',
                'icon' => '',
                'slug' => 'seyfyi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Сейфы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 161,
                'name' => 'Игрушки',
                'icon' => '',
                'slug' => 'igrushki',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Игрушки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 162,
                'name' => 'Бижутерия',
                'icon' => '',
                'slug' => 'bizhuteriya',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бижутерия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 163,
                'name' => 'Кондитерские изделия',
                'icon' => '',
                'slug' => 'konditerskie-izdeliya',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Кондитерские изделия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 164,
                'name' => 'Овощи/фрукты',
                'icon' => '',
                'slug' => 'ovoschi-fruktyi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Овощи/фрукты на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 165,
                'name' => 'Чай/кофе',
                'icon' => '',
                'slug' => 'chay-kofe',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Чай/кофе на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 166,
                'name' => 'Табачные изделия',
                'icon' => '',
                'slug' => 'tabachnyie-izdeliya',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Табачные изделия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 167,
                'name' => 'Алкогольные напитки',
                'icon' => '',
                'slug' => 'alkogolnyie-napitki',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Алкогольные напитки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 168,
                'name' => 'Хлебобулочные изделия',
                'icon' => '',
                'slug' => 'hlebobulochnyie-izdeliya',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Хлебобулочные изделия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 169,
                'name' => 'Питьевая вода',
                'icon' => '',
                'slug' => 'pitevaya-voda',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Питьевая вода на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 170,
                'name' => 'Мясо',
                'icon' => '',
                'slug' => 'myaso',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Мясо на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 171,
                'name' => 'Магазины розливного пива',
                'icon' => '',
                'slug' => 'magazinyi-rozlivnogo-piva',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Магазины розливного пива на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 172,
                'name' => 'Ткани',
                'icon' => '',
                'slug' => 'tkani',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Ткани на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 173,
                'name' => 'Швейная фурнитура',
                'icon' => '',
                'slug' => 'shveynaya-furnitura',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Швейная фурнитура на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 174,
                'name' => 'Постельное белье',
                'icon' => '',
                'slug' => 'postelnoe-bele',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Постельное белье на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 175,
                'name' => 'Жалюзи',
                'icon' => '',
                'slug' => 'zhalyuzi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Жалюзи на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 176,
                'name' => 'Цветы',
                'icon' => '',
                'slug' => 'tsvetyi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Цветы на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 177,
                'name' => 'Эротические товары',
                'icon' => '',
                'slug' => 'eroticheskie-tovaryi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Эротические товары на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 178,
                'name' => 'Книги',
                'icon' => '',
                'slug' => 'knigi',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Книги на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 179,
                'name' => 'Бытовая химия',
                'icon' => '',
                'slug' => 'byitovaya-himiya',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Бытовая химия на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 180,
                'name' => 'Аксессуары к мобильным телефонам',
                'icon' => '',
                'slug' => 'aksessuaryi-k-mobilnyim-telefonam',
                'parent_id' => 158,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Аксессуары к мобильным телефонам на RUB-ON.ru',
            ]);
        $this->insert('category_organizations', [
            'id' => 181,
            'name' => 'Культура и искусство',
            'icon' => '/media/upload/home-organization-icon/3.png',
            'slug' => 'torgovlya',
            'parent_id' => 0,
            'descr' => '<p>Описание</p>',
            'small_icon' => '/media/upload/organization-icon/bow-tie.png',
            'title' => 'Культура и искусство на RUB-ON.ru',
        ]);
            $this->insert('category_organizations', [
                'id' => 182,
                'name' => 'Храмы соборы/церкви',
                'icon' => '',
                'slug' => 'hramyi-soboryi-tserkvi',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Храмы соборы/церкви на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 183,
                'name' => 'Художественные товары',
                'icon' => '',
                'slug' => 'hudozhestvennyie-tovaryi',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Художественные товары на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 184,
                'name' => 'Библиотеки',
                'icon' => '',
                'slug' => 'biblioteki',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Библиотеки на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 185,
                'name' => 'Музеи',
                'icon' => '',
                'slug' => 'muzei',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Музеи на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 186,
                'name' => 'Театры',
                'icon' => '',
                'slug' => 'teatryi',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Театры на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 187,
                'name' => 'Планетарий',
                'icon' => '',
                'slug' => 'planetariy',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Планетарий на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 188,
                'name' => 'Филармония',
                'icon' => '',
                'slug' => 'filarmoniya',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Филармония на RUB-ON.ru',
            ]);
            $this->insert('category_organizations', [
                'id' => 189,
                'name' => 'антиквариат',
                'icon' => '',
                'slug' => 'antikvariat',
                'parent_id' => 181,
                'descr' => '<p>Описание</p>',
                'small_icon' => '',
                'title' => 'Антиквариат на RUB-ON.ru',
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
