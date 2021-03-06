<?php

namespace common\componentsV2\eastern;

use Yii;
use yii\web\NotFoundHttpException;

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
class EasternAnimals
{

    /**
     * @var array массив URL животных
     */
    public $urls;

    /**
     * @var array массив названий картинок животных
     */
    public $pictures;

    function __construct()
    {
        $this->pictures = $this->pictures();
        $this->urls = $this->urls();

    }

    private function urls(){

        $this->urls[1] = 'rat';
        $this->urls[2] = 'bull';
        $this->urls[3] = 'tiger';
        $this->urls[4] = 'rabbit';
        $this->urls[5] = 'dragon';
        $this->urls[6] = 'snake';
        $this->urls[7] = 'horse';
        $this->urls[8] = 'sheep';
        $this->urls[9] = 'monkey';
        $this->urls[10] = 'rooster';
        $this->urls[11] = 'dog';
        $this->urls[12] = 'pig';

        $this->urls['rat'] = 1;
        $this->urls['bull'] = 2;
        $this->urls['tiger'] = 3;
        $this->urls['rabbit'] = 4;
        $this->urls['dragon'] = 5;
        $this->urls['snake'] = 6;
        $this->urls['horse'] = 7;
        $this->urls['sheep'] = 8;
        $this->urls['monkey'] = 9;
        $this->urls['rooster'] = 10;
        $this->urls['dog'] = 11;
        $this->urls['pig'] = 12;

        return $this->urls;
    }

    private function pictures(){

        $this->pictures[1] = 'rat-01';
        $this->pictures[2] = 'bull-01';
        $this->pictures[3] = 'tiger-01';
        $this->pictures[4] = 'rabbit-01';
        $this->pictures[5] = 'dragon-01';
        $this->pictures[6] = 'snake-01';
        $this->pictures[7] = 'horse-01';
        $this->pictures[8] = 'sheep-01';
        $this->pictures[9] = 'monkey-01';
        $this->pictures[10] = 'rooster-01';
        $this->pictures[11] = 'dog-01';
        $this->pictures[12] = 'pig-01';

        return $this->pictures;
    }



}

