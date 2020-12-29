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

    function byWeek($startDate, $endDate){

        return (new CalendarByWeek())->calendar($startDate, $endDate);

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

