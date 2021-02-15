<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateDay
{

    public $name;
    public $short;
    public $current;
    public $simple;
    public $weekDay;
    /**
     * @param $date
     * @return $this
     * @throws \yii\base\InvalidConfigException
     */

    function __construct($date)
    {

        $this->day($date);
        return $this;
    }

    private function day($date)
    {

        $dayName = Yii::$app->formatter->asDate($date, 'php:l');
        $dayNameShort = Yii::$app->formatter->asDate($date, 'php:D');
        $dayNumber = $date->format('d');
        $dayNumberSimple = $date->format('j');
        $dayCount = $date->format('z');

        $this->name = $dayName;
        $this->short = $dayNameShort;
        $this->current = $dayNumber;
        $this->simple = $dayNumberSimple;
        $this->weekDay = $dayCount;

        return $this;
    }

}

