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
class ZodiacsUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $this->ids[1] = 'aries';
        $this->ids[2] = 'taurus';
        $this->ids[3] = 'gemini';
        $this->ids[4] = 'cancer';
        $this->ids[5] = 'leo';
        $this->ids[6] = 'virgo';
        $this->ids[7] = 'libra';
        $this->ids[8] = 'scorpio';
        $this->ids[9] = 'sagittarius';
        $this->ids[10] = 'capricorn';
        $this->ids[11] = 'aquarius';
        $this->ids[12] = 'pisces';


        return $this->ids;
    }

    private function keys(){

        $this->keys['aries'] = 1;
        $this->keys['taurus'] = 2;
        $this->keys['gemini'] = 3;
        $this->keys['cancer'] = 4;
        $this->keys['leo'] = 5;
        $this->keys['virgo'] = 6;
        $this->keys['libra'] = 7;
        $this->keys['scorpio'] = 8;
        $this->keys['sagittarius'] = 9;
        $this->keys['capricorn'] = 10;
        $this->keys['aquarius'] = 11;
        $this->keys['pisces'] = 12;

        return $this->keys;
    }

}

