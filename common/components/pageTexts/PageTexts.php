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

    function defineIdByCalendarYear($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarYear())->define($holidays, $calendarChinese);

    }

    function messagesByCalendarYear($calendarChinese, $dateData)
    {

        return (new PageTextsMessagesByCalendarYear())->messages($calendarChinese, $dateData);

    }

}

