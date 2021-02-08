<?php

namespace common\componentsV2\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateYear
{


    public $current;
    public $short;
    public $previous;
    public $next;
    public $leap;
    public $days;
    public $firstDay;
    public $lastDay;
    public $februaryDays;


    public function year($date)
    {

        $year = $date->format('Y');
        $yearShort = $date->format('y');
        $yearLeap = $date->format('L');

        $yearFirstDay = new \DateTime($year . '-01-01');
        $yearFirstDayNumber = $yearFirstDay->format('N');
        $yearLastDay = new \DateTime($year . '-12-31');
        $yearLastDayNumber = $yearLastDay->format('N');

        if ($yearLeap){
            $yearCountDays = 366;
            $februaryCountDays = 29;
        } else {
            $yearCountDays = 365;
            $februaryCountDays = 28;
        }

        $this->current = str_pad($year, 4, '0', STR_PAD_LEFT);
        $this->short = str_pad($yearShort, 2, '0', STR_PAD_LEFT);
        $this->previous = str_pad($year - 1, 4, '0', STR_PAD_LEFT);
        $this->next = str_pad($year + 1, 4, '0', STR_PAD_LEFT);
        $this->leap = $yearLeap;
        $this->days = $yearCountDays;
        $this->firstDay = $yearFirstDayNumber;
        $this->lastDay = $yearLastDayNumber;
        $this->februaryDays = $februaryCountDays;

        return $this;
    }

}

