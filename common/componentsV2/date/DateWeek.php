<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateWeek
{

    public $current;
    public $simple;
    public $count;
    public $dayNumber;

    /**
     * DateWeek constructor.
     * @param $date \DateTime
     * @throws \Exception
     */
    function __construct($date)
    {

        $this->week($date);
        return $this;
    }

    /**
     * @param $date \DateTime
     * @return $this
     * @throws \Exception
     */
    private function week($date)
    {

        $yearLastDay = new \DateTime($date->format('Y') . '-12-31');
        $weekCurrent = $date->format('W');
        $weekDayNumber = $date->format('N');
        $weekCount = $yearLastDay->format('W');

        if ($weekCount == '01'){
            $yearLastDay->modify('-6 day');
            $weekCount = $yearLastDay->format('W');
        }

        $this->current = $weekCurrent;          //Текущая неделя
        $this->simple = (int)$weekCurrent;      //Текущая неделя без ведущего нуля
        $this->count = $weekCount;              //Количество недель в текущем году
        $this->dayNumber = $weekDayNumber;              //Количество недель в текущем году
        return $this;
    }

}

