<?php

namespace common\components\pageTexts;

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

    function defineIdByCalendarYear($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarYear())->define($holidays, $calendarChinese);

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

}

