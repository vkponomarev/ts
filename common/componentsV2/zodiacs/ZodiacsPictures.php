<?php

namespace common\componentsV2\zodiacs;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * 1- Овен
 * 2- Телец
 * 3- Близнецы
 * 4- Рак
 * 5- Лев
 * 6- Дева
 * 7- Весы
 * 8- Скорпион
 * 9- Стрелец
 * 10- Козерог
 * 11- Водолей
 * 12- Рыбы
 *
 */
class ZodiacsPictures
{
 
    function pictures(){

        $pictures[1] = 'aries';
        $pictures[2] = 'taurus';
        $pictures[3] = 'gemini';
        $pictures[4] = 'cancer';
        $pictures[5] = 'leo';
        $pictures[6] = 'virgo';
        $pictures[7] = 'libra';
        $pictures[8] = 'scorpio';
        $pictures[9] = 'sagittarius';
        $pictures[10] = 'capricorn';
        $pictures[11] = 'aquarius';
        $pictures[12] = 'pisces';

        return $pictures;
    }


}

