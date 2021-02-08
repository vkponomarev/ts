<?php

namespace common\componentsV2\planets;

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
class PlanetsUrls
{

    public $ids;
    public $keys;

    function __construct()
    {
        $this->ids = $this->ids();
        $this->keys = $this->keys();
    }

    private function ids(){

        $ids[1] = 'sun';
        $ids[2] = 'mercury';
        $ids[3] = 'venus';
        $ids[4] = 'earth';
        $ids[5] = 'mars';
        $ids[6] = 'jupiter';
        $ids[7] = 'saturn';
        $ids[8] = 'uranus';
        $ids[9] = 'neptune';


        return $ids;
    }

    private function keys(){

        $keys['sun'] = 1;
        $keys['mercury'] = 2;
        $keys['venus'] = 3;
        $keys['earth'] = 4;
        $keys['mars'] = 5;
        $keys['jupiter'] = 6;
        $keys['saturn'] = 7;
        $keys['uranus'] = 8;
        $keys['neptune'] = 9;

        return $keys;
    }

}

