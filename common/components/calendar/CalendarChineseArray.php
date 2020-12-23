<?php

namespace common\components\calendar;

use Yii;

class CalendarChineseArray
{

    public function animal($animalNumber)
    {

        $animal[1] = Yii::t('app', 'year of the rat');
        $animal[2] = Yii::t('app', 'year of the bull');
        $animal[3] = Yii::t('app', 'year of the tiger');
        $animal[4] = Yii::t('app', 'year of the rabbit');
        $animal[5] = Yii::t('app', 'year of the dragon');
        $animal[6] = Yii::t('app', 'year of the snake');
        $animal[7] = Yii::t('app', 'year of the horse');
        $animal[8] = Yii::t('app', 'year of the sheep');
        $animal[9] = Yii::t('app', 'year of the monkey');
        $animal[10] = Yii::t('app', 'year of the rooster');
        $animal[11] = Yii::t('app', 'year of the dog');
        $animal[12] = Yii::t('app', 'year of the pig');

        return $animal[$animalNumber];

    }

    public function color($colorNumber)
    {

        $color[1] = Yii::t('app', 'white');
        $color[2] = Yii::t('app', 'black');
        $color[3] = Yii::t('app', 'blue-green');
        $color[4] = Yii::t('app', 'red');
        $color[5] = Yii::t('app', 'yellow');


        return $color[$colorNumber];

    }

    public function element($elementNumber)
    {

        $element[1] = Yii::t('app', 'metal');
        $element[2] = Yii::t('app', 'water');
        $element[3] = Yii::t('app', 'wood');
        $element[4] = Yii::t('app', 'fire');
        $element[5] = Yii::t('app', 'earth');


        return $element[$elementNumber];

    }


    public function calendar($year)
    {

        /**
         * 1- Крыса
         * 2- Бык
         * 3- Тигр
         * 4- Кролик
         * 5- Дракон
         * 6- Змея
         * 7- Лошадь
         * 8- Овца
         * 9- Обезьяна
         * 10- Петух
         * 11- Собака
         * 12- Свинья
         *
         */

        /**
         * 1- белый
         * 2- черный
         * 3- сине-зеленый
         * 4- красный
         * 5- желтый
         */

        /**
         * 1- Металл
         * 2- Вода
         * 3- Дерево
         * 4- Огонь
         * 5- Земля
         *
         */

        $calendar[1959] = [
            'animal' => 12,
            'color' => 5,
            'element' => 5,
            'startDate' => '1959-02-12',
            'endDate' => '1960-02-01',
        ];

        $calendar[2019] = [
            'animal' => 12,
            'color' => 5,
            'element' => 5,
            'startDate' => '2019-02-01',
            'endDate' => '2020-02-19',
        ];

        $calendar[2079] = [
            'animal' => 12,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1958] = [
            'animal' => 11,
            'color' => 5,
            'element' => 5,
            'startDate' => '1958-01-24',
            'endDate' => '1959-02-11',
        ];

        $calendar[2018] = [
            'animal' => 11,
            'color' => 5,
            'element' => 5,
            'startDate' => '2018-02-11',
            'endDate' => '2019-01-31',
        ];

        $calendar[2078] = [
            'animal' => 11,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1957] = [
            'animal' => 10,
            'color' => 4,
            'element' => 4,
            'startDate' => '1957-02-04',
            'endDate' => '1958-01-23',
        ];

        $calendar[2017] = [
            'animal' => 10,
            'color' => 4,
            'element' => 4,
            'startDate' => '2017-01-23',
            'endDate' => '2018-02-10',
        ];

        $calendar[2077] = [
            'animal' => 10,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];


        $calendar[1956] = [
            'animal' => 9,
            'color' => 4,
            'element' => 4,
            'startDate' => '1956-02-15',
            'endDate' => '1957-02-03',
        ];

        $calendar[2016] = [
            'animal' => 9,
            'color' => 4,
            'element' => 4,
            'startDate' => '2016-02-03',
            'endDate' => '2017-01-22',
        ];

        $calendar[2076] = [
            'animal' => 9,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1955] = [
            'animal' => 8,
            'color' => 3,
            'element' => 3,
            'startDate' => '1955-01-28',
            'endDate' => '1956-02-14',
        ];

        $calendar[2015] = [
            'animal' => 8,
            'color' => 3,
            'element' => 3,
            'startDate' => '2015-02-14',
            'endDate' => '2016-02-02',
        ];

        $calendar[2075] = [
            'animal' => 8,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1954] = [
            'animal' => 7,
            'color' => 3,
            'element' => 3,
            'startDate' => '1954-02-08',
            'endDate' => '1955-01-27',
        ];

        $calendar[2014] = [
            'animal' => 7,
            'color' => 3,
            'element' => 3,
            'startDate' => '2014-01-26',
            'endDate' => '2015-02-13',
        ];

        $calendar[2074] = [
            'animal' => 7,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1953] = [
            'animal' => 6,
            'color' => 2,
            'element' => 2,
            'startDate' => '1953-02-19',
            'endDate' => '1954-02-07',
        ];

        $calendar[2013] = [
            'animal' => 6,
            'color' => 2,
            'element' => 2,
            'startDate' => '2013-02-06',
            'endDate' => '2014-01-25',
        ];

        $calendar[2073] = [
            'animal' => 6,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1952] = [
            'animal' => 5,
            'color' => 2,
            'element' => 2,
            'startDate' => '1952-01-27',
            'endDate' => '1953-02-13',
        ];

        $calendar[2012] = [
            'animal' => 5,
            'color' => 2,
            'element' => 2,
            'startDate' => '2012-01-23',
            'endDate' => '2013-02-09',
        ];

        $calendar[2072] = [
            'animal' => 5,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1951] = [
            'animal' => 4,
            'color' => 1,
            'element' => 1,
            'startDate' => '1951-02-06',
            'endDate' => '1952-01-26',
        ];

        $calendar[2011] = [
            'animal' => 4,
            'color' => 1,
            'element' => 1,
            'startDate' => '2011-02-03',
            'endDate' => '2012-01-22',
        ];

        $calendar[2071] = [
            'animal' => 4,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1950] = [
            'animal' => 3,
            'color' => 1,
            'element' => 1,
            'startDate' => '1950-02-17',
            'endDate' => '1951-02-05',
        ];

        $calendar[2010] = [
            'animal' => 3,
            'color' => 1,
            'element' => 1,
            'startDate' => '2010-02-14',
            'endDate' => '2011-02-02',
        ];

        $calendar[2070] = [
            'animal' => 3,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1949] = [
            'animal' => 2,
            'color' => 5,
            'element' => 5,
            'startDate' => '1949-01-29',
            'endDate' => '1950-02-16',
        ];

        $calendar[2009] = [
            'animal' => 2,
            'color' => 5,
            'element' => 5,
            'startDate' => '2009-01-26',
            'endDate' => '2010-02-13',
        ];

        $calendar[2069] = [
            'animal' => 2,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1948] = [
            'animal' => 1,
            'color' => 5,
            'element' => 5,
            'startDate' => '1948-02-10',
            'endDate' => '1949-01-28',
        ];

        $calendar[2008] = [
            'animal' => 1,
            'color' => 5,
            'element' => 5,
            'startDate' => '2008-02-07',
            'endDate' => '2009-01-25',
        ];

        $calendar[2068] = [
            'animal' => 1,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1947] = [
            'animal' => 12,
            'color' => 4,
            'element' => 4,
            'startDate' => '1947-01-26',
            'endDate' => '1948-02-13',
        ];
        $calendar[2007] = [
            'animal' => 12,
            'color' => 4,
            'element' => 4,
            'startDate' => '2007-02-13',
            'endDate' => '2008-02-01',
        ];
        $calendar[2067] = [
            'animal' => 12,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];


        $calendar[1946] = [
            'animal' => 11,
            'color' => 4,
            'element' => 4,
            'startDate' => '1946-02-06',
            'endDate' => '1947-01-25',
        ];


        $calendar[2006] = [
            'animal' => 11,
            'color' => 4,
            'element' => 4,
            'startDate' => '2006-01-25',
            'endDate' => '2007-02-12',
        ];

        $calendar[2066] = [
            'animal' => 11,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1945] = [
            'animal' => 10,
            'color' => 3,
            'element' => 3,
            'startDate' => '1945-02-17',
            'endDate' => '1946-02-05',
        ];

        $calendar[2005] = [
            'animal' => 10,
            'color' => 3,
            'element' => 3,
            'startDate' => '2005-02-04',
            'endDate' => '2006-01-24',
        ];

        $calendar[2065] = [
            'animal' => 10,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1944] = [
            'animal' => 9,
            'color' => 3,
            'element' => 3,
            'startDate' => '1944-01-30',
            'endDate' => '1945-02-16',
        ];

        $calendar[2004] = [
            'animal' => 9,
            'color' => 3,
            'element' => 3,
            'startDate' => '2004-02-16',
            'endDate' => '2005-02-03',
        ];

        $calendar[2064] = [
            'animal' => 9,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];


        $calendar[1943] = [
            'animal' => 8,
            'color' => 2,
            'element' => 2,
            'startDate' => '1943-02-10',
            'endDate' => '1944-01-29',
        ];

        $calendar[2003] = [
            'animal' => 8,
            'color' => 2,
            'element' => 2,
            'startDate' => '2003-01-29',
            'endDate' => '2004-02-15',
        ];

        $calendar[2063] = [
            'animal' => 8,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1942] = [
            'animal' => 7,
            'color' => 2,
            'element' => 2,
            'startDate' => '1942-01-22',
            'endDate' => '1943-02-09',
        ];

        $calendar[2002] = [
            'animal' => 7,
            'color' => 2,
            'element' => 2,
            'startDate' => '2002-02-08',
            'endDate' => '2003-01-28',
        ];

        $calendar[2062] = [
            'animal' => 7,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1941] = [
            'animal' => 6,
            'color' => 1,
            'element' => 1,
            'startDate' => '1941-02-01',
            'endDate' => '1942-01-21',
        ];

        $calendar[2001] = [
            'animal' => 6,
            'color' => 1,
            'element' => 1,
            'startDate' => '2001-02-19',
            'endDate' => '2002-02-07',
        ];

        $calendar[2061] = [
            'animal' => 6,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];


        $calendar[1940] = [
            'animal' => 5,
            'color' => 1,
            'element' => 1,
            'startDate' => '1940-02-08',
            'endDate' => '1941-01-26',
        ];

        $calendar[2000] = [
            'animal' => 5,
            'color' => 1,
            'element' => 1,
            'startDate' => '2000-02-05',
            'endDate' => '2001-01-23',
        ];

        $calendar[2060] = [
            'animal' => 5,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1939] = [
            'animal' => 4,
            'color' => 5,
            'element' => 5,
            'startDate' => '1939-02-19',
            'endDate' => '1940-02-07',
        ];

        $calendar[1999] = [
            'animal' => 4,
            'color' => 5,
            'element' => 5,
            'startDate' => '1999-02-16',
            'endDate' => '2000-02-04',
        ];

        $calendar[2059] = [
            'animal' => 4,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1938] = [
            'animal' => 3,
            'color' => 5,
            'element' => 5,
            'startDate' => '1938-01-31',
            'endDate' => '1939-02-18',
        ];

        $calendar[1998] = [
            'animal' => 3,
            'color' => 5,
            'element' => 5,
            'startDate' => '1998-01-28',
            'endDate' => '1999-02-15',
        ];

        $calendar[2058] = [
            'animal' => 3,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];


        $calendar[1937] = [
            'animal' => 2,
            'color' => 4,
            'element' => 4,
            'startDate' => '1937-02-11',
            'endDate' => '1938-01-30',
        ];

        $calendar[1997] = [
            'animal' => 2,
            'color' => 4,
            'element' => 4,
            'startDate' => '1997-02-07',
            'endDate' => '1998-01-27',
        ];

        $calendar[2057] = [
            'animal' => 2,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1936] = [
            'animal' => 1,
            'color' => 4,
            'element' => 4,
            'startDate' => '1936-01-24',
            'endDate' => '1937-02-10',
        ];

        $calendar[1996] = [
            'animal' => 1,
            'color' => 4,
            'element' => 4,
            'startDate' => '1996-02-19',
            'endDate' => '1997-02-06',
        ];

        $calendar[2056] = [
            'animal' => 1,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1935] = [
            'animal' => 12,
            'color' => 3,
            'element' => 3,
            'startDate' => '1935-02-08',
            'endDate' => '1936-01-27',
        ];

        $calendar[1995] = [
            'animal' => 12,
            'color' => 3,
            'element' => 3,
            'startDate' => '1995-02-05',
            'endDate' => '1996-01-24',
        ];

        $calendar[2055] = [
            'animal' => 12,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1934] = [
            'animal' => 11,
            'color' => 3,
            'element' => 3,
            'startDate' => '1934-02-19',
            'endDate' => '1935-02-07',
        ];

        $calendar[1994] = [
            'animal' => 11,
            'color' => 3,
            'element' => 3,
            'startDate' => '1994-02-15',
            'endDate' => '1995-02-04',
        ];

        $calendar[2054] = [
            'animal' => 11,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1933] = [
            'animal' => 10,
            'color' => 2,
            'element' => 2,
            'startDate' => '1933-01-31',
            'endDate' => '1934-02-18',
        ];

        $calendar[1993] = [
            'animal' => 10,
            'color' => 2,
            'element' => 2,
            'startDate' => '1993-01-27',
            'endDate' => '1994-02-14',
        ];

        $calendar[2053] = [
            'animal' => 10,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1932] = [
            'animal' => 9,
            'color' => 2,
            'element' => 2,
            'startDate' => '1932-02-11',
            'endDate' => '1933-01-30',
        ];

        $calendar[1992] = [
            'animal' => 9,
            'color' => 2,
            'element' => 2,
            'startDate' => '1992-02-07',
            'endDate' => '1993-01-26',
        ];

        $calendar[2052] = [
            'animal' => 9,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1931] = [
            'animal' => 8,
            'color' => 1,
            'element' => 1,
            'startDate' => '1931-01-23',
            'endDate' => '1932-02-10',
        ];

        $calendar[1991] = [
            'animal' => 8,
            'color' => 1,
            'element' => 1,
            'startDate' => '1991-02-18',
            'endDate' => '1992-02-06',
        ];

        $calendar[2051] = [
            'animal' => 8,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1930] = [
            'animal' => 7,
            'color' => 1,
            'element' => 1,
            'startDate' => '1930-02-03',
            'endDate' => '1931-01-22',
        ];

        $calendar[1990] = [
            'animal' => 7,
            'color' => 1,
            'element' => 1,
            'startDate' => '1990-01-30',
            'endDate' => '1991-02-17',
        ];

        $calendar[2050] = [
            'animal' => 7,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1929] = [
            'animal' => 6,
            'color' => 5,
            'element' => 5,
            'startDate' => '1929-02-13',
            'endDate' => '1930-02-02',
        ];

        $calendar[1989] = [
            'animal' => 6,
            'color' => 5,
            'element' => 5,
            'startDate' => '1989-02-10',
            'endDate' => '1990-01-29',
        ];

        $calendar[2049] = [
            'animal' => 6,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1928] = [
            'animal' => 5,
            'color' => 5,
            'element' => 5,
            'startDate' => '1928-01-23',
            'endDate' => '1929-02-09',
        ];

        $calendar[1988] = [
            'animal' => 5,
            'color' => 5,
            'element' => 5,
            'startDate' => '1988-02-17',
            'endDate' => '1989-02-05',
        ];

        $calendar[2048] = [
            'animal' => 5,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1927] = [
            'animal' => 4,
            'color' => 4,
            'element' => 4,
            'startDate' => '1927-02-02',
            'endDate' => '1928-01-22',
        ];

        $calendar[1987] = [
            'animal' => 4,
            'color' => 4,
            'element' => 4,
            'startDate' => '1987-01-29',
            'endDate' => '1988-02-16',
        ];

        $calendar[2047] = [
            'animal' => 4,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1926] = [
            'animal' => 3,
            'color' => 4,
            'element' => 4,
            'startDate' => '1926-02-13',
            'endDate' => '1927-02-01',
        ];

        $calendar[1986] = [
            'animal' => 3,
            'color' => 4,
            'element' => 4,
            'startDate' => '1986-02-09',
            'endDate' => '1987-01-28',
        ];

        $calendar[2046] = [
            'animal' => 3,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1925] = [
            'animal' => 2,
            'color' => 3,
            'element' => 3,
            'startDate' => '1925-01-24',
            'endDate' => '1926-02-12',
        ];

        $calendar[1985] = [
            'animal' => 2,
            'color' => 3,
            'element' => 3,
            'startDate' => '1985-02-20',
            'endDate' => '1986-02-08',
        ];

        $calendar[2045] = [
            'animal' => 2,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1924] = [
            'animal' => 1,
            'color' => 3,
            'element' => 3,
            'startDate' => '1924-02-05',
            'endDate' => '1925-01-23',
        ];

        $calendar[1984] = [
            'animal' => 1,
            'color' => 3,
            'element' => 3,
            'startDate' => '1984-02-02',
            'endDate' => '1985-02-19',
        ];

        $calendar[2044] = [
            'animal' => 1,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1923] = [
            'animal' => 12,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1983] = [
            'animal' => 12,
            'color' => 2,
            'element' => 2,
            'startDate' => '1983-02-17',
            'endDate' => '1984-02-05',
        ];

        $calendar[2043] = [
            'animal' => 12,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1922] = [
            'animal' => 11,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1982] = [
            'animal' => 11,
            'color' => 2,
            'element' => 2,
            'startDate' => '1982-01-29',
            'endDate' => '1983-02-16',
        ];

        $calendar[2042] = [
            'animal' => 11,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1921] = [
            'animal' => 10,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1981] = [
            'animal' => 10,
            'color' => 1,
            'element' => 1,
            'startDate' => '1981-02-09',
            'endDate' => '1982-01-28',
        ];

        $calendar[2041] = [
            'animal' => 10,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1920] = [
            'animal' => 9,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1980] = [
            'animal' => 9,
            'color' => 1,
            'element' => 1,
            'startDate' => '1980-01-22',
            'endDate' => '1981-02-08',
        ];

        $calendar[2040] = [
            'animal' => 9,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1919] = [
            'animal' => 8,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1979] = [
            'animal' => 8,
            'color' => 5,
            'element' => 5,
            'startDate' => '1979-02-02',
            'endDate' => '1980-01-21',
        ];

        $calendar[2039] = [
            'animal' => 8,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1918] = [
            'animal' => 7,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1978] = [
            'animal' => 7,
            'color' => 5,
            'element' => 5,
            'startDate' => '1978-02-12',
            'endDate' => '1979-02-01',
        ];

        $calendar[2038] = [
            'animal' => 7,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1917] = [
            'animal' => 6,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1977] = [
            'animal' => 6,
            'color' => 4,
            'element' => 4,
            'startDate' => '1977-01-24',
            'endDate' => '1978-02-11',
        ];

        $calendar[2037] = [
            'animal' => 6,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1916] = [
            'animal' => 5,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1976] = [
            'animal' => 5,
            'color' => 4,
            'element' => 4,
            'startDate' => '1976-01-31',
            'endDate' => '1977-02-17',
        ];

        $calendar[2036] = [
            'animal' => 5,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1915] = [
            'animal' => 4,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1975] = [
            'animal' => 4,
            'color' => 3,
            'element' => 3,
            'startDate' => '1975-02-11',
            'endDate' => '1976-01-30',
        ];

        $calendar[2035] = [
            'animal' => 4,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1914] = [
            'animal' => 3,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1974] = [
            'animal' => 3,
            'color' => 3,
            'element' => 3,
            'startDate' => '1974-01-23',
            'endDate' => '1975-02-10',
        ];

        $calendar[2034] = [
            'animal' => 3,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1913] = [
            'animal' => 2,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1973] = [
            'animal' => 2,
            'color' => 2,
            'element' => 2,
            'startDate' => '1973-02-03',
            'endDate' => '1974-01-22',
        ];

        $calendar[2033] = [
            'animal' => 2,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1912] = [
            'animal' => 1,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1972] = [
            'animal' => 1,
            'color' => 2,
            'element' => 2,
            'startDate' => '1972-02-15',
            'endDate' => '1973-02-02',
        ];

        $calendar[2032] = [
            'animal' => 1,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1911] = [
            'animal' => 12,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1971] = [
            'animal' => 12,
            'color' => 1,
            'element' => 1,
            'startDate' => '1971-01-31',
            'endDate' => '1972-02-18',
        ];

        $calendar[2031] = [
            'animal' => 12,
            'color' => 1,
            'element' => 1,
            'startDate' => '2031-02-17',
            'endDate' => '2032-02-05',
        ];

        $calendar[1910] = [
            'animal' => 11,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1970] = [
            'animal' => 11,
            'color' => 1,
            'element' => 1,
            'startDate' => '1970-02-11',
            'endDate' => '1971-01-30',
        ];

        $calendar[2030] = [
            'animal' => 11,
            'color' => 1,
            'element' => 1,
            'startDate' => '2030-01-30',
            'endDate' => '2031-02-16',
        ];

        $calendar[1909] = [
            'animal' => 10,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1969] = [
            'animal' => 10,
            'color' => 5,
            'element' => 5,
            'startDate' => '1969-01-23',
            'endDate' => '1970-02-10',
        ];

        $calendar[2029] = [
            'animal' => 10,
            'color' => 5,
            'element' => 5,
            'startDate' => '2029-02-10',
            'endDate' => '2030-01-29',
        ];

        $calendar[1908] = [
            'animal' => 9,
            'color' => 5,
            'element' => 5,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1968] = [
            'animal' => 9,
            'color' => 5,
            'element' => 5,
            'startDate' => '1968-02-03',
            'endDate' => '1969-01-22',
        ];

        $calendar[2028] = [
            'animal' => 9,
            'color' => 5,
            'element' => 5,
            'startDate' => '2028-01-23',
            'endDate' => '2029-02-09',
        ];

        $calendar[1907] = [
            'animal' => 8,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1967] = [
            'animal' => 8,
            'color' => 4,
            'element' => 4,
            'startDate' => '1967-02-14',
            'endDate' => '1968-02-02',
        ];

        $calendar[2027] = [
            'animal' => 8,
            'color' => 4,
            'element' => 4,
            'startDate' => '2027-02-02',
            'endDate' => '2028-01-22',
        ];

        $calendar[1906] = [
            'animal' => 7,
            'color' => 4,
            'element' => 4,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1966] = [
            'animal' => 7,
            'color' => 4,
            'element' => 4,
            'startDate' => '1966-01-26',
            'endDate' => '1967-02-13',
        ];

        $calendar[2026] = [
            'animal' => 7,
            'color' => 4,
            'element' => 4,
            'startDate' => '2026-02-13',
            'endDate' => '2027-02-01',
        ];

        $calendar[1905] = [
            'animal' => 6,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1965] = [
            'animal' => 6,
            'color' => 3,
            'element' => 3,
            'startDate' => '1965-02-05',
            'endDate' => '1966-01-25',
        ];

        $calendar[2025] = [
            'animal' => 6,
            'color' => 3,
            'element' => 3,
            'startDate' => '2025-01-24',
            'endDate' => '2026-02-12',
        ];

        $calendar[1904] = [
            'animal' => 5,
            'color' => 3,
            'element' => 3,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1964] = [
            'animal' => 5,
            'color' => 3,
            'element' => 3,
            'startDate' => '1964-02-13',
            'endDate' => '1965-01-01',
        ];

        $calendar[2024] = [
            'animal' => 5,
            'color' => 3,
            'element' => 3,
            'startDate' => '2024-02-10',
            'endDate' => '2025-01-28',
        ];

        $calendar[1903] = [
            'animal' => 4,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];

        $calendar[1963] = [
            'animal' => 4,
            'color' => 2,
            'element' => 2,
            'startDate' => '1963-01-25',
            'endDate' => '1964-02-12',
        ];

        $calendar[2023] = [
            'animal' => 4,
            'color' => 2,
            'element' => 2,
            'startDate' => '2023-01-22',
            'endDate' => '2024-02-09',
        ];

        $calendar[1900] = [
            'animal' => 1,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];
        $calendar[1960] = [
            'animal' => 1,
            'color' => 1,
            'element' => 1,
            'startDate' => '1960-01-28',
            'endDate' => '1961-02-14',
        ];
        $calendar[2020] = [
            'animal' => 1,
            'color' => 1,
            'element' => 1,
            'startDate' => '2020-01-25',
            'endDate' => '2021-02-11',
        ];

        $calendar[1901] = [
            'animal' => 2,
            'color' => 1,
            'element' => 1,
            'startDate' => 0,
            'endDate' => 0,
        ];
        $calendar[1961] = [
            'animal' => 2,
            'color' => 1,
            'element' => 1,
            'startDate' => '1961-02-15',
            'endDate' => '1962-02-04',
        ];
        $calendar[2021] = [
            'animal' => 2,
            'color' => 1,
            'element' => 1,
            'startDate' => '2021-02-12',
            'endDate' => '2022-01-31',
        ];

        $calendar[1902] = [
            'animal' => 3,
            'color' => 2,
            'element' => 2,
            'startDate' => 0,
            'endDate' => 0,
        ];
        $calendar[1962] = [
            'animal' => 3,
            'color' => 2,
            'element' => 2,
            'startDate' => '1962-02-05',
            'endDate' => '1963-01-24',
        ];
        $calendar[2022] = [
            'animal' => 3,
            'color' => 2,
            'element' => 2,
            'startDate' => '2022-02-01',
            'endDate' => '2023-01-21',
        ];

        if ($year < 1900 or $year > 2079) {

            return [
                'animal' => 1,
                'color' => 1,
                'element' => 1,
                'startDate' => 0,
                'endDate' => 0,
                'active' => 0,

            ];

        } else {

            $calendar[$year]['active'] = 1;
            return $calendar[$year];
        }
    }

}

