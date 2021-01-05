<?php

namespace common\components\pageTexts;

use Codeception\PHPUnit\Constraint\Page;

class PageTexts
{

    function __construct()
    {

    }

    function updateByCalendarYear($pageTextsMessages, $dateData, $countryData, $holidaysCount)
    {

        (new PageTextsUpdateByCalendarYear())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount);

    }

    function updateByCalendarSeason($pageTextsMessages, $dateData, $countryData, $holidaysCount)
    {

        (new PageTextsUpdateByCalendarSeason())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount);

    }

    function updateByCalendarMonth($pageTextsMessages, $dateData, $countryData, $holidaysCount, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByCalendarMonth())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount, $calendarNameOfMonths);

    }


    function defineIdByCalendarYear($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarYear())->define($holidays, $calendarChinese);

    }

    function defineIdByCalendarMonth($holidays, $PDFCalendar)
    {

        return (new PageTextsDefineIdByCalendarMonth())->define($holidays, $PDFCalendar);

    }


    function defineIdByCalendarSeason($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarSeason())->define($holidays, $calendarChinese);

    }


    function messagesByCalendarYear($calendarChinese, $dateData)
    {

        return (new PageTextsMessagesByCalendarYear())->messages($calendarChinese, $dateData);

    }

    function messagesByCalendarSeason($dateData, $season)
    {

        return (new PageTextsMessagesByCalendarSeason())->messages($dateData, $season);

    }

    function messagesByCalendarMonth($dateData, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarMonth())->messages($dateData, $countHolidays);

    }

}

