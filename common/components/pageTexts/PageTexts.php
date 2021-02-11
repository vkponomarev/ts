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

    function updateByCalendarYearMoon($pageTextsMessages, $dateData)
    {

        (new PageTextsUpdateByCalendarYearMoon())->update($pageTextsMessages, $dateData);

    }


    function updateByCalendarYearBusiness($pageTextsMessages, $dateData, $countryData, $holidaysCount)
    {

        (new PageTextsUpdateByCalendarYearBusiness())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount);

    }

    function updateByCalendarYearWeeks($dateData)
    {

        (new PageTextsUpdateByCalendarYearWeeks())->update($dateData);

    }


    function updateByCalendarWeek($dateData, $calendar, $weekURL)
    {

        (new PageTextsUpdateByCalendarWeek())->update($dateData, $calendar, $weekURL);

    }

    function updateByCalendarSeason($pageTextsMessages, $dateData, $countryData, $holidaysCount)
    {

        (new PageTextsUpdateByCalendarSeason())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount);

    }

    function updateByCalendarQuarter($pageTextsMessages, $dateData, $countryData, $holidaysCount, $quarterURL)
    {

        (new PageTextsUpdateByCalendarQuarter())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount, $quarterURL);

    }

    function updateByCalendarMonth($pageTextsMessages, $dateData, $countryData, $holidaysCount, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByCalendarMonth())->update($pageTextsMessages, $dateData, $countryData, $holidaysCount, $calendarNameOfMonths);

    }

    function updateByCalendarMonthMoon($pageTextsMessages, $dateData, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByCalendarMonthMoon())->update($pageTextsMessages, $dateData, $calendarNameOfMonths);

    }

    function updateByCalendarYearReligion($pageTextsMessages, $dateData, $holidaysCount)
    {

        (new PageTextsUpdateByCalendarYearReligion())->update($pageTextsMessages, $dateData, $holidaysCount);

    }

    function updateByCalendarMonthReligion($pageTextsMessages, $date, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByCalendarMonthReligion())->update($pageTextsMessages, $date, $calendarNameOfMonths);

    }

    function updateByCalendarEastern($date, $eastern)
    {

        (new PageTextsUpdateByCalendarEastern())->update($date, $eastern);

    }

    function updateByCalendarEasternAnimal($eastern)
    {

        (new PageTextsUpdateByCalendarEasternAnimal())->update($eastern);

    }

    function updateByCalendarZodiacYear($date)
    {

        (new PageTextsUpdateByCalendarZodiacYear())->update($date);

    }

    function updateByCalendarZodiacMonth($date, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByCalendarZodiacMonth())->update($date, $calendarNameOfMonths);

    }

    function updateByCalendarZodiacSign($zodiac)
    {

        (new PageTextsUpdateByCalendarZodiacSign())->update($zodiac);

    }

    function updateByHolidaysWorld($date, $countryData)
    {

        (new PageTextsUpdateByHolidaysWorld())->update($date, $countryData);

    }

    function updateByHolidaysWorldMonth($date, $countryData, $calendarNameOfMonths)
    {

        (new PageTextsUpdateByHolidaysWorldMonth())->update($date, $countryData, $calendarNameOfMonths);

    }

    function updateByHolidaysWorldHoliday($date, $countryData, $holidayData, $holidaysData)
    {

        (new PageTextsUpdateByHolidaysHoliday())->update($date, $countryData, $holidayData, $holidaysData);

    }


    function defineIdByCalendarYear($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarYear())->define($holidays, $calendarChinese);

    }

    function defineIdByCalendarYearMoon($dayNameURL)
    {

        return (new PageTextsDefineIdByCalendarYearMoon())->define($dayNameURL);

    }

    function defineIdByCalendarMonthMoonGood($dayNameURL)
    {

        return (new PageTextsDefineIdByCalendarMonthMoonGood())->define($dayNameURL);

    }

    function defineIdByCalendarYearMoonGardener($gardenerNameURL)
    {

        return (new PageTextsDefineIdByCalendarYearMoonGardener())->define($gardenerNameURL);

    }

    function defineIdByCalendarMonthMoonGardener($gardenerNameURL)
    {

        return (new PageTextsDefineIdByCalendarMonthMoonGardener())->define($gardenerNameURL);

    }


    function defineIdByCalendarYearMoonPhases($phaseNameURL)
    {

        return (new PageTextsDefineIdByCalendarYearMoonPhases())->define($phaseNameURL);

    }

    function defineIdByCalendarMonthMoonPhases($phaseNameURL)
    {

        return (new PageTextsDefineIdByCalendarMonthMoonPhases())->define($phaseNameURL);

    }



    function defineIdByCalendarMonth($holidays, $PDFCalendar)
    {

        return (new PageTextsDefineIdByCalendarMonth())->define($holidays, $PDFCalendar);

    }


    function defineIdByCalendarSeason($holidays, $calendarChinese)
    {

        return (new PageTextsDefineIdByCalendarSeason())->define($holidays, $calendarChinese);

    }

    function defineIdByCalendarYearReligion($religion)
    {

        return (new PageTextsDefineIdByCalendarYearReligion())->define($religion);

    }

    function defineIdByCalendarMonthReligion($religion)
    {

        return (new PageTextsDefineIdByCalendarMonthReligion())->define($religion);

    }

    function defineIdByCalendarYearEastern($eastern)
    {

        return (new PageTextsDefineIdByCalendarYearEastern())->define($eastern);

    }

    function defineIdByHolidaysWorld($countryID)
    {

        return (new PageTextsDefineIdByHolidaysWorld())->define($countryID);

    }

    function defineIdByHolidaysWorldMonth($countryID)
    {

        return (new PageTextsDefineIdByHolidaysWorldMonth())->define($countryID);

    }

    function defineIdByHolidaysHoliday($countryID)
    {

        return (new PageTextsDefineIdByHolidaysHoliday())->define($countryID);

    }


    function messagesByCalendarYear($calendarChinese, $dateData, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarYear())->messages($calendarChinese, $dateData, $countHolidays);

    }

    function messagesByCalendarYearMoon($calendarChinese, $dateData)
    {

        return (new PageTextsMessagesByCalendarYearMoon())->messages($calendarChinese, $dateData);

    }


    function messagesByCalendarSeason($dateData, $season)
    {

        return (new PageTextsMessagesByCalendarSeason())->messages($dateData, $season);

    }

    function messagesByCalendarQuarter($dateData, $quarter, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarQuarter())->messages($dateData, $quarter, $countHolidays);

    }


    function messagesByCalendarMonth($dateData, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarMonth())->messages($dateData, $countHolidays);

    }

    function messagesByCalendarMonthMoon($dateData)
    {

        return (new PageTextsMessagesByCalendarMonthMoon())->messages($dateData);

    }


    /**
     * @param $calendarChinese
     * @param $date
     * @param $countHolidays
     * @return array
     */

    function messagesByCalendarYearBusiness($calendarChinese, $date, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarYearBusiness())->messages($calendarChinese, $date, $countHolidays);

    }

    function messagesByCalendarYearReligion($calendarChinese, $date, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarYearReligion())->messages($calendarChinese, $date, $countHolidays);

    }

    function messagesByCalendarMonthReligion($date, $countHolidays)
    {

        return (new PageTextsMessagesByCalendarMonthReligion())->messages($date, $countHolidays);

    }

}

