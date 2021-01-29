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

    function byYearBusiness($year, $holidaysData, $sixDays = 0){

        return (new CalendarByYearBusiness())->calendar($year, $holidaysData, $sixDays);

    }

    function byMonth($date){

        return (new CalendarByMonth())->calendar($date);

    }

    function byMonthWeek($year, $week, $weekCount){

        return (new CalendarByMonthWeek())->calendar($year, $week, $weekCount);

    }

    function byMonthBusiness($monthURL, $holidaysData, $sixDays = 0){

        return (new CalendarByMonthBusiness())->calendar($monthURL, $holidaysData, $sixDays);

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

    function byQuarters($year, $quarter, $holidaysData){

        return (new CalendarByQuarters())->calendar($year, $quarter, $holidaysData);

    }

    function byMoonYears($year, $cityData){

        return (new CalendarByMoonYears())->calendar($year, $cityData);

    }

    function byMoonMonths($date, $cityData){

        return (new CalendarByMoonMonths())->calendar($date, $cityData);

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

