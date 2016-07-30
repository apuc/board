<?php

use yii\db\Migration;

class m160725_095544_filling_additional_fields_for_categories extends Migration
{
    public function up()
    {   /*$this->delete('ads_fields_group_ads_fields');
        $this->delete('category_group_ads_fields');
        $this->delete('ads_fields_default_value');
        $this->delete('ads_fields');

        $this->delete('group_ads_fields');*/

//ДЕТСКИЙ МИР
        $this->alterColumn('ads_fields', 'template', \yii\db\Schema::TYPE_STRING . '(255) DEFAULT NULL');
        //Группа поле ДЕТСКИЙ МИР/ДЕТСКАЯ ОДЕЖДА/
        $this->insert('group_ads_fields', [
            'id' => 1,
            'name' => 'Детский мир ОДЕЖДА/ОБУВЬ',
        ]);

            //Добовление полей
            $this->insert('ads_fields', [
                'id' => 1,
                'type_id' => 3,
                'label' => 'Размер',
                'name' => 'size',
                'hint' => 'Укажите размер'
            ]);
            //Связь между категорией и группой полей
            $this->insert('category_group_ads_fields', [
                'category_id' => 346,
                'group_ads_fields_id' => 1,
            ]);
            $this->insert('category_group_ads_fields', [
                'category_id' => 347,
                'group_ads_fields_id' => 1,
            ]);
            $this->insert('category_group_ads_fields', [
                'category_id' => 348,
                'group_ads_fields_id' => 1,
            ]);
            $this->insert('category_group_ads_fields', [
                'category_id' => 349,
                'group_ads_fields_id' => 1,
            ]);


            //Связь между группой полей и полем
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 1,
                'group_ads_fields_id' => 1,
            ]);


        //Категория недвижимость

        //Поля
        $this->insert('ads_fields', [
            'id' => 2,
            'type_id' => 3,
            'label' => 'Количество комнат',
            'name' => 'kol-kom',
            'hint' => 'Укажите количество комнат'
        ]);
        $this->insert('ads_fields', [
            'id' => 3,
            'type_id' => 3,
            'label' => 'Жилая площадь м<sup>2</sup>',
            'name' => 'zilplosad',
            'hint' => 'Укажите жилую площадь в м<sup>2</sup>'
        ]);
        $this->insert('ads_fields', [
            'id' => 4,
            'type_id' => 3,
            'label' => 'Общая площадь м<sup>2</sup>',
            'name' => '',
            'hint' => 'Укажите общую площадь в м<sup>2</sup>'
        ]);
        $this->insert('ads_fields', [
            'id' => 5,
            'type_id' => 3,
            'label' => 'Этаж',
            'name' => 'etag',
            'hint' => 'Укажите этаж на котором находится квартира'
        ]);
        $this->insert('ads_fields', [
            'id' => 6,
            'type_id' => 3,
            'label' => 'Этажность дома',
            'name' => 'etagDom',
            'hint' => 'Укажите количество этажей в доме'
        ]);
        $this->insert('ads_fields', [
            'id' => 7,
            'type_id' => 4,
            'label' => 'Тип',
            'name' => 'typeDom',
            'hint' => 'Укажите тип дома'
        ]);
            //Значения по умолчанию для типа дома
            $this->insert('ads_fields_default_value',[
                'value' => 'Кирпичный',
                'ads_field_id' => '7',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Панельный',
                'ads_field_id' => '7',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Монолитный',
                'ads_field_id' => '7',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Блочный',
                'ads_field_id' => '7',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Деревянный',
                'ads_field_id' => '7',
            ]);

        $this->insert('ads_fields', [
            'id' => 8,
            'type_id' => 3,
            'label' => 'Всего комнат в квартире',
            'name' => 'vsegoKomnaat',
            'hint' => 'Укажите сколь комнат в квартире'
        ]);
        $this->insert('ads_fields', [
            'id' => 9,
            'type_id' => 3,
            'label' => 'Удалённость от города, км',
            'name' => 'ydalotgoroda',
            'hint' => 'Укажите удалённость от города в км'
        ]);
        $this->insert('ads_fields', [
            'id' => 10,
            'type_id' => 3,
            'label' => 'Площадь дома м<sup>2</sup>',
            'name' => 'plosaddoma',
            'hint' => 'Укажите площадь дома в м<sup>2</sup>'
        ]);
        $this->insert('ads_fields', [
            'id' => 11,
            'type_id' => 3,
            'label' => 'Площадь кухни м<sup>2</sup>',
            'name' => 'plosadkuhni',
            'hint' => 'Укажите площадь кухни в м<sup>2</sup>'
        ]);
        $this->insert('ads_fields', [
            'id' => 12,
            'type_id' => 3,
            'label' => 'Площадь м<sup>2</sup>',
            'name' => 'ploshad',
            'hint' => 'Укажите площадь в м<sup>2</sup>'
        ]);
        $this->insert('ads_fields', [
            'id' => 13,
            'type_id' => 3,
            'label' => 'Площадь, соток',
            'name' => 'ploshadsot',
            'hint' => 'Укажите количество соток'
        ]);

        //Группы полей
        $this->insert('group_ads_fields', [
            'id' => 2,
            'name' => 'Аренда квартир/Посуточно',
        ]);
            //Связь между группой полей и полем
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 2,
                'group_ads_fields_id' => 2,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 3,
                'group_ads_fields_id' => 2,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 4,
                'group_ads_fields_id' => 2,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 5,
                'group_ads_fields_id' => 2,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 6,
                'group_ads_fields_id' => 2,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 7,
                'group_ads_fields_id' => 2,
            ]);
                //Связь между категорией и группой полей
                $this->insert('category_group_ads_fields', [
                    'category_id' => 73,
                    'group_ads_fields_id' => 2,
                ]);
        //--------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 3,
            'name' => 'Аренда квартир/Почасовая',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 2,
                'group_ads_fields_id' => 3,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 74,
                    'group_ads_fields_id' => 3,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 75,
                    'group_ads_fields_id' => 3,
                ]);
        //--------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 4,
            'name' => 'Аренда комнат',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 8,
                'group_ads_fields_id' => 4,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 77,
                    'group_ads_fields_id' => 4,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 78,
                    'group_ads_fields_id' => 4,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 79,
                    'group_ads_fields_id' => 4,
                ]);
        //-----------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 5,
            'name' => 'Аренда домов',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 9,
                'group_ads_fields_id' => 5,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 10,
                'group_ads_fields_id' => 5,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 81,
                    'group_ads_fields_id' => 5,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 82,
                    'group_ads_fields_id' => 5,
                ]);
        //----------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 6,
            'name' => 'Аренда земли',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 9,
                'group_ads_fields_id' => 6,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 83,
                    'group_ads_fields_id' => 6,
                ]);
        //---------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 7,
            'name' => 'Продажа квартир/Вторичный рынок/Продажа комнат',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 2,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 3,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 4,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 11,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 7,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 5,
                'group_ads_fields_id' => 7,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 6,
                'group_ads_fields_id' => 7,
            ]);

                $this->insert('category_group_ads_fields', [
                    'category_id' => 87,
                    'group_ads_fields_id' => 7,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 88,
                    'group_ads_fields_id' => 7,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 89,
                    'group_ads_fields_id' => 7,
                ]);
        //--------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 8,
            'name' => 'Продажа домов',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 9,
                'group_ads_fields_id' => 8,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 10,
                'group_ads_fields_id' => 8,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 91,
                    'group_ads_fields_id' => 8,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 92,
                    'group_ads_fields_id' => 8,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 93,
                    'group_ads_fields_id' => 8,
                ]);
        //--------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 9,
            'name' => 'Продажа земли',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 9,
                'group_ads_fields_id' => 9,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 13,
                'group_ads_fields_id' => 9,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 95,
                    'group_ads_fields_id' => 9,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 96,
                    'group_ads_fields_id' => 9,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 97,
                    'group_ads_fields_id' => 9,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 98,
                    'group_ads_fields_id' => 9,
                ]);
        //----------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 10,
            'name' => 'Аренда помещений/Продажа помещений',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 12,
                'group_ads_fields_id' => 10,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 101,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 102,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 103,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 104,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 105,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 106,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 107,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 108,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 109,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 111,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 112,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 113,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 114,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 115,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 116,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 117,
                    'group_ads_fields_id' => 10,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 118,
                    'group_ads_fields_id' => 10,
                ]);


        //Категория Работа

        //Поля
        $this->insert('ads_fields', [
            'id' => 14,
            'type_id' => 4,
            'label' => 'Предлагаете / ищете?',
            'name' => 'type-raboty',
            'hint' => 'Укажите вид объявления'
        ]);
            //Значения по умолчанию для типа кузова
            $this->insert('ads_fields_default_value',[
                'value' => 'Предлагаю работу',
                'ads_field_id' => '14',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ищу работу',
                'ads_field_id' => '14',
            ]);
        $this->insert('ads_fields', [
            'id' => 15,
            'type_id' => 4,
            'label' => 'Тип работы',
            'name' => 'vid-zanyastosti',
            'hint' => 'Укажите тип занятости'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Постоянная работа',
                'ads_field_id' => '15',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Временная работа',
                'ads_field_id' => '15',
            ]);


        $this->insert('group_ads_fields', [
            'id' => 11,
            'name' => 'Работа',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 14,
                'group_ads_fields_id' => 11,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 15,
                'group_ads_fields_id' => 11,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 324,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 325,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 326,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 327,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 328,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 329,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 330,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 331,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 332,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 333,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 334,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 335,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 336,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 337,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 338,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 339,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 340,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 341,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 342,
                    'group_ads_fields_id' => 11,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 343,
                    'group_ads_fields_id' => 11,
                ]);

        //Категория ЖИВОТНЫЕ
        $this->insert('ads_fields', [
            'id' => 16,
            'type_id' => 4,
            'label' => 'Порода собаки',
            'name' => 'poroda-dog',
            'hint' => 'Укажите пароду собаки'
        ]);
            //Значения породы собаки
            $this->insert('ads_fields_default_value',[
                'value' => 'Эрдельтерьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Японский хин',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Акита',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Аляскинский маламут',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Американский бульдог',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Английский бульдог',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бассет',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бельгийская овчарка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бернский зенненхунд',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бигль',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бишон фризе',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Боксер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Болонка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бордоский дог',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бульмастиф',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бультерьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бурбуль',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Вест хайленд уайт терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Восточно-европейская овчарка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Гриффон',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Далматин',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Джек Рассел',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Доберман',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Золотистый ретривер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ирландский сеттер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ирландский терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Йоркширский терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кавказская овчарка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кане корсо',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Карликовый пинчер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Керри-блю терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Китайская хохлатая',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Колли',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Лабрадор ретривер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Лайка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мальтийская болонка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мастиф',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мексиканская голая собака',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Миттельшнауцер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мопс',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Московская сторожевая',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Немецкая овчарка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Немецкий дог',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Папийон',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Пекинес',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Пит-бультерьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Померанский шпиц',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Пудель',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ризеншнауцер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Родезийский риджбек',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ротвейлер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Русская борзая',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Русский черный терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Самоедская собака',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сенбернар',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сибирский хаски',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Скай-терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Скотч-терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Спаниель',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Среднеазиатская овчарка',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Стаффордширский бультерьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Стаффордширский терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Такса',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Той-терьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Фокстерьер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Французский бульдог',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Цвергпинчер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Цвергшнауцер',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Чау-чау',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Чихуахуа',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шарпей',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шелти',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ши-тцу',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шпиц',
                'ads_field_id' => '16',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая',
                'ads_field_id' => '16',
            ]);
        $this->insert('ads_fields', [
            'id' => 17,
            'type_id' => 4,
            'label' => 'Порода',
            'name' => 'poroda-cat',
            'hint' => 'Укажите пароду кошки'
        ]);
            //Значения породы котов
            $this->insert('ads_fields_default_value',[
                'value' => 'Абиссинская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Американский керл',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бенгальская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Британская длинношерстная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Британская короткошерстная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Девон-рекс',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Донской сфинкс',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Европейская короткошерстная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Канадский сфинкс',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Корниш-рекс',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Курильский бобтейл',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Манчкин',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мейн-кун',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Меконгский бобтейл',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Невская маскарадная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Норвежская лесная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ориентальная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Петерболд',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Русская голубая',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Селкирк-рекс',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сиамская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сибирская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сингапурская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Скоттиш страйт',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Скоттиш фолд',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сомалийская',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Турецкая ангора',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Экзотическая короткошерстная',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Японский бобтейл',
                'ads_field_id' => '17',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая',
                'ads_field_id' => '17',
            ]);

        //------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 12,
            'name' => 'Животные/Собаки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 16,
                'group_ads_fields_id' => 12,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 312,
                    'group_ads_fields_id' => 12,
                ]);
        //-------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 13,
            'name' => 'Животные/Кошки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 17,
                'group_ads_fields_id' => 13,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 313,
                    'group_ads_fields_id' => 13,
                ]);

        //Категория ДОМ/САД
        //поля
        $this->insert('ads_fields', [
            'id' => 18,
            'type_id' => 4,
            'label' => 'Типы мебели',
            'name' => 'type-mebel',
            'hint' => 'Выберите тип мебели'
        ]);
            //Значения типа мебели
            $this->insert('ads_fields_default_value',[
                'value' => 'Мягкая мебель',
                'ads_field_id' => '18',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шкафы / стенки',
                'ads_field_id' => '18',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Столы / стулья',
                'ads_field_id' => '18',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочая мебель для гостиной',
                'ads_field_id' => '18',
            ]);

        $this->insert('ads_fields', [
            'id' => 19,
            'type_id' => 4,
            'label' => 'Типы мебели',
            'name' => 'type-mebel-spalni',
            'hint' => 'Выберите тип мебели'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Гарнитуры',
                'ads_field_id' => '19',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кровати',
                'ads_field_id' => '19',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Матрасы',
                'ads_field_id' => '19',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Комоды / тумбы',
                'ads_field_id' => '19',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шкафы',
                'ads_field_id' => '19',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочая мебель для спальни',
                'ads_field_id' => '19',
            ]);

        $this->insert('ads_fields', [
            'id' => 20,
            'type_id' => 4,
            'label' => 'Типы мебели',
            'name' => 'type-mebel-office',
            'hint' => 'Выберите тип мебели'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Столы',
                'ads_field_id' => '20',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кресла / стулья',
                'ads_field_id' => '20',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шкафы / полки',
                'ads_field_id' => '20',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шкафы / полки',
                'ads_field_id' => '20',
            ]);
        $this->insert('ads_fields', [
            'id' => 21,
            'type_id' => 4,
            'label' => 'Подкатегории',
            'name' => 'textil',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Подушки и одеяла',
                'ads_field_id' => '21',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Постельное белье',
                'ads_field_id' => '21',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Полотенца',
                'ads_field_id' => '21',
            ]);
        $this->insert('ads_fields', [
            'id' => 22,
            'type_id' => 4,
            'label' => 'Подкатегории',
            'name' => 'dveriokna',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Шторы',
                'ads_field_id' => '22',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Жалюзи',
                'ads_field_id' => '22',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Карнизы',
                'ads_field_id' => '22',
            ]);

        //---------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 14,
            'name' => 'Дом-сад/Мебель для гостиной',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 18,
                'group_ads_fields_id' => 14,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 34,
                    'group_ads_fields_id' => 14,
                ]);
        //-----------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 15,
            'name' => 'Дом-сад/Мебель для спальни',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 19,
                'group_ads_fields_id' => 15,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 35,
                    'group_ads_fields_id' => 15,
                ]);
        //----------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 16,
            'name' => 'Дом-сад/Офисная мебель',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 20,
                'group_ads_fields_id' => 16,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 39,
                    'group_ads_fields_id' => 16,
                ]);
        //-----------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 17,
            'name' => 'Дом-сад/Текстиль',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 21,
                'group_ads_fields_id' => 17,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 45,
                    'group_ads_fields_id' => 17,
                ]);
        //-----------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 18,
            'name' => 'Дом-сад/Декор окон',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 22,
                'group_ads_fields_id' => 18,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 46,
                    'group_ads_fields_id' => 18,
                ]);

        //Категория ЭЛЕКТРОНИКА

        //поля
        $this->insert('ads_fields', [
            'id' => 23,
            'type_id' => 4,
            'label' => 'Подкатегории',
            'name' => 'vid-elektr',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Аккумуляторы',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Зарядные устройства',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Гарнитуры',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Корпуса / панели',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Чехлы',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Data-кабели',
                'ads_field_id' => '23',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие аксессуары для телефонов',
                'ads_field_id' => '23',
            ]);
        $this->insert('ads_fields', [
            'id' => 24,
            'type_id' => 4,
            'label' => 'Диагональ экрана',
            'name' => 'diagonal-ekrana',
            'hint' => 'Выберите диагональ экрана'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'До 13"',
                'ads_field_id' => '24',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => '13"-14"',
                'ads_field_id' => '24',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => '15"-15,6"',
                'ads_field_id' => '24',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => '16"-17"',
                'ads_field_id' => '24',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'От 18"',
                'ads_field_id' => '24',
            ]);
        $this->insert('ads_fields', [
            'id' => 25,
            'type_id' => 4,
            'label' => 'Марка ноутбука',
            'name' => 'mark-noutbuk',
            'hint' => 'Выберите марку ноутбука'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Acer',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Apple',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Asus',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BenQ',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bliss',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Compaq',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dell',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DESTEN',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'eMachines',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fujitsu-Siemens',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GigaByte',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'HP',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'HTC',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'IBM/ThinkPad',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'iRU',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'MSI',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NEC',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Packard Bell',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'RoverBook',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toshiba',
                'ads_field_id' => '25',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '25',
            ]);
        $this->insert('ads_fields', [
            'id' => 26,
            'type_id' => 4,
            'label' => 'Типы аксесуаров',
            'name' => 'type-acsesyar',
            'hint' => 'Выберите тип аксессуара'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Для настольных компьютеров',
                'ads_field_id' => '26',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Для ноутбуков',
                'ads_field_id' => '26',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Для КПК / планшетов',
                'ads_field_id' => '26',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Для серверов',
                'ads_field_id' => '26',
            ]);
        $this->insert('ads_fields', [
            'id' => 27,
            'type_id' => 4,
            'label' => 'Типы комплектующих',
            'name' => 'type-komplekt',
            'hint' => 'Выберите тип комплектующих'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Модули памяти',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Видеокарты',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Звуковые карты',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Материнские платы',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Оптические приводы',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Жесткие диски',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Корпуса',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Процессоры',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ТВ-тюнеры',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Блоки питания',
                'ads_field_id' => '27',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие комплектующие',
                'ads_field_id' => '27',
            ]);
        $this->insert('ads_fields', [
            'id' => 28,
            'type_id' => 4,
            'label' => 'Подкатегории',
            'name' => 'perefiriya',
            'hint' => 'Выберите тип устройства'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Копиры',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сетевое оборудование',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Клавиатуры / мыши / манипуляторы',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Вебкамеры',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Компьютерная акустика',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Принтеры',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мфу',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сканеры',
                'ads_field_id' => '28',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие периферийные устройства',
                'ads_field_id' => '28',
            ]);
        $this->insert('ads_fields', [
            'id' => 29,
            'type_id' => 4,
            'label' => 'Марка монитора',
            'name' => 'mark-monitor',
            'hint' => 'Выберите марку манитора'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AOC',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ASUS',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Acer',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Apple',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BenQ',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DELL',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Eizo',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Envision',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fujitsu-Siemens',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'HP',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hanns.G',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Iiyama',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lenovo',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'MAG',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NEC',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Neovo',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Prestigio',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Proview',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Topview',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toshiba',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Viewsonic',
                'ads_field_id' => '29',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '29',
            ]);
        $this->insert('ads_fields', [
            'id' => 30,
            'type_id' => 4,
            'label' => 'Тип накопителя',
            'name' => 'type-nakopitel',
            'hint' => 'Выберите тип накопителя'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Карты памяти',
                'ads_field_id' => '30',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Usb flash',
                'ads_field_id' => '30',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Внешние жесткие диски',
                'ads_field_id' => '30',
            ]);
        $this->insert('ads_fields', [
            'id' => 31,
            'type_id' => 3,
            'label' => 'Объём, Гб',
            'name' => 'obiom-pamyati',
            'hint' => 'Введите объём памяти устройства'
        ]);
        $this->insert('ads_fields', [
            'id' => 32,
            'type_id' => 4,
            'label' => 'Типы расходников',
            'name' => 'type-rashodnik',
            'hint' => 'Выберите тип расходника'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Картриджи / тонеры',
                'ads_field_id' => '32',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Дискеты / диски / кассеты',
                'ads_field_id' => '32',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие расходные материалы',
                'ads_field_id' => '32',
            ]);
        $this->insert('ads_fields', [
            'id' => 33,
            'type_id' => 4,
            'label' => 'Марка фотоаппарата',
            'name' => 'mark-photo',
            'hint' => 'Выберите марку фотоаппарата'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sanyo',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sealife',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sigma',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'UFO',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Agfaphoto',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BBK',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BenQ',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Canon',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Casio',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ergo',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fujifilm',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'General Electric',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Genius',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hasselblad',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'HP',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kodak',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Leica',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mamiya',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nikon',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Olympus',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pentax',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polaroid',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Praktica',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Premier',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rekam',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ricoh',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ricoh',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rollei',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rovershot',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '33',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '33',
            ]);
        $this->insert('ads_fields', [
            'id' => 34,
            'type_id' => 4,
            'label' => 'Марка видеокамеры',
            'name' => 'mark-video',
            'hint' => 'Выберите марку видеокамеры'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aiptek',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Canon',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DXG',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Direc',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elmo',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Explay',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Flip Video',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Genius',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hitachi',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'iSpan',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'JVC',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kodak',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rovershot',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sanyo',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toshiba',
                'ads_field_id' => '34',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '34',
            ]);
        $this->insert('ads_fields', [
            'id' => 35,
            'type_id' => 4,
            'label' => 'Марка объектива',
            'name' => 'mark-obektiva',
            'hint' => 'Выберите марку объектива'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Canon',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elicar',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Leica',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lensbaby',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mamiya',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nikon',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Olympus',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pentax',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sigma',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tamron',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tokina',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zeiss',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Зенит',
                'ads_field_id' => '35',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '35',
            ]);
        $this->insert('ads_fields', [
            'id' => 36,
            'type_id' => 4,
            'label' => 'Виды аксесуаров',
            'name' => 'vid-acsesuar',
            'hint' => 'Выберите тип аксессуара'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сумки',
                'ads_field_id' => '36',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Светофильтры',
                'ads_field_id' => '36',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Зарядные устройства / аккумуляторы',
                'ads_field_id' => '36',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие фото / видеоаксессуары',
                'ads_field_id' => '36',
            ]);
        $this->insert('ads_fields', [
            'id' => 37,
            'type_id' => 4,
            'label' => 'Марка плеера',
            'name' => 'mark-pleer',
            'hint' => 'Выберите марку плеера'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akai',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akira',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BBK',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cambridge Audio',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Denon',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dex',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Digital',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Eplutus',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ergo',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Erisson',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gemix',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'General',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'JVC',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kenwood',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Loeffen',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marantz',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Meridian',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mustek',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mystery',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NAD',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Odeon',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Phantom',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pioneer',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sharp',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sherwood',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Soupt',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Subini',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sven',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'T+A',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toshiba',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VR',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WOKSTER',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Xoro',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yamaha',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Витязь',
                'ads_field_id' => '37',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '37',
            ]);
        $this->insert('ads_fields', [
            'id' => 38,
            'type_id' => 4,
            'label' => 'Тип',
            'name' => 'type-televizor',
            'hint' => 'Выберите тип телевизора'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Жидкокристаллические',
                'ads_field_id' => '38',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Плазменные',
                'ads_field_id' => '38',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие телевизоры',
                'ads_field_id' => '38',
            ]);
        $this->insert('ads_fields', [
            'id' => 39,
            'type_id' => 4,
            'label' => 'Марка телевизора',
            'name' => 'mark-televizor',
            'hint' => 'Выберите марку телевизора'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Acer',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akai',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akira',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aquavision',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BBK',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BRAVIS',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bang &amp; Olufsen',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BenQ',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cameron',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Conrac',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dex',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Digital',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elenberg',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Erisson',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fujitsu',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'General',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Grundig',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hanns.G',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hantarex',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hitachi',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Izumi',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'JVC',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Liberton',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Loewe',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Metz',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mitsubishi Electric',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mystery',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NEC',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Novex',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Orion',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Patriot',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pioneer',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polar',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Prestigio',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Prima',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rainford',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Runco',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'SAGA',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sansui',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sanyo',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Saturn',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sharp',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Shivaki',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TCL',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Techno',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Thomson',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toshiba',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Trony',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VR',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vestel',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WEST',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Xoro',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Витязь',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Горизонт',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Рубин',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Электрон',
                'ads_field_id' => '39',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '39',
            ]);
        $this->insert('ads_fields', [
            'id' => 40,
            'type_id' => 4,
            'label' => 'Марка плеера',
            'name' => 'mark-mp-player',
            'hint' => 'Выберите марку плеера'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ACME',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akai',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Apacer',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Archos',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Assistant',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BBK',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Canyon',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Creative',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dainet',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DaZed',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DITECH',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ergo',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Erisson',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Espada',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Explay',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'FunTwist',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Genius',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GETHAP',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GRAND',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Intenso',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'iPod',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'iRiver',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'IVORY',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Le-Mon',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'MobiBlu',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Packard Bell',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Qumo',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ritmix',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'RoverMedia',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'R-TOUCH',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sandisk',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Seekwood',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Soundbreeze',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sweex',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TeXet',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Transcend',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Treelogic',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WOKSTER',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zen',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zoom',
                'ads_field_id' => '40',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '40',
            ]);
        $this->insert('ads_fields', [
            'id' => 41,
            'type_id' => 4,
            'label' => 'Марка музыкального центра',
            'name' => 'mark-myz-center',
            'hint' => 'Выберите марку музыкального центра'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bang &amp; Olufsen',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Denon',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Grundig',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'JVC',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kenwood',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mystery',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nakamichi',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Onkyo',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sanyo',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sharp',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TEAC',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yamaha',
                'ads_field_id' => '41',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '41',
            ]);
        $this->insert('ads_fields', [
            'id' => 42,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-reciver',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Accuphase',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Adcom',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Air Tight',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AMC',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Anthem',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Arcam',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ATI',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atoll',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audio Analogue',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audio Note',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audio Space',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audionet',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AudioValve',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ayon Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bryston',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cadanz',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cambridge Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cary Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cayin',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Chord Electronics',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Classe Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Conrad-Johnson',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Creek',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cyrus',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Denon',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Densen',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'EAR',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrocompaniet',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Enlightened Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Exposure',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Harman/Kardon',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hegel',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jeff Rowland',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lexicon',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Luxman',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marantz',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mark Levinson',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'McIntosh',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Melody',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Meridian',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Micromega',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Musical Fidelity',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Myryad',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NAD',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Naim Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NuForce',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Onkyo',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Parasound',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pathos',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Perreaux',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pioneer',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Plinius',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'PrimaLuna',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Primare',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pro-Ject',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'PS Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rega',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Roksan',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rotel',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sherwood',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sim Audio',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'T+A',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TEAC',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Unison Research',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vincent',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Xindak',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yamaha',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'YBA',
                'ads_field_id' => '42',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '42',
            ]);
        $this->insert('ads_fields', [
            'id' => 43,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-vinil',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Unison Research',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vincent',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Wadia',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'YBA',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yamaha',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atoll Electronique',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AVM',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Accuphase',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Advance Acoustic',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'April Music',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Arcam',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audio Analogue',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Audio Research',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ayon Audio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BlueNote',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Burmester',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'C.E.C.',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cambridge Audio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cary Audio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Creek',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cyrus',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Denon',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Densen',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'dCS',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrocompaniet',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Exposure',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gemini',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Harman/Kardon',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marantz',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'McIntosh',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Meridian',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Micromega',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Monrio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Musical Fidelity',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Myryad',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NAD',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nagra',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Naim Audio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Numark',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Onkyo',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Original Electronics',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Perreaux',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pioneer',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Primare',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Quad',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Raysonic',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rega',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Roksan',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rotel',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sherwood',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sim Audio',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Stanton',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'T+A',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TEAC',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tangent',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tascam',
                'ads_field_id' => '43',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '43',
            ]);
        $this->insert('ads_fields', [
            'id' => 44,
            'type_id' => 4,
            'label' => 'Тип приставки',
            'name' => 'type-pristavka',
            'hint' => 'Выберите тип приставки'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nintendo DS',
                'ads_field_id' => '44',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nintendo Wii',
                'ads_field_id' => '44',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony PlayStation',
                'ads_field_id' => '44',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sony PSP',
                'ads_field_id' => '44',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'XBOX',
                'ads_field_id' => '44',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая',
                'ads_field_id' => '44',
            ]);
        $this->insert('ads_fields', [
            'id' => 45,
            'type_id' => 4,
            'label' => 'Марка пылесоса',
            'name' => 'mark-pilesos',
            'hint' => 'Выберите марку пылесоса'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hansa',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hauswirt',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Heyner',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hoover',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Irit',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'iRobot',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kirby',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Karcher',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kia',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Liberton',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lindhaus',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lumme',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Magnit',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Makita',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marta',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Orion',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Phantom',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Piece',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Redber',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Redmond',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rotex',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rowenta',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Russell Hobbs',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Saturn',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Scarlett',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Severin',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Shivaki',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Soteco',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Synco',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Thomas',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Trisa',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VES',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VR',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vax',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitesse',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zanussi',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zelmer',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Аксион',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Горизонт',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Рубин',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Фея',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Alpari',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akai',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akira',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Alpina',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariete',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Artlina',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atlanta',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Black&amp;Decker',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bork',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'COIDO',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Clatronic',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delonghi',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delvir',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dirt',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dyson',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'EIO',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elect',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elekta',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elenberg',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Energy',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '45',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '45',
            ]);
        $this->insert('ads_fields', [
            'id' => 46,
            'type_id' => 4,
            'label' => 'Марка утюга',
            'name' => 'mark-utug',
            'hint' => 'Выберите марку утюга'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Alpina',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariete',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atlanta',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aurora',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Binatone',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bork',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Braun',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Clatronic',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delfa',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delonghi',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elect',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elbee',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Energy',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Eurometalnova',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'First',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Home-Element',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Irit',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kenwood',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kia',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lelit',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Magnit',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marta',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Maxima',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Maxwell',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Morphy Richards',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Moulinex',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Orion',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polaris',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Redmond',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rowenta',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Saturn',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Scarlett',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Severin',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tefal',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'UNIT',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VES',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Viconte',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitesse',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WEST',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Wellton',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zelmer',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ладомир',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Рубин',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Фея',
                'ads_field_id' => '46',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '46',
            ]);
        $this->insert('ads_fields', [
            'id' => 47,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-stiral',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Indesit',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kaiser',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kuppersbusch',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Maytag',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Neff',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philco',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polar',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'SCHULTHESS',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siltal',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Skiff',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Smeg',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Teka',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vestel',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Whirlpool',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zanussi',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zerowatt',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Атлант',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Вятка',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ока',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Фея',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AEG',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Akai',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ardo',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariston',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Asko',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bauknecht',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Blomberg',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bompani',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Brandt',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Candy',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Desany',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Euronova',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Eurosoba',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fagor',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Frigidaire',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gaggenau',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'General Electric',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hansa',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hoover',
                'ads_field_id' => '47',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '47',
            ]);
        $this->insert('ads_fields', [
            'id' => 48,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-overlok',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AstraLux',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aurora',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Boutique',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bernina',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Brother',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dragon Fly',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elna',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Family',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Husqvarna',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jaguar',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Janome',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Juki',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Leader',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'New Home',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pfaff',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Profi',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Singer',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Toyota',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Veritas',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yamata',
                'ads_field_id' => '48',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '48',
            ]);
        $this->insert('ads_fields', [
            'id' => 49,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-mikrovoln',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AEG',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ALPARI',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bork',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delonghi',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Erisson',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gaggenau',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hyundai',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kuppersbusch',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Moulinex',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mystery',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Neff',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Scarlett',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sharp',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Whirlpool',
                'ads_field_id' => '49',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '49',
            ]);
        $this->insert('ads_fields', [
            'id' => 50,
            'type_id' => 4,
            'label' => 'Марка холодильника',
            'name' => 'mark-holodilnik',
            'hint' => 'Выберите марку холодильника'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AEG',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Amana',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ardo',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariston',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Blomberg',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Candy',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Chambrer',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Climadiff',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Frigidaire',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gaggenau',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Haier',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hansa',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Indesit',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kuppersbusch',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LG',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Liebherr',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Maytag',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nardi',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Neff',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NORD',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'OAK',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Panasonic',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pozis',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Samsung',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sharp',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Smeg',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Snaige',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Stinol',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TEKA',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vestfrost',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vinosafe',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Whirlpool',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Атлант',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бирюса',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Саратов',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Смоленск',
                'ads_field_id' => '50',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '50',
            ]);
        $this->insert('ads_fields', [
            'id' => 51,
            'type_id' => 4,
            'label' => 'Марка плиты/печи',
            'name' => 'mark-prchi',
            'hint' => 'Выберите марку плиты/печи'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AEG',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ardo',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariston',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Blomberg',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bompani',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Candy',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dako (Mabe)',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delonghi',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Deluxe',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Desany',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fratelli Onofri',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fulgor',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gorenje',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GRETA',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hansa',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ILVE',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Indesit',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kaiser',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kuppersbusch',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'LUXELL',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mora',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Neff',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'NORD',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rainford',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Restart',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Severin',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Simfer',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Smeg',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vestel',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vigor',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Whirlpool',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zanussi',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zigmund &amp; Shtain',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Веста',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Газмаш',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Гефест',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ЗВИ',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Идель',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Крона',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Лада',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Мечта',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Нововятка',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Омичка',
                'ads_field_id' => '51',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '51',
            ]);
        $this->insert('ads_fields', [
            'id' => 52,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-koffimolki',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AEG',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariete',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ascaso',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bezzera',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bork',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Brasilia',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Braun',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Briel',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Delonghi',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Electrolux',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Expobar',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Faema',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'First',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Futurmat',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gaggia',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Irit',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jura',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kenwood',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Krups',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'La Cimbali',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'La Marzocco',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'La Pavoni',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lavazza',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Markus',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Melitta',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miele',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nespresso',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Piramit',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rancilio',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rowenta',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'SPINEL',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Saeco',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Scarlett',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Schaerer',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Severin',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tefal',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'UNIT',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Waeco',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zelmer',
                'ads_field_id' => '52',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '52',
            ]);
        $this->insert('ads_fields', [
            'id' => 53,
            'type_id' => 4,
            'label' => 'Марка',
            'name' => 'mark-kombain',
            'hint' => 'Выберите марку'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Saturn',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Scarlett',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Severin',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Siemens',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Supra',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tefal',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'VES',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Viconte',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitek',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vitesse',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WEST',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WS Invention',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zauber',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zelmer',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ладомир',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Alpina',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ariete',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atlanta',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aurora',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'BEKO',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Binatone',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bork',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bosch',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Braun',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Clatronic',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Daewoo',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elekta',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elenberg',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Irit',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kenwood',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kia',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Krups',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lamarque',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Magimix',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marta',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Morphy Richards',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Moulinex',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mystery',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Orion',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philips',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polaris',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rainford',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Redmond',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rolsen',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rotel',
                'ads_field_id' => '53',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '53',
            ]);



        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 19,
            'name' => 'Электроника/Телефоны/Аксессуары-запчасти',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 23,
                'group_ads_fields_id' => 19,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 151,
                    'group_ads_fields_id' => 19,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 20,
            'name' => 'Электроника/Компьютеры/Ноутбуки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 24,
                'group_ads_fields_id' => 20,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 25,
                'group_ads_fields_id' => 20,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 159,
                    'group_ads_fields_id' => 20,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 21,
            'name' => 'Электроника/Компьютеры/Аксессуары',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 26,
                'group_ads_fields_id' => 21,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 162,
                    'group_ads_fields_id' => 21,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 22,
            'name' => 'Электроника/Компьютеры/Комплектующие',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 27,
                'group_ads_fields_id' => 22,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 163,
                    'group_ads_fields_id' => 22,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 23,
            'name' => 'Электроника/Компьютеры/Периферийные устройства',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 28,
                'group_ads_fields_id' => 23,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 164,
                    'group_ads_fields_id' => 23,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 24,
            'name' => 'Электроника/Компьютеры/Мониторы',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 29,
                'group_ads_fields_id' => 24,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 165,
                    'group_ads_fields_id' => 24,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 25,
            'name' => 'Электроника/Компьютеры/Накопители',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 30,
                'group_ads_fields_id' => 25,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 31,
                'group_ads_fields_id' => 25,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 166,
                    'group_ads_fields_id' => 25,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 26,
            'name' => 'Электроника/Компьютеры/Расходники',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 32,
                'group_ads_fields_id' => 26,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 167,
                    'group_ads_fields_id' => 26,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 27,
            'name' => 'Электроника/Фото/видео/Цифровые фотоаппараты',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 33,
                'group_ads_fields_id' => 27,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 171,
                    'group_ads_fields_id' => 27,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 28,
            'name' => 'Электроника/Фото/видео/Видеокамеры',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 34,
                'group_ads_fields_id' => 28,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 172,
                    'group_ads_fields_id' => 28,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 29,
            'name' => 'Электроника/Фото/видео/Объективы',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 35,
                'group_ads_fields_id' => 29,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 173,
                    'group_ads_fields_id' => 29,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 30,
            'name' => 'Электроника/Фото/видео/Аксессуары',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 36,
                'group_ads_fields_id' => 30,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 176,
                    'group_ads_fields_id' => 30,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 31,
            'name' => 'Электроника/Тв/видеотехника/Медиа проигрыватели',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 37,
                'group_ads_fields_id' => 31,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 179,
                    'group_ads_fields_id' => 31,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 32,
            'name' => 'Электроника/Тв/видеотехника/Телевизоры',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 38,
                'group_ads_fields_id' => 32,
            ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 39,
                'group_ads_fields_id' => 32,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 180,
                    'group_ads_fields_id' => 32,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 33,
            'name' => 'Электроника/Аудиотехника/Mp3 плееры',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 40,
                'group_ads_fields_id' => 33,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 185,
                    'group_ads_fields_id' => 33,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 34,
            'name' => 'Электроника/Аудиотехника/Музыкальные центры',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 41,
                'group_ads_fields_id' => 34,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 187,
                    'group_ads_fields_id' => 34,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 35,
            'name' => 'Электроника/Аудиотехника/Усилители/ресиверы',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 42,
                'group_ads_fields_id' => 35,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 192,
                    'group_ads_fields_id' => 35,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 36,
            'name' => 'Электроника/Аудиотехника/Cd/md/виниловые проигрыватели',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 43,
                'group_ads_fields_id' => 36,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 193,
                    'group_ads_fields_id' => 36,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 37,
            'name' => 'Электроника/Игры и игровые приставки/Игры для приставок',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 44,
                'group_ads_fields_id' => 37,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 199,
                    'group_ads_fields_id' => 37,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 200,
                    'group_ads_fields_id' => 37,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 38,
            'name' => 'Электроника/Техника для дома/Пылесосы',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 45,
                'group_ads_fields_id' => 38,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 206,
                    'group_ads_fields_id' => 38,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 39,
            'name' => 'Электроника/Техника для дома/Утюги',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 46,
                'group_ads_fields_id' => 39,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 207,
                    'group_ads_fields_id' => 39,
                ]);
         //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 40,
            'name' => 'Электроника/Техника для дома/Стиральные машины',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 47,
                'group_ads_fields_id' => 40,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 208,
                    'group_ads_fields_id' => 40,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 41,
            'name' => 'Электроника/Техника для дома/Швейные машины и оверлоки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 48,
                'group_ads_fields_id' => 41,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 209,
                    'group_ads_fields_id' => 41,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 42,
            'name' => 'Электроника/Техника для кухни/Микроволновые печи',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 49,
                'group_ads_fields_id' => 42,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 214,
                    'group_ads_fields_id' => 42,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 43,
            'name' => 'Электроника/Техника для кухни/Холодильники',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 50,
                'group_ads_fields_id' => 43,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 215,
                    'group_ads_fields_id' => 43,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 44,
            'name' => 'Электроника/Техника для кухни/Плиты/печи',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 51,
                'group_ads_fields_id' => 44,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 216,
                    'group_ads_fields_id' => 44,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 45,
            'name' => 'Электроника/Техника для кухни/Кофеварки/кофемолки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 52,
                'group_ads_fields_id' => 45,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 218,
                    'group_ads_fields_id' => 45,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 46,
            'name' => 'Электроника/Техника для кухни/Кухонные комбайны/измельчители',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 53,
                'group_ads_fields_id' => 46,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 219,
                    'group_ads_fields_id' => 46,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 220,
                    'group_ads_fields_id' => 46,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 221,
                    'group_ads_fields_id' => 46,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 222,
                    'group_ads_fields_id' => 46,
                ]);

        //Категория мода и стиль
        $this->insert('ads_fields', [
            'id' => 54,
            'type_id' => 4,
            'label' => 'Марка часов',
            'name' => 'mark-chasov',
            'hint' => 'Выберите марку часов'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nooka',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ORIS',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Omega',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Adriatica',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Orient',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aigner',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'PILO &amp; Co',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Alfex',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Paco Rabanne',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'AndyWatch',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Paris Hilton',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Anne Klein',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Passion',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Appella',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pequignet',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Appetime',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Perrelet',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Aristo',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philip Laurence',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Armand Basi',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Philip Watch',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Armand Nicolet',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pierre Cardin',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Armani',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pirelli',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Atlantic',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Platinor',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Auguste Reymond',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Polar',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Axcent',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Priosa',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Balmain',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Pulsar',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Baume',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Q&amp;Q',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Benetton',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rado',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bentley',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'RaymondWeil',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Blancpain',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Revue Thommen',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Blumarine',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Roamer',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Boccia',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Roberto Cavalli',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Boegli',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'RoccoBarocco',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Breguet',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Rochas',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Breil Milano',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Romanoff',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Breitling',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Romanson',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bruno Sohnle',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Salvatore Ferragamo',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Bulova',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Schwarz Etienne',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Buran',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Seconda',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Burberry',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sector',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Burett',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Seiko',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Calvin Klein',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Sisley',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Candino',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Skagen',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Carl F. Bucherer',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Suunto',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Carrera y Carrera',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Swatch',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cartier',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Swiss Military',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Casio',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TW Steel',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Caterpillar',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tag Heuer',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'CeCi',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'TechnoMarine',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cerruti',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tempus',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Certina',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Timex',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Charles-Auguste Paillard',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tissot',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Charmex',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Titoni',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Christian Bernard',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tokyoflash',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Christina London',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Tommy Hilfiger',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Chronotech',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ulysse Nardin',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cimier',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Vacheron Constantin',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Citizen',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Valentino',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Claude Bernard',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Van Der Bauwede',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Clyda',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Versace',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Colleebri Italy',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Versus',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Continental',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Victorinox',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Cover',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Wenger',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'D.Factory',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Yves Bertelin',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'DKNY',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zodiac',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dalvey',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zaritron',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Danish Design',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Zenith',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Davosa',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Восток',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Diesel',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Заря',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Dolce &amp; Gabbana',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Комета',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ECCO',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Нестеров',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ebel',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ника',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Edox',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Полет',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elite',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'РФС',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Elysee',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Рекорд',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Epos',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Слава',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Esprit',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Спецназ',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Essence',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Спутник',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Eterna',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Тик-Так',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'F.Gattien',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Festina',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fiesta',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fortis',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fossil',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Frederique Constant',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Freelook',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GF Ferre',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gc',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gerald Genta',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gio Monaco',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Givenchy',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Grovana',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gucci',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Guess',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Haas',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Haurex',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hautlence',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hermes',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Highgear',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hot Diamonds',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hugo Boss',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hysek',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'IceLink',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ingersoll',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Invicta',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'J. Springs',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jacques Lemans',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jacques du Manoir',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jaguar',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jemis',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jennifer Lopez',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jowissa',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Just Cavalli',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kad Loo',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Kolber',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'L\'Duchen',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Le Chic',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Longines',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lorenz',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Lotus',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Luminox',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mango',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Marc Ecko',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mathey-Tissot',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Maurice Lacroix',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Medana',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Michael Kors',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Mido',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Miss Sixty',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Montblanc',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Moog',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Morellato',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Moschino',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Movado',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nautica',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nina Ricci',
                'ads_field_id' => '54',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '54',
            ]);
        $this->insert('ads_fields', [
            'id' => 55,
            'type_id' => 4,
            'label' => 'Вид изделия',
            'name' => 'vid-uvelir-izd',
            'hint' => 'Выберите вид изделия'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кольца',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Серьги',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Браслеты',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кулоны / подвески',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Броши',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Цепочки',
                'ads_field_id' => '55',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие ювелирные изделия',
                'ads_field_id' => '55',
            ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 47,
            'name' => 'Мода и стиль/Одежда/Обувь',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 1,
                'group_ads_fields_id' => 47,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 123,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 124,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 125,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 126,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 127,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 128,
                    'group_ads_fields_id' => 47,
                ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 129,
                    'group_ads_fields_id' => 47,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 48,
            'name' => 'Мода и стиль/Наручные часы',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 54,
                'group_ads_fields_id' => 48,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 134,
                    'group_ads_fields_id' => 48,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 49,
            'name' => 'Мода и стиль/Ювелирные изделия',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 55,
                'group_ads_fields_id' => 49,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 136,
                    'group_ads_fields_id' => 49,
                ]);


        //ХОББИ ОТДЫХ СПОРТ
        $this->insert('ads_fields', [
            'id' => 56,
            'type_id' => 4,
            'label' => 'Подкатегория',
            'name' => 'type-izdeliya',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Велосипеды',
                'ads_field_id' => '56',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Велозапчасти',
                'ads_field_id' => '56',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Велозапчасти',
                'ads_field_id' => '56',
            ]);
        $this->insert('ads_fields', [
            'id' => 57,
            'type_id' => 4,
            'label' => 'Подкатегория',
            'name' => 'type-lizi',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Лыжи',
                'ads_field_id' => '57',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Сноуборды',
                'ads_field_id' => '57',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Ботинки',
                'ads_field_id' => '57',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие товары для лыж / сноубордов',
                'ads_field_id' => '57',
            ]);
        $this->insert('ads_fields', [
            'id' => 58,
            'type_id' => 4,
            'label' => 'Марка коньков',
            'name' => 'mark-konk',
            'hint' => 'Выберите марку коньков'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Botas',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'CCM',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Easton',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fila',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Fischer',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'GRAF',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Hespeler',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Jackson',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'K2',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Libera',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nike Bauer',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Nordway',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'PowerSlide',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'RBK',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Reebok',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Roces',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Team Canada',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'WIFA',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Барс',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Динамо',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'ТТ',
                'ads_field_id' => '58',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая марка',
                'ads_field_id' => '58',
            ]);
        $this->insert('ads_fields', [
            'id' => 59,
            'type_id' => 4,
            'label' => 'Подкатегория',
            'name' => 'atletiks',
            'hint' => 'Выберите'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Тренажеры',
                'ads_field_id' => '59',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Тяжелая атлетика',
                'ads_field_id' => '59',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Фитнес',
                'ads_field_id' => '59',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Спортивное питание',
                'ads_field_id' => '59',
            ]);
        $this->insert('ads_fields', [
            'id' => 60,
            'type_id' => 4,
            'label' => 'Виды туризма',
            'name' => 'vid-tyrizma',
            'hint' => 'Выберите вид туризма'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Gps навигаторы',
                'ads_field_id' => '60',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Палатки',
                'ads_field_id' => '60',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Спальные мешки',
                'ads_field_id' => '60',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Рюкзаки',
                'ads_field_id' => '60',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Прочие туристические товары',
                'ads_field_id' => '60',
            ]);





        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 50,
            'name' => 'ХОББИ/Вело',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 56,
                'group_ads_fields_id' => 50,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 254,
                    'group_ads_fields_id' => 50,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 51,
            'name' => 'ХОББИ/Лыжи',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 57,
                'group_ads_fields_id' => 51,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 255,
                    'group_ads_fields_id' => 51,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 52,
            'name' => 'ХОББИ/Коньки',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 58,
                'group_ads_fields_id' => 52,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 256,
                    'group_ads_fields_id' => 52,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 53,
            'name' => 'ХОББИ/Атлетика / фитнес',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 59,
                'group_ads_fields_id' => 53,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 258,
                    'group_ads_fields_id' => 53,
                ]);
        //----------------------------------------------------------------------------------//
        $this->insert('group_ads_fields', [
            'id' => 54,
            'name' => 'ХОББИ/Атлетика / туризм',
        ]);
            $this->insert('ads_fields_group_ads_fields', [
                'fields_id' => 60,
                'group_ads_fields_id' => 54,
            ]);
                $this->insert('category_group_ads_fields', [
                    'category_id' => 259,
                    'group_ads_fields_id' => 54,
                ]);

        //ТРАНСПОРТ

        $this->insert('ads_fields', [
            'id' => 61,
            'type_id' => 4,
            'label' => 'Тип кузова',
            'name' => 'type-kyzov',
            'hint' => 'Выберите тип кузова'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Кабриолет',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Пикап',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Купе',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Универсал',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Хэтчбек',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Минивэн',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Внедорожник',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Седан',
                'ads_field_id' => '61',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другой',
                'ads_field_id' => '61',
            ]);
        $this->insert('ads_fields', [
            'id' => 62,
            'type_id' => 3,
            'label' => 'Год выпуска',
            'name' => 'year-vipusk',
            'hint' => 'Год выпуска'
        ]);
        $this->insert('ads_fields', [
            'id' => 63,
            'type_id' => 4,
            'label' => 'Коробка передач',
            'name' => 'korobka-peredah',
            'hint' => 'Выберите коробку передач'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Механическая',
                'ads_field_id' => '63',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Автоматическая',
                'ads_field_id' => '63',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другая',
                'ads_field_id' => '63',
            ]);

        $this->insert('ads_fields', [
            'id' => 64,
            'type_id' => 4,
            'label' => 'Вид топлива',
            'name' => 'vid-topliva',
            'hint' => 'Выберите вид топлива'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Бензин',
                'ads_field_id' => '64',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Дизель',
                'ads_field_id' => '64',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Другой',
                'ads_field_id' => '64',
            ]);


        $this->insert('ads_fields', [
            'id' => 65,
            'type_id' => 4,
            'label' => 'Состояние машины',
            'name' => 'sostoyanie',
            'hint' => 'Выберите состояние машины'
        ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Отличное',
                'ads_field_id' => '65',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Хорошее',
                'ads_field_id' => '65',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Среднее',
                'ads_field_id' => '65',
            ]);
            $this->insert('ads_fields_default_value',[
                'value' => 'Требует ремонта',
                'ads_field_id' => '65',
            ]);

        $this->insert('ads_fields', [
            'id' => 66,
            'type_id' => 3,
            'label' => 'Пробег',
            'name' => 'probeg',
            'hint' => 'Пробег'
        ]);
        $this->insert('ads_fields', [
            'id' => 67,
            'type_id' => 3,
            'label' => 'Объем двигателя, см<sup>3</sup>',
            'name' => 'obem-dvigatelya',
            'hint' => 'Объем двигателя'
        ]);
        $this->insert('ads_fields', [
            'id' => 68,
            'type_id' => 1,
            'label' => 'Растаможена',
            'name' => 'rastamogena',
            'hint' => ''
        ]);
        $this->insert('ads_fields', [
            'id' => 69,
            'type_id' => 1,
            'label' => 'Эл. стеклоподъемники',
            'name' => 'el-steklo',
            'hint' => ''
        ]);
        $this->insert('ads_fields', [
            'id' => 70,
            'type_id' => 1,
            'label' => 'Охранная система',
            'name' => 'ohrana',
            'hint' => ''
        ]);
        $this->insert('ads_fields', [
            'id' => 71,
            'type_id' => 1,
            'label' => 'Электрозеркала',
            'name' => 'elektro-zerkala',
            'hint' => ''
        ]);
        $this->insert('ads_fields', [
            'id' => 72,
            'type_id' => 1,
            'label' => 'Кондиционер',
            'name' => 'kondicioner',
            'hint' => ''
        ]);
        $this->insert('ads_fields', [
            'id' => 73,
            'type_id' => 1,
            'label' => 'Парктроник',
            'name' => 'parktronik',
            'hint' => ''
        ]);
    }

    public function down()
    {
        $this->delete('ads_fields_group_ads_fields');
        $this->delete('ads_fields_default_value');
        $this->delete('ads_fields');
        $this->delete('category_group_ads_fields');
        $this->delete('group_ads_fields');


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
