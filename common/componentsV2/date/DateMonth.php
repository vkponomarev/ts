<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateMonth
{

    public $nameFull;
    public $nameFullSimple;
    public $nameShort;
    public $current;
    public $daysCount;
    public $simple;
    public $firstDay;
    public $lastDay;

    /**
     * @param $date
     * @param $year \common\componentsV2\date\DateYear
     * @return $this
     * @throws \yii\base\InvalidConfigException
     */
    public function month($date, $year)
    {



        $monthFull = Yii::$app->formatter->asDate($date, 'php:F');
        $monthFullSimple = Yii::$app->formatter->asDate($date, 'LLLL');
        $monthShort = Yii::$app->formatter->asDate($date, 'php:M');
        $monthNumber = $date->format('m');
        $monthNumberSimple = $date->format('n');
        $monthCountDays = $date->format('t');

        $monthFirstDay = new \DateTime($year->current . '-' . $monthNumber . '-01');
        $monthFirstDayNumber = $monthFirstDay->format('N');
        $monthLastDay = new \DateTime($year->current . '-' . $monthNumber . '-' . $monthCountDays);
        $monthLastDayNumber = $monthLastDay->format('N');

        $this->nameFull = $monthFull;
        $this->nameFullSimple = $monthFullSimple;
        $this->nameShort = $monthShort;
        $this->current = $monthNumber;
        $this->simple = $monthNumberSimple;
        $this->daysCount = $monthCountDays;
        $this->firstDay = $monthFirstDayNumber;
        $this->lastDay = $monthLastDayNumber;

        return $this;
    }

}

