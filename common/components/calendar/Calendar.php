<?php

namespace common\components\calendar;

use Yii;
use yii\web\NotFoundHttpException;


class Calendar
{

    function __construct()
    {

    }

    function byYear($year){

        return (new CalendarByYear())->calendar($year);

    }

    function byMonth($date){

        return (new CalendarByMonth())->calendar($date);

    }

    function byMonthWeek($year, $week, $weekCount){

        return (new CalendarByMonthWeek())->calendar($year, $week, $weekCount);

    }

    function byWeek($year, $week, $weekCount){

        return (new CalendarByWeek())->calendar($year, $week, $weekCount);

    }

    function byDays($startDate, $endDate){

        return (new CalendarByDays())->calendar($startDate, $endDate);

    }


    function bySeasons($year, $season){

        return (new CalendarBySeasons())->calendar($year, $season);

    }

    function chineseByYear($year){

        return (new CalendarChineseByYear())->calendar($year);

    }

    function nameOfMonths(){

        return (new CalendarNameOfMonths())->name();

    }


    function nameOfDaysInWeek(){

        return (new CalendarNameOfDaysInWeek())->name();

    }

}

