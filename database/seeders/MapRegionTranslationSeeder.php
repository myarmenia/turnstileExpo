<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapRegionTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 1

        DB::table('map_region_translations')->insert([
            'id' => 1,
            'map_region_id' => 1,
            'language_id' => 1,
            'title' => 'California',
            'long_title' => 'California (USA)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 2,
            'map_region_id' => 1,
            'language_id' => 2,
            'title' => 'Калифорния',
            'long_title' => 'Калифорния (США)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 3,
            'map_region_id' => 1,
            'language_id' => 3,
            'title' => 'Կալիֆոռնիա',
            'long_title' => 'Կալիֆոռնիա (ԱՄՆ)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 2

        DB::table('map_region_translations')->insert([
            'id' => 4,
            'map_region_id' => 2,
            'language_id' => 1,
            'title' => 'Gorda Plate',
            'long_title' => 'Gorda Plate (USA, Canada)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 5,
            'map_region_id' => 2,
            'language_id' => 2,
            'title' => 'Плита Горда',
            'long_title' => 'Плита Горда (США, Канада)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 6,
            'map_region_id' => 2,
            'language_id' => 3,
            'title' => 'Գորդա Սալ',
            'long_title' => 'Գորդա սալ (ԱՄՆ, Կանադա)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 3

        DB::table('map_region_translations')->insert([
            'id' => 7,
            'map_region_id' => 3,
            'language_id' => 1,
            'title' => 'Italy',
            'long_title' => 'Italy',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 8,
            'map_region_id' => 3,
            'language_id' => 2,
            'title' => 'Италия',
            'long_title' => 'Италия',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 9,
            'map_region_id' => 3,
            'language_id' => 3,
            'title' => 'Իտալիա',
            'long_title' => 'Իտալիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 4

        DB::table('map_region_translations')->insert([
            'id' => 10,
            'map_region_id' => 4,
            'language_id' => 1,
            'title' => 'Tauro-Caucasus, N Iran',
            'long_title' => 'Tauro-Caucasus, Northern Iran',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 11,
            'map_region_id' => 4,
            'language_id' => 2,
            'title' => 'Тавро-Кавказ, С Иран',
            'long_title' => 'Тавро-Кавказ, Северный Иран',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 12,
            'map_region_id' => 4,
            'language_id' => 3,
            'title' => 'Տավրո-Կովկաս, Հս Իրան',
            'long_title' => 'Տավրո-Կովկաս, Հյուսիսային Իրան',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 5

        DB::table('map_region_translations')->insert([
            'id' => 13,
            'map_region_id' => 5,
            'language_id' => 1,
            'title' => 'Far East',
            'long_title' => 'Far East (Russia, Japan)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 14,
            'map_region_id' => 5,
            'language_id' => 2,
            'title' => 'Дальный Восток',
            'long_title' => 'Дальный Восток (Россия, Япония)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 15,
            'map_region_id' => 5,
            'language_id' => 3,
            'title' => 'Հեռավոր Արևելք',
            'long_title' => 'Հեռավոր Արևելք (Ռուսաստան, Ճապոնիա)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 6

        DB::table('map_region_translations')->insert([
            'id' => 16,
            'map_region_id' => 6,
            'language_id' => 1,
            'title' => 'S Iran',
            'long_title' => 'Southern Iran',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 17,
            'map_region_id' => 6,
            'language_id' => 2,
            'title' => 'Ю Иран',
            'long_title' => 'Южный Иран',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 18,
            'map_region_id' => 6,
            'language_id' => 3,
            'title' => 'Հվ Իրան',
            'long_title' => 'Հարավային Իրան',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 7

        DB::table('map_region_translations')->insert([
            'id' => 19,
            'map_region_id' => 7,
            'language_id' => 1,
            'title' => 'Japan',
            'long_title' => 'Japan',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 20,
            'map_region_id' => 7,
            'language_id' => 2,
            'title' => 'Япония',
            'long_title' => 'Япония',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 21,
            'map_region_id' => 7,
            'language_id' => 3,
            'title' => 'Ճապոնիա',
            'long_title' => 'Ճապոնիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 8

        DB::table('map_region_translations')->insert([
            'id' => 22,
            'map_region_id' => 8,
            'language_id' => 1,
            'title' => 'Burma plate',
            'long_title' => 'Burma microplate',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 23,
            'map_region_id' => 8,
            'language_id' => 2,
            'title' => 'Плита Бирма',
            'long_title' => 'Микроплита Бирма',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 24,
            'map_region_id' => 8,
            'language_id' => 3,
            'title' => 'Բիրմա Սալ',
            'long_title' => 'Բիրմա միկրոսալ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 9

        DB::table('map_region_translations')->insert([
            'id' => 25,
            'map_region_id' => 9,
            'language_id' => 1,
            'title' => 'Taiwan',
            'long_title' => 'Taiwan',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 26,
            'map_region_id' => 9,
            'language_id' => 2,
            'title' => 'Тайвань',
            'long_title' => 'Тайвань',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 27,
            'map_region_id' => 9,
            'language_id' => 3,
            'title' => 'Թայվան',
            'long_title' => 'Թայվան',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 10

        DB::table('map_region_translations')->insert([
            'id' => 28,
            'map_region_id' => 10,
            'language_id' => 1,
            'title' => 'Gibraltar',
            'long_title' => 'Gibraltar',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 29,
            'map_region_id' => 10,
            'language_id' => 2,
            'title' => 'Гибралтар',
            'long_title' => 'Гибралтар',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 30,
            'map_region_id' => 10,
            'language_id' => 3,
            'title' => 'Ջիբրալթար',
            'long_title' => 'Ջիբրալթար',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 11

        DB::table('map_region_translations')->insert([
            'id' => 31,
            'map_region_id' => 11,
            'language_id' => 1,
            'title' => 'Sumatra',
            'long_title' => 'Sumatra',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 32,
            'map_region_id' => 11,
            'language_id' => 2,
            'title' => 'Суматра',
            'long_title' => 'Суматра',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 33,
            'map_region_id' => 11,
            'language_id' => 3,
            'title' => 'Սումատրա',
            'long_title' => 'Սումատրա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 12

        DB::table('map_region_translations')->insert([
            'id' => 34,
            'map_region_id' => 12,
            'language_id' => 1,
            'title' => 'Java',
            'long_title' => 'Java',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 35,
            'map_region_id' => 12,
            'language_id' => 2,
            'title' => 'Ява',
            'long_title' => 'Ява',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 36,
            'map_region_id' => 12,
            'language_id' => 3,
            'title' => 'Յավա',
            'long_title' => 'Յավա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 13

        DB::table('map_region_translations')->insert([
            'id' => 37,
            'map_region_id' => 13,
            'language_id' => 1,
            'title' => 'Mozambique',
            'long_title' => 'Mozambique',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 38,
            'map_region_id' => 13,
            'language_id' => 2,
            'title' => 'Мозамбик',
            'long_title' => 'Мозамбик',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 39,
            'map_region_id' => 13,
            'language_id' => 3,
            'title' => 'Մոզամբիկ',
            'long_title' => 'Մոզամբիկ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 14

        DB::table('map_region_translations')->insert([
            'id' => 40,
            'map_region_id' => 14,
            'language_id' => 1,
            'title' => 'Koryak',
            'long_title' => 'Koryak',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 41,
            'map_region_id' => 14,
            'language_id' => 2,
            'title' => 'Корякия',
            'long_title' => 'Корякия',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 42,
            'map_region_id' => 14,
            'language_id' => 3,
            'title' => 'Կորյակիա',
            'long_title' => 'Կորյակիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 15

        DB::table('map_region_translations')->insert([
            'id' => 43,
            'map_region_id' => 15,
            'language_id' => 1,
            'title' => 'Crimea-Caucasus',
            'long_title' => 'Crimea-Caucasus',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 44,
            'map_region_id' => 15,
            'language_id' => 2,
            'title' => 'Крым-Кавказ',
            'long_title' => 'Крым-Кавказ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 45,
            'map_region_id' => 15,
            'language_id' => 3,
            'title' => 'Ղրիմ-Կովկաս',
            'long_title' => 'Ղրիմ-Կովկաս',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 16

        DB::table('map_region_translations')->insert([
            'id' => 46,
            'map_region_id' => 16,
            'language_id' => 1,
            'title' => 'Pakistan',
            'long_title' => 'Pakistan',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 47,
            'map_region_id' => 16,
            'language_id' => 2,
            'title' => 'Пакистан',
            'long_title' => 'Пакистан',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 48,
            'map_region_id' => 16,
            'language_id' => 3,
            'title' => 'Պակիստան',
            'long_title' => 'Պակիստան',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 17

        DB::table('map_region_translations')->insert([
            'id' => 49,
            'map_region_id' => 17,
            'language_id' => 1,
            'title' => 'Tibet',
            'long_title' => 'Tibet',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 50,
            'map_region_id' => 17,
            'language_id' => 2,
            'title' => 'Тибет',
            'long_title' => 'Тибет',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 51,
            'map_region_id' => 17,
            'language_id' => 3,
            'title' => 'Տիբեթ',
            'long_title' => 'Տիբեթ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 18

        DB::table('map_region_translations')->insert([
            'id' => 52,
            'map_region_id' => 18,
            'language_id' => 1,
            'title' => 'Myanmar',
            'long_title' => 'Myanmar',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 53,
            'map_region_id' => 18,
            'language_id' => 2,
            'title' => 'Мьянма',
            'long_title' => 'Мьянма',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 54,
            'map_region_id' => 18,
            'language_id' => 3,
            'title' => 'Մյանմար',
            'long_title' => 'Մյանմար',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 19

        DB::table('map_region_translations')->insert([
            'id' => 55,
            'map_region_id' => 19,
            'language_id' => 1,
            'title' => 'NE China',
            'long_title' => 'North-East China',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 56,
            'map_region_id' => 19,
            'language_id' => 2,
            'title' => 'СВ Китай',
            'long_title' => 'Северо-Восточный Китай',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 57,
            'map_region_id' => 19,
            'language_id' => 3,
            'title' => 'Հս-Արլ Չինաստան',
            'long_title' => 'Հյուսիս-Արևելյան Չինաստան',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 20

        DB::table('map_region_translations')->insert([
            'id' => 58,
            'map_region_id' => 20,
            'language_id' => 1,
            'title' => 'Sinai',
            'long_title' => 'Sinai',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 59,
            'map_region_id' => 20,
            'language_id' => 2,
            'title' => 'Синай',
            'long_title' => 'Синай',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 60,
            'map_region_id' => 20,
            'language_id' => 3,
            'title' => 'Սինայ',
            'long_title' => 'Սինայ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 21

        DB::table('map_region_translations')->insert([
            'id' => 61,
            'map_region_id' => 21,
            'language_id' => 1,
            'title' => 'Central USA',
            'long_title' => 'Central USA',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 62,
            'map_region_id' => 21,
            'language_id' => 2,
            'title' => 'Центральная США',
            'long_title' => 'Центральная часть США',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 63,
            'map_region_id' => 21,
            'language_id' => 3,
            'title' => 'Կենտրոնական ԱՄՆ',
            'long_title' => 'Կենտրոնական ԱՄՆ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 22

        DB::table('map_region_translations')->insert([
            'id' => 64,
            'map_region_id' => 22,
            'language_id' => 1,
            'title' => 'Vrancea',
            'long_title' => 'Romania (Vrancea)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 65,
            'map_region_id' => 22,
            'language_id' => 2,
            'title' => 'Вранча',
            'long_title' => 'Румыния (Вранча)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 66,
            'map_region_id' => 22,
            'language_id' => 3,
            'title' => 'Վրանչա',
            'long_title' => 'Ռումինիա (Վրանչա)',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 23

        DB::table('map_region_translations')->insert([
            'id' => 67,
            'map_region_id' => 23,
            'language_id' => 1,
            'title' => 'Haiti',
            'long_title' => 'Haiti',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 68,
            'map_region_id' => 23,
            'language_id' => 2,
            'title' => 'Гаити',
            'long_title' => 'Гаити',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 69,
            'map_region_id' => 23,
            'language_id' => 3,
            'title' => 'Հայիթի',
            'long_title' => 'Հայիթի',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 24

        DB::table('map_region_translations')->insert([
            'id' => 70,
            'map_region_id' => 24,
            'language_id' => 1,
            'title' => 'Zambia',
            'long_title' => 'Zambia',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 71,
            'map_region_id' => 24,
            'language_id' => 2,
            'title' => 'Замбия',
            'long_title' => 'Замбия',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 72,
            'map_region_id' => 24,
            'language_id' => 3,
            'title' => 'Զամբիա',
            'long_title' => 'Զամբիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 25

        DB::table('map_region_translations')->insert([
            'id' => 73,
            'map_region_id' => 25,
            'language_id' => 1,
            'title' => 'Chile',
            'long_title' => 'Chile',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 74,
            'map_region_id' => 25,
            'language_id' => 2,
            'title' => 'Чили',
            'long_title' => 'Чили',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 75,
            'map_region_id' => 25,
            'language_id' => 3,
            'title' => 'Չիլի',
            'long_title' => 'Չիլի',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 26

        DB::table('map_region_translations')->insert([
            'id' => 76,
            'map_region_id' => 26,
            'language_id' => 1,
            'title' => 'Puerto Rico',
            'long_title' => 'Puerto Rico',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 77,
            'map_region_id' => 26,
            'language_id' => 2,
            'title' => 'Пуэрто Рико',
            'long_title' => 'Пуэрто Рико',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 78,
            'map_region_id' => 26,
            'language_id' => 3,
            'title' => 'Պուերտո Ռիկո',
            'long_title' => 'Պուերտո Ռիկո',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 27

        DB::table('map_region_translations')->insert([
            'id' => 79,
            'map_region_id' => 27,
            'language_id' => 1,
            'title' => 'NW Mexico',
            'long_title' => 'North-Western Mexico',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 80,
            'map_region_id' => 27,
            'language_id' => 2,
            'title' => 'СЗ Мексика',
            'long_title' => 'Северо-Западная Мексика',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 81,
            'map_region_id' => 27,
            'language_id' => 3,
            'title' => 'Հս-Արմ Մեքսիկա',
            'long_title' => 'Հյուսիս-Արևմտյան Մեքսիկա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 28

        DB::table('map_region_translations')->insert([
            'id' => 82,
            'map_region_id' => 28,
            'language_id' => 1,
            'title' => 'Belize',
            'long_title' => 'Belize',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 83,
            'map_region_id' => 28,
            'language_id' => 2,
            'title' => 'Белиз',
            'long_title' => 'Белиз',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 84,
            'map_region_id' => 28,
            'language_id' => 3,
            'title' => 'Բելիզ',
            'long_title' => 'Բելիզ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);


        // 29

        DB::table('map_region_translations')->insert([
            'id' => 85,
            'map_region_id' => 29,
            'language_id' => 1,
            'title' => 'Peru',
            'long_title' => 'Peru',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 86,
            'map_region_id' => 29,
            'language_id' => 2,
            'title' => 'Перу',
            'long_title' => 'Перу',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 87,
            'map_region_id' => 29,
            'language_id' => 3,
            'title' => 'Պերու',
            'long_title' => 'Պերու',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 30

        DB::table('map_region_translations')->insert([
            'id' => 88,
            'map_region_id' => 30,
            'language_id' => 1,
            'title' => 'Mexico',
            'long_title' => 'Mexico',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 89,
            'map_region_id' => 30,
            'language_id' => 2,
            'title' => 'Мексика',
            'long_title' => 'Мексика',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 90,
            'map_region_id' => 30,
            'language_id' => 3,
            'title' => 'Մեքսիկա',
            'long_title' => 'Մեքսիկա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 31

        DB::table('map_region_translations')->insert([
            'id' => 91,
            'map_region_id' => 31,
            'language_id' => 1,
            'title' => 'Middle Asia',
            'long_title' => 'Middle Asia',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 92,
            'map_region_id' => 31,
            'language_id' => 2,
            'title' => 'Средняя Азия',
            'long_title' => 'Средняя Азия',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 93,
            'map_region_id' => 31,
            'language_id' => 3,
            'title' => 'Միջին Ասիա',
            'long_title' => 'Միջին Ասիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 32

        DB::table('map_region_translations')->insert([
            'id' => 94,
            'map_region_id' => 32,
            'language_id' => 1,
            'title' => 'Altai',
            'long_title' => 'Altai',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 95,
            'map_region_id' => 32,
            'language_id' => 2,
            'title' => 'Алтай',
            'long_title' => 'Алтай',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 96,
            'map_region_id' => 32,
            'language_id' => 3,
            'title' => 'Ալթայ',
            'long_title' => 'Ալթայ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 33

        DB::table('map_region_translations')->insert([
            'id' => 97,
            'map_region_id' => 33,
            'language_id' => 1,
            'title' => 'Baykal',
            'long_title' => 'Baykal',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 98,
            'map_region_id' => 33,
            'language_id' => 2,
            'title' => 'Байкал',
            'long_title' => 'Байкал',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 99,
            'map_region_id' => 33,
            'language_id' => 3,
            'title' => 'Բայկալ',
            'long_title' => 'Բայկալ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 34

        DB::table('map_region_translations')->insert([
            'id' => 100,
            'map_region_id' => 34,
            'language_id' => 1,
            'title' => 'Amursk',
            'long_title' => 'Amursk',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 101,
            'map_region_id' => 34,
            'language_id' => 2,
            'title' => 'Амурская',
            'long_title' => 'Амурская',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 102,
            'map_region_id' => 34,
            'language_id' => 3,
            'title' => 'Ամուրսկ',
            'long_title' => 'Ամուրսկ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 35

        DB::table('map_region_translations')->insert([
            'id' => 103,
            'map_region_id' => 35,
            'language_id' => 1,
            'title' => 'W Turkey',
            'long_title' => 'Western Turkey',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 104,
            'map_region_id' => 35,
            'language_id' => 2,
            'title' => 'З Турция',
            'long_title' => 'Западная Турция',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 105,
            'map_region_id' => 35,
            'language_id' => 3,
            'title' => 'Արմ Թուրքիա',
            'long_title' => 'Արևմտյան Թուրքիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 36

        DB::table('map_region_translations')->insert([
            'id' => 106,
            'map_region_id' => 36,
            'language_id' => 1,
            'title' => 'Philippines',
            'long_title' => 'Philippines',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 107,
            'map_region_id' => 36,
            'language_id' => 2,
            'title' => 'Филиппины',
            'long_title' => 'Филиппины',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 108,
            'map_region_id' => 36,
            'language_id' => 3,
            'title' => 'Ֆիլիպիններ',
            'long_title' => 'Ֆիլիպիններ',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        // 37

        DB::table('map_region_translations')->insert([
            'id' => 109,
            'map_region_id' => 37,
            'language_id' => 1,
            'title' => 'New Zealand',
            'long_title' => 'New Zealand',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 110,
            'map_region_id' => 37,
            'language_id' => 2,
            'title' => 'Новая Зеландия',
            'long_title' => 'Новая Зеландия',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('map_region_translations')->insert([
            'id' => 111,
            'map_region_id' => 37,
            'language_id' => 3,
            'title' => 'Նոր Զելանդիա',
            'long_title' => 'Նոր Զելանդիա',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
        
    }
}
