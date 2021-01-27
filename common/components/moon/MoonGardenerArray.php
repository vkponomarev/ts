<?php

namespace common\components\moon;

class MoonGardenerArray
{

    public function gardener()
    {

        //tomato - Помидоры
        //cucumber - Огурцы
        //pepper - Перец
        //onions-on-greens - Лук на зелень
        //cabbage - Капуста
        //asparagus - Спаржа
        //eggplant - баклажаны
        //zucchini - кабачки
        //squash - патисоны
        //pumpkin - тыква
        //radish - редька
        //daikon - дайкон
        //greens - зелень
        //potatoes - картофель
        //jerusalem-artichoke - топинамбур
        //strawberries - клубника\земляника
        //peas - Горох
        //beans - бобы, фасоль
        //carrot - Морковь
        //beet - свекла
        //turnip - репа
        //celery - сельдерей
        //melons -  бахчевые
        //unfavorable -  Не благоприятные дни
        // 1 - Благоприятные дни
        // 0 - Пусто


        $gardener['unfavorable'][1] = [
            29 => 1,
            30 => 1,
            1 => 1,
            2 => 1,
            15 => 1,
            16 => 1,
            17 => 1,
        ];
        $gardener['unfavorable'][12] = $gardener['unfavorable'][11] = $gardener['unfavorable'][10] =
        $gardener['unfavorable'][9] = $gardener['unfavorable'][8] = $gardener['unfavorable'][7] =
        $gardener['unfavorable'][6] = $gardener['unfavorable'][5] = $gardener['unfavorable'][4] =
        $gardener['unfavorable'][3] = $gardener['unfavorable'][2] = $gardener['unfavorable'][1];

        $gardener['pumpkin'][5] = $gardener['melons'][5] = [
            5 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];


        $gardener['pumpkin'][6] = $gardener['melons'][6] = [
            27 => 1,
            28 => 1,
            29 => 1,
            4 => 1,
            11 => 1,
            18 => 1,
            19 => 1,
        ];


        $gardener['carrot'][2] = $gardener['beet'][2] = $gardener['turnip'][2] = $gardener['celery'][2] = [
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            28 => 1,
        ];

        $gardener['carrot'][3] = $gardener['beet'][3] = $gardener['turnip'][3] = $gardener['celery'][3] = [
            19 => 1,
            20 => 1,
            21 => 1,
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            17 => 1,
            18 => 1,
        ];

        $gardener['carrot'][4] = $gardener['beet'][4] = $gardener['turnip'][4] = $gardener['celery'][4] = [
            22 => 1,
            23 => 1,
            24 => 1,
            27 => 1,
            28 => 1,
            19 => 1,
        ];

        $gardener['carrot'][5] = $gardener['beet'][5] = $gardener['turnip'][5] = $gardener['celery'][5] = [
            26 => 1,
            27 => 1,
            12 => 1,
            13 => 1,
            15 => 1,
            19 => 1,
            20 => 1,
        ];

        $gardener['carrot'][6] = $gardener['beet'][6] = $gardener['turnip'][6] = $gardener['celery'][6] = [
            27 => 1,
            28 => 1,
            29 => 1,
            16 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['peas'][2] = $gardener['beans'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];


        $gardener['peas'][3] = $gardener['beans'][3] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
        ];

        $gardener['peas'][4] = $gardener['beans'][4] = [
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['peas'][5] = $gardener['beans'][5] = [
            6 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            18 => 1,
            19 => 1,
        ];


        $gardener['peas'][6] = $gardener['beans'][6] = [
            4 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
            13 => 1,
        ];

        $gardener['strawberries'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
        ];

        $gardener['strawberries'][3] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
        ];

        $gardener['strawberries'][4] = [
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['strawberries'][5] = [
            6 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['strawberries'][6] = [
            27 => 1,
            28 => 1,
            29 => 1,
            4 => 1,
            7 => 1,
            8 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['potatoes'][2] = $gardener['jerusalem-artichoke'][2] = [
            22 => 1,
            23 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            28 => 1,
        ];


        $gardener['potatoes'][3] = $gardener['jerusalem-artichoke'][3] = [
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            15 => 1,
            16 => 1,
            17 => 1,
        ];

        $gardener['potatoes'][4] = $gardener['jerusalem-artichoke'][4] = [
            20 => 1,
            21 => 1,
            22 => 1,
            23 => 1,
            24 => 1,
        ];

        $gardener['potatoes'][5] = $gardener['jerusalem-artichoke'][5] = [
            26 => 1,
            27 => 1,
            6 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['potatoes'][6] = $gardener['jerusalem-artichoke'][6] = [
            27 => 1,
            28 => 1,
            29 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            16 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
        ];


        $gardener['greens'][1] = [
            25 => 1,
            26 => 1,
            29 => 1,
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['greens'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['greens'][3] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['greens'][4] = [
            27 => 1,
            28 => 1,
            4 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['greens'][5] = [
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
            19 => 1,
        ];

        $gardener['greens'][6] = [
            4 => 1,
            12 => 1,
            13 => 1,
            18 => 1,
            19 => 1,
            20 => 1,
            21 => 1,
        ];

        $gardener['greens'][7] = [
            26 => 1,
            4 => 1,
            6 => 1,
            10 => 1,
            13 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
            21 => 1,
        ];

        $gardener['greens'][8] = [
            28 => 1,
            7 => 1,
            8 => 1,
            16 => 1,
            17 => 1,
            20 => 1,
        ];

        $gardener['greens'][9] = [
            27 => 1,
            5 => 1,
            6 => 1,
            14 => 1,
            24 => 1,
            25 => 1,
        ];

        $gardener['eggplant'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['eggplant'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
        ];

        $gardener['eggplant'][3] = [
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['eggplant'][4] = [
            4 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['eggplant'][5] = [
            5 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];


        $gardener['eggplant'][6] = [
            4 => 1,
            9 => 1,
            10 => 1,
            12 => 1,
            13 => 1,
        ];

        $gardener['zucchini'][5] = $gardener['eggplant'][5];
        $gardener['zucchini'][6] = $gardener['eggplant'][6];

        $gardener['zucchini'][2] = $gardener['eggplant'][2];
        $gardener['squash'][2] = $gardener['eggplant'][2];
        $gardener['pumpkin'][2] = $gardener['eggplant'][2];

        $gardener['zucchini'][3] = $gardener['eggplant'][3];
        $gardener['squash'][3] = $gardener['eggplant'][3];
        $gardener['pumpkin'][3] = $gardener['eggplant'][3];

        $gardener['zucchini'][4] = $gardener['eggplant'][4];
        $gardener['squash'][4] = $gardener['eggplant'][4];
        $gardener['pumpkin'][4] = $gardener['eggplant'][4];

        $gardener['radish'][1] = $gardener['daikon'][1] = [
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            28 => 1,
            29 => 1,
        ];

        $gardener['radish'][2] = $gardener['daikon'][2] = [
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            28 => 1,
        ];

        $gardener['radish'][3] = $gardener['daikon'][3] = [
            20 => 1,
            21 => 1,
            22 => 1,
            23 => 1,
            24 => 1,
            25 => 1,
            26 => 1,
            27 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['radish'][4] = $gardener['daikon'][4] = [
            22 => 1,
            23 => 1,
            24 => 1,
            27 => 1,
            28 => 1,
            19 => 1,
        ];

        $gardener['radish'][5] = $gardener['daikon'][5] = [
            26 => 1,
            27 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['radish'][6] = $gardener['daikon'][6] = [
            27 => 1,
            28 => 1,
            29 => 1,
            16 => 1,
            17 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['cabbage'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];



        $gardener['cabbage'][2] = [
            7 => 1,
            8 => 1,
            9 => 1,
            12 => 1,
            13 => 1,
            14 => 1,

        ];


        $gardener['cabbage'][3] = [
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];


        $gardener['cabbage'][4] = [
            4 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
        ];


        $gardener['cabbage'][5] = [
            5 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['cabbage'][6] = [
            27 => 1,
            28 => 1,
            4 => 1,
            12 => 1,
            13 => 1,
            18 => 1,
            19 => 1,
            20 => 1,
        ];

        $gardener['asparagus'] = $gardener['cabbage'];

        $gardener['onions-on-greens'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['onions-on-greens'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
        ];

        $gardener['onions-on-greens'][3] = [
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['pepper'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['pepper'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
        ];

        $gardener['pepper'][3] = [
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['pepper'][4] = [
            4 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['cucumber'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['cucumber'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
        ];

        $gardener['cucumber'][3] = [
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['cucumber'][4] = [
            4 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['cucumber'][5] = [
            26 => 1,
            27 => 1,
            5 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            19 => 1,
        ];

        $gardener['cucumber'][6] = [
            22 => 1,
            27 => 1,
            28 => 1,
            4 => 1,
            12 => 1,
            13 => 1,
            18 => 1,

        ];


        $gardener['tomato'][1] = [
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            10 => 1,
            14 => 1,
            15 => 1,
        ];

        $gardener['tomato'][2] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            7 => 1,
            8 => 1,
            9 => 1,
            13 => 1,
            14 => 1,
        ];


        $gardener['tomato'][3] = [
            3 => 1,
            4 => 1,
            5 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            12 => 1,
        ];

        $gardener['tomato'][4] = [
            8 => 1,
            9 => 1,
            10 => 1,
            15 => 1,
            16 => 1,
        ];

        $gardener['tomato'][5] = [
            5 => 1,
            7 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            15 => 1,
            18 => 1,
            19 => 1,
        ];

        $gardener['tomato'][6] = [
            4 => 1,
            9 => 1,
            10 => 1,
            12 => 1,
            13 => 1,
        ];

        /*
                $gardener['111'] = [
                    1 => ,
                    2 => ,
                    3 => ,
                    4 => ,
                    5 => ,
                    6 => ,
                    7 => ,
                    8 => ,
                    9 => ,
                    10 => ,
                    11 => ,
                    12 => ,
                    13 => ,
                    14 => ,
                    15 => ,
                    16 => ,
                    17 => ,
                    18 => ,
                    19 => ,
                    20 => ,
                    21 => ,
                    22 => ,
                    23 => ,
                    24 => ,
                    25 => ,
                    26 => ,
                    27 => ,
                    28 => ,
                    29 => ,
                    30 => ,
                ];
        */
        /*$moonDays = array();
        foreach ($gardener as $moonDayNames) {
            foreach ($moonDayNames as $moonDay => $rating) {
                if (!isset($moonDays[$moonDay][$rating])) {
                    $moonDays[$moonDay][$rating] = 1;
                }
                $moonDays[$moonDay][$rating] = $moonDays[$moonDay][$rating] + 1;
            }
        }
        (new \common\components\dump\Dump())->printR($moonDays);

        foreach ($moonDays as $dayNumber => $day) {
            //(new \common\components\dump\Dump())->printR($day);die;
            $countRatingBefore = 0;
            $count = 0;
            //(new \common\components\dump\Dump())->printR('День: ' . $dayNumber);
            foreach ($day as $rating => $countRating) {
                $count++;
                //(new \common\components\dump\Dump())->printR('Рейтинг: ' . $rating);
                //(new \common\components\dump\Dump())->printR('Количество очков: ' . $countRating);
                if ($countRating >= $countRatingBefore) {
                    //(new \common\components\dump\Dump())->printR('Количество очков ' . $countRating . ' Больше чем ' . $countRatingBefore);
                    $moonDaysLast[$dayNumber] = $rating;
                    $countRatingBefore = $countRating;
                }


            }


            //die;
        }*/
        //(new \common\components\dump\Dump())->printR($moonDaysLast);die;

        return $gardener;

    }
}

