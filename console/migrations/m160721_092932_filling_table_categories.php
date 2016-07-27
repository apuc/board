<?php

use yii\db\Migration;

class m160721_092932_filling_table_categories extends Migration
{
    public function up()
    {//$this->delete('category');
       // /media/upload/categoryImg/children.png

        //Категория и подкатегории транспорт
        $this->insert('category', [
            'id' => 1,
            'name' => 'Транспорт',
            'icon' => '/media/upload/categoryImg/avto_cat.png',
            'slug' => 'transport',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 2,
                'name' => 'Легковые автомобили',
                'icon' => '',
                'slug' => 'legkovyie-avtomobili',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 3,
                'name' => 'Мото транспорт',
                'icon' => '',
                'slug' => 'moto-transport',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 4,
                'name' => 'Автобусы',
                'icon' => '',
                'slug' => 'avtobusyi',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 5,
                'name' => 'Спецтехника',
                'icon' => '',
                'slug' => 'spetstehnika',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 6,
                    'name' => 'Бульдозеры / тракторы',
                    'icon' => '',
                    'slug' => 'buldozeryi-traktoryi',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 7,
                    'name' => 'Коммунальная техника',
                    'icon' => '',
                    'slug' => 'kommunalnaya-tehnika',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 8,
                    'name' => 'Погрузчики',
                    'icon' => '',
                    'slug' => 'pogruzchiki',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 9,
                    'name' => 'Самосвалы',
                    'icon' => '',
                    'slug' => 'samosvalyi',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 10,
                    'name' => 'Строительная техника',
                    'icon' => '',
                    'slug' => 'stroitelnaya-tehnika',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 11,
                    'name' => 'Экскаваторы',
                    'icon' => '',
                    'slug' => 'ekskavatoryi',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 12,
                    'name' => 'Оборудование для спецтехники',
                    'icon' => '',
                    'slug' => 'oborudovanie-dlya-spetstehniki',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 13,
                    'name' => 'Прочая спецтехника',
                    'icon' => '',
                    'slug' => 'prochaya-spetstehnika',
                    'parent_id' => 6,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 14,
                'name' => 'Грузовые автомобили',
                'icon' => '',
                'slug' => 'gruzovyie-avtomobili',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 15,
                'name' => 'Сельхозтехника',
                'icon' => '',
                'slug' => 'selhoztehnika',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 16,
                'name' => 'Водный транспорт',
                'icon' => '',
                'slug' => 'vodnyiy-transport',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 17,
                'name' => 'Воздушный транспорт',
                'icon' => '',
                'slug' => 'vozdushnyiy-transport',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 18,
                'name' => 'Запчасти / аксессуары',
                'icon' => '',
                'slug' => 'zapchasti-aksessuaryi',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 19,
                    'name' => 'Автозапчасти',
                    'icon' => '',
                    'slug' => 'Avtozapchasti',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 20,
                    'name' => 'Аксессуары для авто',
                    'icon' => '',
                    'slug' => 'aksessuaryi-dlya-avto',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 21,
                    'name' => 'Мото аксессуары',
                    'icon' => '',
                    'slug' => 'moto-aksessuaryi',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 22,
                    'name' => 'Мотозапчасти',
                    'icon' => '',
                    'slug' => 'motozapchasti',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 23,
                    'name' => 'Шины / диски',
                    'icon' => '',
                    'slug' => 'shinyi-diski',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 24,
                    'name' => 'Автозвук',
                    'icon' => '',
                    'slug' => 'avtozvuk',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 25,
                    'name' => 'GPS-навигаторы / авторегистраторы',
                    'icon' => '',
                    'slug' => 'GPS-navigatoryi-avtoregistratoryi',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 26,
                    'name' => 'Запчасти для спец / с.х. техники',
                    'icon' => '',
                    'slug' => 'zapchasti-dlya-spets-s-h-tehniki',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 27,
                    'name' => 'Транспорт на запчасти',
                    'icon' => '',
                    'slug' => 'transport-na-zapchasti',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 28,
                    'name' => 'Прочие запчасти',
                    'icon' => '',
                    'slug' => 'prochie-zapchasti',
                    'parent_id' => 18,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 29,
                'name' => 'Прицепы',
                'icon' => '',
                'slug' => 'pritsepyi',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 30,
                'name' => 'Другой транспорт',
                'icon' => '',
                'slug' => 'drugoy-transport',
                'parent_id' => 1,
                'description' => '<p>Описание</p>',
            ]);
        //Категория и подкатегории ДОМ/САД
        $this->insert('category', [
            'id' => 31,
            'name' => 'Дом и сад',
            'icon' => '/media/upload/categoryImg/furniture.png',
            'slug' => 'dom-i-sad',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 32,
                'name' => 'Канцтовары / расходные материалы',
                'icon' => '',
                'slug' => 'kantstovaryi-rashodnyie materialyi',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 33,
                'name' => 'Мебель',
                'icon' => '',
                'slug' => 'mebel',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 34,
                    'name' => 'Мебель для гостиной',
                    'icon' => '',
                    'slug' => 'mebel-dlya-gostinoy',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 35,
                    'name' => 'Мебель для спальни',
                    'icon' => '',
                    'slug' => 'mebel-dlya-spalni',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 36,
                    'name' => 'Мебель для прихожей',
                    'icon' => '',
                    'slug' => 'mebel-dlya-prihozhey',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 37,
                    'name' => 'Кухонная мебель',
                    'icon' => '',
                    'slug' => 'kuhonnaya-mebel',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 38,
                    'name' => 'Мебель для ванной комнаты',
                    'icon' => '',
                    'slug' => 'mebel-dlya-vannoy-komnatyi',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 39,
                    'name' => 'Офисная мебель',
                    'icon' => '',
                    'slug' => 'ofisnaya-mebel',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 40,
                    'name' => 'Мебель на заказ',
                    'icon' => '',
                    'slug' => 'mebel-na-zakaz',
                    'parent_id' => 33,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 41,
                'name' => 'Продукты питания / напитки',
                'icon' => '',
                'slug' => 'produktyi-pitaniya-napitki',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 42,
                'name' => 'Сад / огород',
                'icon' => '',
                'slug' => 'sad-ogorod',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 43,
                'name' => 'Предметы интерьера',
                'icon' => '',
                'slug' => 'predmetyi-interera',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 44,
                    'name' => 'Светильники',
                    'icon' => '',
                    'slug' => 'svetilniki',
                    'parent_id' => 43,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 45,
                    'name' => 'Текстиль',
                    'icon' => '',
                    'slug' => 'tekstil',
                    'parent_id' => 43,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 46,
                    'name' => 'Декор окон',
                    'icon' => '',
                    'slug' => 'dekor-okon',
                    'parent_id' => 43,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 47,
                'name' => 'Строительство / ремонт',
                'icon' => '',
                'slug' => 'stroitelstvo-remont',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 48,
                    'name' => 'Сантехника',
                    'icon' => '',
                    'slug' => 'santehnika',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 49,
                    'name' => 'Вентиляция',
                    'icon' => '',
                    'slug' => 'ventilyatsiya',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 50,
                    'name' => 'Отопление',
                    'icon' => '',
                    'slug' => 'otoplenie',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 51,
                    'name' => 'Электрика',
                    'icon' => '',
                    'slug' => 'elektrika',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 52,
                    'name' => 'Пиломатериалы',
                    'icon' => '',
                    'slug' => 'pilomaterialyi',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 53,
                    'name' => 'Отделочные и облицовочные материалы',
                    'icon' => '',
                    'slug' => 'otdelochnyie-i-oblitsovochnyie-materialyi',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 54,
                    'name' => 'Окна / двери / стеклo / зеркала',
                    'icon' => '',
                    'slug' => 'okna-dveri-steklo-zerkala',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 55,
                    'name' => 'Лакокрасочные материалы',
                    'icon' => '',
                    'slug' => 'lakokrasochnyie-materialyi',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 56,
                    'name' => 'Металлопрокат / арматура',
                    'icon' => '',
                    'slug' => 'metalloprokat-armatura',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 57,
                    'name' => 'Элементы крепежа',
                    'icon' => '',
                    'slug' => 'elementyi-krepezha',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 58,
                    'name' => 'Кирпич / бетон / пеноблоки',
                    'icon' => '',
                    'slug' => 'kirpich-beton-penobloki',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 59,
                    'name' => 'Прочие стройматериалы',
                    'icon' => '',
                    'slug' => 'prochie-stroymaterialyi',
                    'parent_id' => 47,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 60,
                'name' => 'Инструменты',
                'icon' => '',
                'slug' => 'instrumentyi',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 61,
                    'name' => 'Ручной инструмент',
                    'icon' => '',
                    'slug' => 'ruchnoy-instrument',
                    'parent_id' => 60,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 62,
                    'name' => 'Бензоинструмент',
                    'icon' => '',
                    'slug' => 'benzoinstrument',
                    'parent_id' => 60,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 63,
                    'name' => 'Электроинструмент',
                    'icon' => '',
                    'slug' => 'elektroinstrument',
                    'parent_id' => 60,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 64,
                    'name' => 'Пневмоинструмент',
                    'icon' => '',
                    'slug' => 'pnevmoinstrument',
                    'parent_id' => 60,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 65,
                    'name' => 'Прочий инструмент',
                    'icon' => '',
                    'slug' => 'prochiy-instrument',
                    'parent_id' => 60,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 66,
                'name' => 'Комнатные растения',
                'icon' => '',
                'slug' => 'komnatnyie-rasteniya',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 67,
                'name' => 'Посуда / кухонная утварь',
                'icon' => '',
                'slug' => 'posuda-kuhonnaya-utvar',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 68,
                'name' => 'Садовый инвентарь',
                'icon' => '',
                'slug' => 'sadovyiy-inventar',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 69,
                'name' => 'Хозяйственный инвентарь / бытовая химия',
                'icon' => '',
                'slug' => 'hozyaystvennyiy-inventar-byitovaya himiya',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 70,
                'name' => 'Прочие товары для дома',
                'icon' => '',
                'slug' => 'prochie-tovaryi-dlya-doma',
                'parent_id' => 31,
                'description' => '<p>Описание</p>',
            ]);
        //Категория и подкатегории недвижимость
        $this->insert('category', [
            'id' => 71,
            'name' => 'Недвижимость',
            'icon' => '/media/upload/categoryImg/house.png',
            'slug' => 'nedvizhimost',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 72,
                'name' => 'Аренда квартир',
                'icon' => '',
                'slug' => 'arenda-kvartir',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 73,
                    'name' => 'Квартиры посуточно',
                    'icon' => '',
                    'slug' => 'kvartiryi-posutochno',
                    'parent_id' => 72,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 74,
                    'name' => 'Квартиры с почасовой оплатой',
                    'icon' => '',
                    'slug' => 'kvartiryi-s-pochasovoy-oplatoy',
                    'parent_id' => 72,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 75,
                    'name' => 'Долгосрочная аренда квартир',
                    'icon' => '',
                    'slug' => 'dolgosrochnaya-arenda-kvartir',
                    'parent_id' => 72,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 76,
                'name' => 'Аренда комнат',
                'icon' => '',
                'slug' => 'arenda-komnat',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 77,
                    'name' => 'Койко-места',
                    'icon' => '',
                    'slug' => 'koyko-mesta',
                    'parent_id' => 76,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 78,
                    'name' => 'Комнаты посуточно',
                    'icon' => '',
                    'slug' => 'komnatyi-posutochno',
                    'parent_id' => 76,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 79,
                    'name' => 'Долгосрочная аренда комнат',
                    'icon' => '',
                    'slug' => 'dolgosrochnaya-arenda-komnat',
                    'parent_id' => 76,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 80,
                'name' => 'Аренда домов',
                'icon' => '',
                'slug' => 'arenda-domov',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 81,
                    'name' => 'Долгосрочная аренда домов',
                    'icon' => '',
                    'slug' => 'dolgosrochnaya-arenda-domov',
                    'parent_id' => 80,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 82,
                    'name' => 'Дома посуточно / почасово',
                    'icon' => '',
                    'slug' => 'doma-posutochno-pochasovo',
                    'parent_id' => 80,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 83,
                'name' => 'Аренда земли',
                'icon' => '',
                'slug' => 'arenda-zemli',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 84,
                'name' => 'Аренда гаражей / стоянок',
                'icon' => '',
                'slug' => 'arenda-garazhey-stoyanok',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 85,
                'name' => 'Ищу компаньона',
                'icon' => '',
                'slug' => 'ischu-kompanona',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 86,
                'name' => 'Продажа квартир',
                'icon' => '',
                'slug' => 'prodazha-kvartir',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 87,
                    'name' => 'Вторичный рынок',
                    'icon' => '',
                    'slug' => 'vtorichnyiy-ryinok',
                    'parent_id' => 86,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 88,
                    'name' => 'Новостройки',
                    'icon' => '',
                    'slug' => 'Novostroyki',
                    'parent_id' => 86,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 89,
                'name' => 'Продажа комнат',
                'icon' => '',
                'slug' => 'prodazha-komnat',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 90,
                'name' => 'Продажа домов',
                'icon' => '',
                'slug' => 'prodazha-domov',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 91,
                    'name' => 'Продажа домов в городе',
                    'icon' => '',
                    'slug' => 'prodazha-domov-v-gorode',
                    'parent_id' => 90,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 92,
                    'name' => 'Продажа домов за городом',
                    'icon' => '',
                    'slug' => 'prodazha-domov-za-gorodom',
                    'parent_id' => 90,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 93,
                    'name' => 'Продажа дач',
                    'icon' => '',
                    'slug' => 'prodazha-dach',
                    'parent_id' => 90,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 94,
                'name' => 'Продажа земли',
                'icon' => '',
                'slug' => 'prodazha-zemli',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 95,
                    'name' => 'Земля под индивидуальное строительство',
                    'icon' => '',
                    'slug' => 'zemlya-pod-individualnoe-stroitelstvo',
                    'parent_id' => 94,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 96,
                    'name' => 'Земля под сад / огород',
                    'icon' => '',
                    'slug' => 'zemlya-pod-sad-ogorod',
                    'parent_id' => 94,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 97,
                    'name' => 'Земля сельскохозяйственного назначения',
                    'icon' => '',
                    'slug' => 'zemlya-selskohozyaystvennogo-naznacheniya',
                    'parent_id' => 94,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 98,
                    'name' => 'Земля промышленного назначения',
                    'icon' => '',
                    'slug' => 'zemlya-promyishlennogo-naznacheniya',
                    'parent_id' => 94,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 99,
                'name' => 'Продажа гаражей / стоянок',
                'icon' => '',
                'slug' => 'prodazha-garazhey-stoyanok',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 100,
                'name' => 'Аренда помещений',
                'icon' => '',
                'slug' => 'arenda-pomescheniy',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 101,
                    'name' => 'Аренда магазинов / салонов',
                    'icon' => '',
                    'slug' => 'arenda-magazinov-salonov',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 102,
                    'name' => 'Аренда ресторанов / баров',
                    'icon' => '',
                    'slug' => 'arenda-restoranov-barov',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 103,
                    'name' => 'Аренда офисов',
                    'icon' => '',
                    'slug' => 'arenda-ofisov',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 104,
                    'name' => 'Аренда складов',
                    'icon' => '',
                    'slug' => 'arenda-skladov',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 105,
                    'name' => 'Аренда отдельно стоящих зданий',
                    'icon' => '',
                    'slug' => 'arenda-otdelno-stoyaschih-zdaniy',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 106,
                    'name' => 'Аренда баз отдыха',
                    'icon' => '',
                    'slug' => 'arenda-baz-otdyiha',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 107,
                    'name' => 'Аренда помещений промышленного назначения',
                    'icon' => '',
                    'slug' => 'arenda-pomescheniy-promyishlennogo-naznacheniya',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 108,
                    'name' => 'Аренда помещений свободного назначения',
                    'icon' => '',
                    'slug' => 'arenda-pomescheniy-svobodnogo-naznacheniya',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 109,
                    'name' => 'Прочее',
                    'icon' => '',
                    'slug' => 'prochee',
                    'parent_id' => 100,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 110,
                'name' => 'Продажа помещений',
                'icon' => '',
                'slug' => 'prodazha-pomescheniy',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 111,
                    'name' => 'Продажа магазинов / салонов',
                    'icon' => '',
                    'slug' => 'prodazha-magazinov-salonov',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 112,
                    'name' => 'Продажа ресторанов / баров',
                    'icon' => '',
                    'slug' => 'prodazha-restoranov-barov',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 113,
                    'name' => 'Продажа офисов',
                    'icon' => '',
                    'slug' => 'prodazha-ofisov',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 114,
                    'name' => 'Продажа складов',
                    'icon' => '',
                    'slug' => 'prodazha-skladov',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 115,
                    'name' => 'Продажа отдельно стоящих зданий',
                    'icon' => '',
                    'slug' => 'prodazha-otdelno-stoyaschih-zdaniy',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 116,
                    'name' => 'Продажа баз отдыха',
                    'icon' => '',
                    'slug' => 'prodazha-baz-otdyiha',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 117,
                    'name' => 'Продажа помещений промышленного назначения',
                    'icon' => '',
                    'slug' => 'prodazha-pomescheniy-promyishlennogo-naznacheniya',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 118,
                    'name' => 'Продажа помещений свободного назначения',
                    'icon' => '',
                    'slug' => 'prodazha-pomescheniy-svobodnogo-naznacheniya',
                    'parent_id' => 110,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 119,
                'name' => 'Обмен недвижимости',
                'icon' => '',
                'slug' => 'obmen-nedvizhimosti',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 120,
                'name' => 'Прочая недвижимость',
                'icon' => '',
                'slug' => 'prochaya-nedvizhimost',
                'parent_id' => 71,
                'description' => '<p>Описание</p>',
            ]);
        //Категория и подкатегории МОДА И СТИЛЬ
        $this->insert('category', [
            'id' => 121,
            'name' => 'Мода и стиль',
            'icon' => '/media/upload/categoryImg/diamond.png',
            'slug' => 'moda-i-stil',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 122,
                'name' => 'Одежда/обувь',
                'icon' => '',
                'slug' => 'odezhda-obuv',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 123,
                    'name' => 'Женская одежда',
                    'icon' => '',
                    'slug' => 'zhenskaya-odezhda',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 124,
                    'name' => 'Женское белье, купальники',
                    'icon' => '',
                    'slug' => 'zhenskoe-bele-kupalniki',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 125,
                    'name' => 'Женская обувь',
                    'icon' => '',
                    'slug' => 'zhenskaya-obuv',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 126,
                    'name' => 'Одежда для беременных',
                    'icon' => '',
                    'slug' => 'odezhda-dlya-beremennyih',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 127,
                    'name' => 'Мужская одежда',
                    'icon' => '',
                    'slug' => 'muzhskaya-odezhda',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 128,
                    'name' => 'Мужское белье',
                    'icon' => '',
                    'slug' => 'muzhskoe-bele',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 129,
                    'name' => 'Мужская обувь',
                    'icon' => '',
                    'slug' => 'muzhskaya-obuv',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 130,
                    'name' => 'Головные уборы',
                    'icon' => '',
                    'slug' => 'golovnyie-uboryi',
                    'parent_id' => 122,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 131,
                'name' => 'Для свадьбы',
                'icon' => '',
                'slug' => 'dlya-svadbyi',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 132,
                    'name' => 'Свадебные аксессуары',
                    'icon' => '',
                    'slug' => 'svadebnyie-aksessuaryi',
                    'parent_id' => 131,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 133,
                    'name' => 'Свадебные платья/костюмы',
                    'icon' => '',
                    'slug' => 'svadebnyie-platya-kostyumyi',
                    'parent_id' => 131,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 134,
                'name' => 'Наручные часы',
                'icon' => '',
                'slug' => 'naruchnyie-chasyi',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 135,
                'name' => 'Аксессуары',
                'icon' => '',
                'slug' => 'aksessuaryi',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 136,
                    'name' => 'Ювелирные изделия',
                    'icon' => '',
                    'slug' => 'yuvelirnyie-izdeliya',
                    'parent_id' => 135,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 137,
                    'name' => 'Сумки',
                    'icon' => '',
                    'slug' => 'sumki',
                    'parent_id' => 135,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 138,
                    'name' => 'Бижутерия',
                    'icon' => '',
                    'slug' => 'bizhuteriya',
                    'parent_id' => 135,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 139,
                    'name' => 'Другие аксессуары',
                    'icon' => '',
                    'slug' => 'drugie-aksessuaryi',
                    'parent_id' => 135,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 140,
                'name' => 'Подарки',
                'icon' => '',
                'slug' => 'podarki',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 141,
                'name' => 'Красота / здоровье',
                'icon' => '',
                'slug' => 'krasota-zdorove',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 142,
                    'name' => 'Косметика',
                    'icon' => '',
                    'slug' => 'kosmetika',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 143,
                    'name' => 'Парфюмерия',
                    'icon' => '',
                    'slug' => 'parfyumeriya',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 144,
                    'name' => 'Средства по уходу',
                    'icon' => '',
                    'slug' => 'sredstva-po-uhodu',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 145,
                    'name' => 'Оборудование парикмахерских / салонов красоты',
                    'icon' => '',
                    'slug' => 'oborudovanie-parikmaherskih-salonov-krasotyi',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 146,
                    'name' => 'Товары для инвалидов',
                    'icon' => '',
                    'slug' => 'tovaryi-dlya-invalidov',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 147,
                    'name' => 'Прочие товары для красоты и здоровья',
                    'icon' => '',
                    'slug' => 'prochie-tovaryi-dlya-krasotyi-i-zdorovya',
                    'parent_id' => 141,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 148,
                'name' => 'Мода разное',
                'icon' => '',
                'slug' => 'moda-raznoe',
                'parent_id' => 121,
                'description' => '<p>Описание</p>',
            ]);

        //Категория ЭЛЕКТРОНИКА
        $this->insert('category', [
            'id' => 149,
            'name' => 'Электроника',
            'icon' => '/media/upload/categoryImg/comp.png',
            'slug' => 'elektronika',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 150,
                'name' => 'Телефоны',
                'icon' => '',
                'slug' => 'Telefonyi',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 151,
                    'name' => 'Аксессуары / запчасти',
                    'icon' => '',
                    'slug' => 'aksessuaryi-zapchasti',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 152,
                    'name' => 'Мобильные телефоны',
                    'icon' => '',
                    'slug' => 'mobilnyie-telefonyi',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 153,
                    'name' => 'Сим-карты / тарифы / номера',
                    'icon' => '',
                    'slug' => 'sim-kartyi-tarifyi-nomera',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 154,
                    'name' => 'Стационарные телефоны',
                    'icon' => '',
                    'slug' => 'statsionarnyie-telefonyi',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 155,
                    'name' => 'Ремонт / прошивка',
                    'icon' => '',
                    'slug' => 'remont-proshivka',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 156,
                    'name' => 'Прочие телефоны',
                    'icon' => '',
                    'slug' => 'prochie-telefonyi',
                    'parent_id' => 150,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 157,
                'name' => 'Компьютеры',
                'icon' => '',
                'slug' => 'kompyuteryi',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 158,
                    'name' => 'Настольные',
                    'icon' => '',
                    'slug' => 'nastolnyie',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 159,
                    'name' => 'Ноутбуки',
                    'icon' => '',
                    'slug' => 'noutbuki',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 160,
                    'name' => 'Планшетные компьютеры',
                    'icon' => '',
                    'slug' => 'planshetnyie-kompyuteryi',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 161,
                    'name' => 'Серверы',
                    'icon' => '',
                    'slug' => 'Serveryi',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 162,
                    'name' => 'Аксессуары',
                    'icon' => '',
                    'slug' => 'comp-aksessuaryi',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 163,
                    'name' => 'Комплектующие',
                    'icon' => '',
                    'slug' => 'komplektuyuschie',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 164,
                    'name' => 'Периферийные устройства',
                    'icon' => '',
                    'slug' => 'periferiynyie-ustroystva',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 165,
                    'name' => 'Мониторы',
                    'icon' => '',
                    'slug' => 'monitoryi',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 166,
                    'name' => 'Внешние накопители',
                    'icon' => '',
                    'slug' => 'vneshnie-nakopiteli',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 167,
                    'name' => 'Расходные материалы',
                    'icon' => '',
                    'slug' => 'rashodnyie-materialyi',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 168,
                    'name' => 'Другое',
                    'icon' => '',
                    'slug' => 'drugoe',
                    'parent_id' => 157,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 169,
                'name' => 'Фото / видео',
                'icon' => '',
                'slug' => 'foto-video',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 170,
                    'name' => 'Пленочные фотоаппараты',
                    'icon' => '',
                    'slug' => 'plenochnyie-fotoapparatyi',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 171,
                    'name' => 'Цифровые фотоаппараты',
                    'icon' => '',
                    'slug' => 'tsifrovyie-fotoapparatyi',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 172,
                    'name' => 'Видеокамеры',
                    'icon' => '',
                    'slug' => 'videokameryi',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 173,
                    'name' => 'Объективы',
                    'icon' => '',
                    'slug' => 'obektivyi',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 174,
                    'name' => 'Штативы / моноподы',
                    'icon' => '',
                    'slug' => 'shtativyi-monopodyi',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 175,
                    'name' => 'Фотовспышки',
                    'icon' => '',
                    'slug' => 'fotovspyishki',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 176,
                    'name' => 'Аксессуары для фото / видеокамер',
                    'icon' => '',
                    'slug' => 'aksessuaryi-dlya-foto-videokamer',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 177,
                    'name' => 'Телескопы / бинокли',
                    'icon' => '',
                    'slug' => 'teleskopyi-binokli',
                    'parent_id' => 169,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 178,
                'name' => 'Тв / видеотехника',
                'icon' => '',
                'slug' => 'tv-videotehnika',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 179,
                    'name' => 'Медиа проигрыватели',
                    'icon' => '',
                    'slug' => 'media-proigryivateli',
                    'parent_id' => 178,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 180,
                    'name' => 'Телевизоры',
                    'icon' => '',
                    'slug' => 'televizoryi',
                    'parent_id' => 178,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 181,
                    'name' => 'Аксессуары для ТВ / видео',
                    'icon' => '',
                    'slug' => 'aksessuaryi-dlya-tv-video',
                    'parent_id' => 178,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 182,
                    'name' => 'Спутниковое ТВ',
                    'icon' => '',
                    'slug' => 'sputnikovoe-tv',
                    'parent_id' => 178,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 183,
                    'name' => 'Прочая ТВ / видеотехника',
                    'icon' => '',
                    'slug' => 'prochaya-tv-videotehnika',
                    'parent_id' => 178,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 184,
                'name' => 'Аудиотехника',
                'icon' => '',
                'slug' => 'audiotehnika',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 185,
                    'name' => 'Mp3 плееры',
                    'icon' => '',
                    'slug' => 'mp3-pleeryi',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 186,
                    'name' => 'Магнитолы',
                    'icon' => '',
                    'slug' => 'magnitolyi',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 187,
                    'name' => 'Музыкальные центры',
                    'icon' => '',
                    'slug' => 'muzyikalnyie-tsentryi',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 188,
                    'name' => 'Акустические системы',
                    'icon' => '',
                    'slug' => 'akusticheskie-sistemyi',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 189,
                    'name' => 'Наушники',
                    'icon' => '',
                    'slug' => 'naushniki',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 190,
                    'name' => 'Радиоприемники',
                    'icon' => '',
                    'slug' => 'radiopriemniki',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 191,
                    'name' => 'Портативная акустика',
                    'icon' => '',
                    'slug' => 'portativnaya-akustika',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 192,
                    'name' => 'Усилители / ресиверы',
                    'icon' => '',
                    'slug' => 'usiliteli-resiveryi',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 193,
                    'name' => 'Cd / md / виниловые проигрыватели',
                    'icon' => '',
                    'slug' => 'cd-md-vinilovyie proigryivateli',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 194,
                    'name' => 'Прочая аудиотехника',
                    'icon' => '',
                    'slug' => 'prochaya-audiotehnika',
                    'parent_id' => 184,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 195,
                'name' => 'Игры и игровые приставки',
                'icon' => '',
                'slug' => 'igryi-i-igrovyie-pristavki',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 199,
                    'name' => 'Игры для приставок',
                    'icon' => '',
                    'slug' => 'igryi-dlya-pristavok',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 200,
                    'name' => 'Приставки',
                    'icon' => '',
                    'slug' => 'pristavki',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 201,
                    'name' => 'Игры для PC',
                    'icon' => '',
                    'slug' => 'igryi-dlya-pc',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 202,
                    'name' => 'Аксессуары',
                    'icon' => '',
                    'slug' => 'pristavki-aksessuaryi',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 203,
                    'name' => 'Герои игр',
                    'icon' => '',
                    'slug' => 'geroi-igr',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 204,
                    'name' => 'Ремонт приставок',
                    'icon' => '',
                    'slug' => 'remont-pristavok',
                    'parent_id' => 195,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 205,
                'name' => 'Техника для дома',
                'icon' => '',
                'slug' => 'tehnika-dlya-doma',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 206,
                    'name' => 'Пылесосы',
                    'icon' => '',
                    'slug' => 'pyilesosyi',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 207,
                    'name' => 'Утюги',
                    'icon' => '',
                    'slug' => 'utyugi',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 208,
                    'name' => 'Стиральные машины',
                    'icon' => '',
                    'slug' => 'stiralnyie-mashinyi',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 209,
                    'name' => 'Швейные машины и оверлоки',
                    'icon' => '',
                    'slug' => 'shveynyie-mashinyi-i-overloki',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 210,
                    'name' => 'Вязальные машины',
                    'icon' => '',
                    'slug' => 'vyazalnyie-mashinyi',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 211,
                    'name' => 'Фильтры для воды',
                    'icon' => '',
                    'slug' => 'filtryi-dlya-vodyi',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 212,
                    'name' => 'Прочая техника для дома',
                    'icon' => '',
                    'slug' => 'prochaya-tehnika-dlya-doma',
                    'parent_id' => 205,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 213,
                'name' => 'Техника для кухни',
                'icon' => '',
                'slug' => 'tehnika-dlya-kuhni',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 214,
                    'name' => 'Микроволновые печи',
                    'icon' => '',
                    'slug' => 'mikrovolnovyie-pechi',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 215,
                    'name' => 'Холодильники',
                    'icon' => '',
                    'slug' => 'holodilniki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 216,
                    'name' => 'Плиты / печи',
                    'icon' => '',
                    'slug' => 'plityi-pechi',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 217,
                    'name' => 'Электрочайники',
                    'icon' => '',
                    'slug' => 'elektrochayniki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 218,
                    'name' => 'Кофеварки / кофемолки',
                    'icon' => '',
                    'slug' => 'kofevarki-kofemolki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 219,
                    'name' => 'Кухонные комбайны / измельчители',
                    'icon' => '',
                    'slug' => 'kuhonnyie-kombaynyi-izmelchiteli',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 220,
                    'name' => 'Пароварки / мультиварки',
                    'icon' => '',
                    'slug' => 'parovarki-multivarki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 221,
                    'name' => 'Хлебопечки',
                    'icon' => '',
                    'slug' => 'hlebopechki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 222,
                    'name' => 'Посудомоечные машины',
                    'icon' => '',
                    'slug' => 'posudomoechnyie-mashinyi',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 223,
                    'name' => 'Вытяжки',
                    'icon' => '',
                    'slug' => 'vyityazhki',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 224,
                    'name' => 'Прочая техника для кухни',
                    'icon' => '',
                    'slug' => 'prochaya-tehnika-dlya-kuhni',
                    'parent_id' => 213,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 225,
                'name' => 'Климатическое оборудование',
                'icon' => '',
                'slug' => 'klimaticheskoe-oborudovanie',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 226,
                'name' => 'Индивидуальный уход',
                'icon' => '',
                'slug' => 'individualnyiy-uhod',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 227,
                    'name' => 'Бритвы, эпиляторы, машинки для стрижки',
                    'icon' => '',
                    'slug' => 'britvyi-epilyatoryi-mashinki-dlya-strizhki',
                    'parent_id' => 226,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 228,
                    'name' => 'Фены, укладка волос',
                    'icon' => '',
                    'slug' => 'fenyi-ukladka-volos',
                    'parent_id' => 226,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 229,
                    'name' => 'Весы',
                    'icon' => '',
                    'slug' => 'vesi',
                    'parent_id' => 226,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 230,
                    'name' => 'Прочая техника для индивидуального ухода',
                    'icon' => '',
                    'slug' => 'prochaya-tehnika-dlya-individualnogo-uhoda',
                    'parent_id' => 226,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 231,
                'name' => 'Аксессуары и комплектующие',
                'icon' => '',
                'slug' => 'aksessuaryi-i-komplektuyuschie',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 232,
                'name' => 'Прочая электроника',
                'icon' => '',
                'slug' => 'prochaya-elektronika',
                'parent_id' => 149,
                'description' => '<p>Описание</p>',
            ]);
        //Категория Хобби, отдых и спорт
        $this->insert('category', [
            'id' => 233,
            'name' => 'Хобби, отдых и спорт',
            'icon' => '/media/upload/categoryImg/xobbi.png',
            'slug' => 'рobbi-otdyih-i-sport',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 234,
                'name' => 'Антиквариат / коллекции',
                'icon' => '',
                'slug' => 'antikvariat-kollektsii',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 235,
                    'name' => 'Антикварная мебель',
                    'icon' => '',
                    'slug' => 'antikvarnaya-mebel',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 236,
                    'name' => 'Букинистика',
                    'icon' => '',
                    'slug' => 'bukinistika',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 237,
                    'name' => 'Живопись',
                    'icon' => '',
                    'slug' => 'zhivopis',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 238,
                    'name' => 'Предметы искусства',
                    'icon' => '',
                    'slug' => 'predmetyi-iskusstva',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 239,
                    'name' => 'Коллекционирование',
                    'icon' => '',
                    'slug' => 'kollektsionirovanie',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 240,
                    'name' => 'Поделки / рукоделие',
                    'icon' => '',
                    'slug' => 'podelki-rukodelie',
                    'parent_id' => 234,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 241,
                'name' => 'Музыкальные инструменты',
                'icon' => '',
                'slug' => 'muzyikalnyie-instrumentyi',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 242,
                    'name' => 'Акустические гитары',
                    'icon' => '',
                    'slug' => 'akusticheskie-gitaryi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 243,
                    'name' => 'Бас-гитары',
                    'icon' => '',
                    'slug' => 'bas-gitaryi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 244,
                    'name' => 'Пианино / фортепиано / рояли',
                    'icon' => '',
                    'slug' => 'pianino-fortepiano-royali',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 245,
                    'name' => 'Электрогитары',
                    'icon' => '',
                    'slug' => 'elektrogitaryi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 246,
                    'name' => 'Духовые инструменты',
                    'icon' => '',
                    'slug' => 'duhovyie-instrumentyi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 247,
                    'name' => 'Комбоусилители',
                    'icon' => '',
                    'slug' => 'kombousiliteli',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 248,
                    'name' => 'Синтезаторы',
                    'icon' => '',
                    'slug' => 'sintezatoryi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 249,
                    'name' => 'Ударные инструменты',
                    'icon' => '',
                    'slug' => 'udarnyie-instrumentyi',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 250,
                    'name' => 'Студийное оборудование',
                    'icon' => '',
                    'slug' => 'studiynoe-oborudovanie',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 251,
                    'name' => 'Аксессуары для музыкальных инструментов',
                    'icon' => '',
                    'slug' => 'aksessuaryi-dlya-muzyikalnyih-instrumentov',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 252,
                    'name' => 'Прочее',
                    'icon' => '',
                    'slug' => 'myz-prochee',
                    'parent_id' => 241,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 253,
                'name' => 'Спорт / отдых',
                'icon' => '',
                'slug' => 'sport-otdyih',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 254,
                    'name' => 'Вело',
                    'icon' => '',
                    'slug' => 'velo',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 255,
                    'name' => 'Лыжи / сноуборды',
                    'icon' => '',
                    'slug' => 'lyizhi-snoubordyi',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 256,
                    'name' => 'Коньки',
                    'icon' => '',
                    'slug' => 'konki',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 257,
                    'name' => 'Роликовые коньки',
                    'icon' => '',
                    'slug' => 'rolikovyie-konki',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 258,
                    'name' => 'Атлетика / фитнес',
                    'icon' => '',
                    'slug' => 'atletika-fitnes',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 259,
                    'name' => 'Туризм',
                    'icon' => '',
                    'slug' => 'turizm',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 260,
                    'name' => 'Охота / рыбалка',
                    'icon' => '',
                    'slug' => 'ohota-ryibalka',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 261,
                    'name' => 'Игры с ракеткой',
                    'icon' => '',
                    'slug' => 'igryi-s-raketkoy',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 263,
                    'name' => 'Водные виды спорта',
                    'icon' => '',
                    'slug' => 'vodnyie-vidyi-sporta',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 264,
                    'name' => 'Футбол',
                    'icon' => '',
                    'slug' => 'futbol',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 265,
                    'name' => 'Хоккей',
                    'icon' => '',
                    'slug' => 'hokkey',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 266,
                    'name' => 'Единоборства / бокс',
                    'icon' => '',
                    'slug' => 'edinoborstva-boks',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 267,
                    'name' => 'Прочие виды спорта',
                    'icon' => '',
                    'slug' => 'prochie-vidyi-sporta',
                    'parent_id' => 253,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 268,
                'name' => 'Книги / журналы',
                'icon' => '',
                'slug' => 'knigi-zhurnalyi',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 269,
                'name' => 'CD / DVD / пластинки / кассеты',
                'icon' => '',
                'slug' => 'cd-dvd-plastinki-kassetyi',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 270,
                'name' => 'Билеты',
                'icon' => '',
                'slug' => 'bileti',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 271,
                'name' => 'Поиск попутчиков',
                'icon' => '',
                'slug' => 'poisk-poputchikov',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 272,
                'name' => 'Поиск групп / музыкантов',
                'icon' => '',
                'slug' => 'poisk-grupp-muzyikantov',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 273,
                'name' => 'Другое',
                'icon' => '',
                'slug' => 'hobbi-drugoe',
                'parent_id' => 233,
                'description' => '<p>Описание</p>',
            ]);
        //Категория БИЗНЕС И УСЛУГИ
        $this->insert('category', [
            'id' => 274,
            'name' => 'Бизнес и услуги',
            'icon' => '/media/upload/categoryImg/target.png',
            'slug' => 'biznes-i-uslugi',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 275,
                'name' => 'Строительство / ремонт / уборка',
                'icon' => '',
                'slug' => 'stroitelstvo-remont-uborka',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 276,
                    'name' => 'Cтроительные услуги',
                    'icon' => '',
                    'slug' => 'Ctroitelnyie uslugi',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 277,
                    'name' => 'Дизайн / архитектура',
                    'icon' => '',
                    'slug' => 'dizayn-arhitektura',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 278,
                    'name' => 'Отделка / ремонт',
                    'icon' => '',
                    'slug' => 'otdelka-remont',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 279,
                    'name' => 'Окна / двери / балконы',
                    'icon' => '',
                    'slug' => 'okna-dveri-balkonyi',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 280,
                    'name' => 'Сантехника / коммуникации',
                    'icon' => '',
                    'slug' => 'santehnika-kommunikatsii',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 281,
                    'name' => 'Бытовой ремонт / уборка',
                    'icon' => '',
                    'slug' => 'byitovoy-remont-uborka',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 282,
                    'name' => 'Вентиляция / кондиционирование',
                    'icon' => '',
                    'slug' => 'ventilyatsiya-konditsionirovanie',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 283,
                    'name' => 'Электрика',
                    'icon' => '',
                    'slug' => 'elektrika',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 284,
                    'name' => 'Готовые конструкции',
                    'icon' => '',
                    'slug' => 'gotovyie-konstruktsii',
                    'parent_id' => 275,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 285,
                'name' => 'Финансовые услуги / партнерство',
                'icon' => '',
                'slug' => 'finansovyie-uslugi-partnerstvo',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 286,
                'name' => 'Перевозки / аренда транспорта',
                'icon' => '',
                'slug' => 'perevozki-arenda-transporta',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 287,
                'name' => 'Реклама / полиграфия / маркетинг / интернет',
                'icon' => '',
                'slug' => 'reklama-poligrafiya-marketing-internet',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 288,
                'name' => 'Няни / сиделки',
                'icon' => '',
                'slug' => 'nyani-sidelki',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 289,
                'name' => 'Сырьё / материалы',
                'icon' => '',
                'slug' => 'syiryo-materialyi',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 290,
                'name' => 'Красота / здоровье',
                'icon' => '',
                'slug' => 'krasota-zdorove',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 291,
                    'name' => 'Стрижки / наращивание волос',
                    'icon' => '',
                    'slug' => 'strizhki-naraschivanie volos',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 292,
                    'name' => 'Маникюр / наращивание ногтей',
                    'icon' => '',
                    'slug' => 'manikyur-naraschivanie nogtey',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 293,
                    'name' => 'Макияж / косметология / наращивание ресниц',
                    'icon' => '',
                    'slug' => 'makiyazh-kosmetologiya-naraschivanie resnits',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 294,
                    'name' => 'Медицина',
                    'icon' => '',
                    'slug' => 'meditsina',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 295,
                    'name' => 'Массаж',
                    'icon' => '',
                    'slug' => 'massazh',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 296,
                    'name' => 'Красота / здоровье - прочее',
                    'icon' => '',
                    'slug' => 'krasota-zdorove-prochee',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 297,
                    'name' => 'Услуги психолога',
                    'icon' => '',
                    'slug' => 'uslugi-psihologa',
                    'parent_id' => 290,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 298,
                'name' => 'Оборудование',
                'icon' => '',
                'slug' => 'oborudovanie',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 299,
                'name' => 'Образование / Спорт',
                'icon' => '',
                'slug' => 'obrazovanie-sport',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 300,
                'name' => 'Услуги для животных',
                'icon' => '',
                'slug' => 'uslugi-dlya-zhivotnyih',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 301,
                'name' => 'Продажа бизнеса',
                'icon' => '',
                'slug' => 'prodazha-biznesa',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 302,
                'name' => 'Развлечения / Искусство / Фото / Видео',
                'icon' => '',
                'slug' => 'razvlecheniya-iskusstvo-foto-video',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 303,
                'name' => 'Туризм / иммиграция',
                'icon' => '',
                'slug' => 'turizm-immigratsiya',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 304,
                'name' => 'Услуги переводчиков / набор текста',
                'icon' => '',
                'slug' => 'uslugi-perevodchikov-nabor-teksta',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 305,
                'name' => 'Авто / мото услуги',
                'icon' => '',
                'slug' => 'avto-moto-uslugi',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 306,
                'name' => 'Обслуживание, ремонт техники',
                'icon' => '',
                'slug' => 'obsluzhivanie-remont-tehniki',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 307,
                'name' => 'Сетевой маркетинг',
                'icon' => '',
                'slug' => 'setevoy-marketing',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 308,
                'name' => 'Юридические услуги',
                'icon' => '',
                'slug' => 'yuridicheskie-uslugi',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 309,
                'name' => 'Прокат товаров',
                'icon' => '',
                'slug' => 'prokat-tovarov',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 310,
                'name' => 'Прочие услуги',
                'icon' => '',
                'slug' => 'prochie-uslugi',
                'parent_id' => 274,
                'description' => '<p>Описание</p>',
            ]);
        //Категория животные
        $this->insert('category', [
            'id' => 311,
            'name' => 'Животные',
            'icon' => '/media/upload/categoryImg/animal.png',
            'slug' => 'zhivotnyie',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 312,
                'name' => 'Собаки',
                'icon' => '',
                'slug' => 'sobaki',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 313,
                'name' => 'Кошки',
                'icon' => '',
                'slug' => 'koshki',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 314,
                'name' => 'Аквариумистика',
                'icon' => '',
                'slug' => 'akvariumistika',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 315,
                'name' => 'Птицы',
                'icon' => '',
                'slug' => 'ptitsyi',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 316,
                'name' => 'Грызуны',
                'icon' => '',
                'slug' => 'gryizunyi',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 317,
                'name' => 'Рептилии',
                'icon' => '',
                'slug' => 'reptilii',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 318,
                'name' => 'Сельхоз животные',
                'icon' => '',
                'slug' => 'selhoz-zhivotnyie',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 319,
                'name' => 'Зоотовары',
                'icon' => '',
                'slug' => 'zootovaryi',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 320,
                'name' => 'Вязка',
                'icon' => '',
                'slug' => 'vyazka',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 321,
                'name' => 'Бюро находок',
                'icon' => '',
                'slug' => 'byuro-nahodok',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 322,
                'name' => 'Другие  животные',
                'icon' => '',
                'slug' => 'drugie-zhivotnyie',
                'parent_id' => 311,
                'description' => '<p>Описание</p>',
            ]);
        $this->insert('category', [
            'id' => 323,
            'name' => 'Работа',
            'icon' => '/media/upload/categoryImg/work.png',
            'slug' => 'rabota',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 324,
                'name' => 'Розничная торговля / Продажи',
                'icon' => '',
                'slug' => 'roznichnaya-torgovlya-prodazhi',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 325,
                'name' => 'Транспорт / логистика',
                'icon' => '',
                'slug' => 'transport-logistika',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 326,
                'name' => 'Строительство',
                'icon' => '',
                'slug' => 'stroitelstvo',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 327,
                'name' => 'Бары / рестораны',
                'icon' => '',
                'slug' => 'baryi-restoranyi',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 328,
                'name' => 'Юриспруденция и бухгалтерия',
                'icon' => '',
                'slug' => 'yurisprudentsiya-i-buhgalteriya',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 329,
                'name' => 'Охрана / безопасность',
                'icon' => '',
                'slug' => 'ohrana-bezopasnost',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 330,
                'name' => 'Домашний персонал',
                'icon' => '',
                'slug' => 'domashniy-personal',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 331,
                'name' => 'Красота / фитнес / спорт',
                'icon' => '',
                'slug' => 'krasota-fitnes-sport',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 332,
                'name' => 'Туризм / отдых / развлечения',
                'icon' => '',
                'slug' => 'turizm-otdyih-razvlecheniya',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 333,
                'name' => 'Образование',
                'icon' => '',
                'slug' => 'obrazovanie',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 334,
                'name' => 'Культура / искусство',
                'icon' => '',
                'slug' => 'kultura-iskusstvo',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 335,
                'name' => 'Медицина / фармация',
                'icon' => '',
                'slug' => 'meditsina-farmatsiya',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 336,
                'name' => 'ИТ / телеком / компьютеры',
                'icon' => '',
                'slug' => 'it-telekom-kompyuteryi',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 337,
                'name' => 'Недвижимость',
                'icon' => '',
                'slug' => 'nedvizhimost',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 338,
                'name' => 'Маркетинг / реклама / дизайн',
                'icon' => '',
                'slug' => 'marketing-reklama-dizayn',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 339,
                'name' => 'Производство / энергетика',
                'icon' => '',
                'slug' => 'proizvodstvo-energetika',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 340,
                'name' => 'Cекретариат / АХО',
                'icon' => '',
                'slug' => 'cekretariat-aho',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 341,
                'name' => 'Начало карьеры / Студенты',
                'icon' => '',
                'slug' => 'nachalo-kareryi-studentyi',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 342,
                'name' => 'Сервис и быт',
                'icon' => '',
                'slug' => 'servis-i-byit',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 343,
                'name' => 'Другие сферы занятий',
                'icon' => '',
                'slug' => 'drugie-sferyi-zanyatiy',
                'parent_id' => 323,
                'description' => '<p>Описание</p>',
            ]);
        $this->insert('category', [
            'id' => 344,
            'name' => 'Детский мир',
            'icon' => '/media/upload/categoryImg/children.png',
            'slug' => 'detskiy-mir',
            'parent_id' => 0,
            'description' => '<p>Описание</p>',
        ]);
            $this->insert('category', [
                'id' => 345,
                'name' => 'Детская одежда',
                'icon' => '',
                'slug' => 'detskaya-odezhda',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
                $this->insert('category', [
                    'id' => 346,
                    'name' => 'Одежда для мальчиков',
                    'icon' => '',
                    'slug' => 'odezhda-dlya-malchikov',
                    'parent_id' => 345,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 347,
                    'name' => 'Одежда для девочек',
                    'icon' => '',
                    'slug' => 'odezhda-dlya-devochek',
                    'parent_id' => 345,
                    'description' => '<p>Описание</p>',
                ]);
                $this->insert('category', [
                    'id' => 348,
                    'name' => 'Одежда для новорожденных',
                    'icon' => '',
                    'slug' => 'odezhda-dlya-novorozhdennyih',
                    'parent_id' => 345,
                    'description' => '<p>Описание</p>',
                ]);
            $this->insert('category', [
                'id' => 349,
                'name' => 'Детская обувь',
                'icon' => '',
                'slug' => 'detskaya-obuv',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 350,
                'name' => 'Детские коляски',
                'icon' => '',
                'slug' => 'detskie-kolyaski',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 351,
                'name' => 'Детские автокресла',
                'icon' => '',
                'slug' => 'detskie-avtokresla',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 352,
                'name' => 'Детская мебель',
                'icon' => '',
                'slug' => 'detskaya-mebel',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 353,
                'name' => 'Игрушки',
                'icon' => '',
                'slug' => 'igrushki',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 354,
                'name' => 'Детский транспорт',
                'icon' => '',
                'slug' => 'detskiy-transport',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 355,
                'name' => 'Товары для кормления',
                'icon' => '',
                'slug' => 'tovaryi-dlya-kormleniya',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 356,
                'name' => 'Товары для школьников',
                'icon' => '',
                'slug' => 'tovaryi-dlya-shkolnikov',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);
            $this->insert('category', [
                'id' => 357,
                'name' => 'Прочие детские товары',
                'icon' => '',
                'slug' => 'prochie-detskie-tovaryi',
                'parent_id' => 344,
                'description' => '<p>Описание</p>',
            ]);

    }

    public function down()
    {
        $this->delete('category');
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
