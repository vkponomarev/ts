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


    function bySeasonsWinter($year){

        return (new CalendarBySeasonsWinter())->calendar($year);

    }

    function bySeasonsSpring($year){

        return (new CalendarBySeasonsSpring())->calendar($year);

    }

    function bySeasonsSummer($year){

        return (new CalendarBySeasonsSummer())->calendar($year);

    }

    function bySeasonsAutumn($year){

        return (new CalendarBySeasonsAutumn())->calendar($year);

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

