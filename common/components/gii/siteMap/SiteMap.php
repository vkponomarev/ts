<?php

namespace common\components\gii\siteMap;


class SiteMap
{




    function __construct()
    {

    }


    function generate($name){

        (new SiteMapGenerate())->generate($name);

    }

    function generateCalendarYears($languagesData){

        (new SiteMapGenerateCalendarYears())->generate($languagesData);

    }

    function generateCalendarYearsWithWeeks($languagesData){

        (new SiteMapGenerateCalendarYearsWithWeeks())->generate($languagesData);

    }

    function generateCalendarYearsWithWeeksRU($languagesData){

        (new SiteMapGenerateCalendarYearsWithWeeksRU())->generate($languagesData);

    }

    function generateCalendarMonths($languagesData){

        (new SiteMapGenerateCalendarMonths())->generate($languagesData);

    }

    function generateCalendarMonthsRU($languagesData){

        (new SiteMapGenerateCalendarMonthsRU())->generate($languagesData);

    }


    function generateCalendarWeeks($languagesData){

        (new SiteMapGenerateCalendarWeeks())->generate($languagesData);

    }

    function generateCalendarWeeksRU($languagesData){

        (new SiteMapGenerateCalendarWeeksRU())->generate($languagesData);

    }

    function generateCalendarSeasons($languagesData){

        (new SiteMapGenerateCalendarSeasons())->generate($languagesData);

    }

    function generateCalendarSeasonsRU($languagesData){

        (new SiteMapGenerateCalendarSeasonsRU())->generate($languagesData);

    }

    function generateCalendarBusinessYears($languagesData){

        (new SiteMapGenerateCalendarBusinessYears())->generate($languagesData);

    }

    function generateCalendarBusinessYearsRU($languagesData){

        (new SiteMapGenerateCalendarBusinessYearsRU())->generate($languagesData);

    }

    function generateCalendarBusinessMonths($languagesData){

        (new SiteMapGenerateCalendarBusinessMonths())->generate($languagesData);

    }

    function generateCalendarBusinessMonthsRU($languagesData){

        (new SiteMapGenerateCalendarBusinessMonthsRU())->generate($languagesData);

    }

    function generateCalendarBusinessQuarters($languagesData){

        (new SiteMapGenerateCalendarBusinessQuarters())->generate($languagesData);

    }

    function generateCalendarBusinessQuartersRU($languagesData){

        (new SiteMapGenerateCalendarBusinessQuartersRU())->generate($languagesData);

    }


    function generateCalendarMoonYears($languagesData){

        (new SiteMapGenerateCalendarMoonYears())->generate($languagesData);

    }

    function generateCalendarMoonYearsRU($languagesData){

        (new SiteMapGenerateCalendarMoonYearsRU())->generate($languagesData);

    }


    function generateCalendarMoonMonths($languagesData){

        (new SiteMapGenerateCalendarMoonMonths())->generate($languagesData);

    }

    function generateCalendarMoonMonthsRU($languagesData){

        (new SiteMapGenerateCalendarMoonMonthsRU())->generate($languagesData);

    }


    function generateCalendarMoonGardenerMonths($languagesData){

        (new SiteMapGenerateCalendarMoonGardenerMonths())->generate($languagesData);

    }

    function generateCalendarMoonGardenerMonthsRU($languagesData){

        (new SiteMapGenerateCalendarMoonGardenerMonthsRU())->generate($languagesData);

    }

    function generateCalendarMoonGardenerYears($languagesData){

        (new SiteMapGenerateCalendarMoonGardenerYears())->generate($languagesData);

    }

    function generateCalendarMoonGardenerYearsRU($languagesData){

        (new SiteMapGenerateCalendarMoonGardenerYearsRU())->generate($languagesData);

    }

    //

    function generateCalendarMoonGoodMonths($languagesData){

        (new SiteMapGenerateCalendarMoonGoodMonths())->generate($languagesData);

    }

    function generateCalendarMoonGoodMonthsRU($languagesData){

        (new SiteMapGenerateCalendarMoonGoodMonthsRU())->generate($languagesData);

    }

    function generateCalendarMoonGoodYears($languagesData){

        (new SiteMapGenerateCalendarMoonGoodYears())->generate($languagesData);

    }

    function generateCalendarMoonGoodYearsRU($languagesData){

        (new SiteMapGenerateCalendarMoonGoodYearsRU())->generate($languagesData);

    }


    function generateCalendarMoonPhasesMonths($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesMonths())->generate($languagesData);

    }

    function generateCalendarMoonPhasesMonthsRU($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesMonthsRU())->generate($languagesData);

    }

    function generateCalendarMoonPhasesYears($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesYears())->generate($languagesData);

    }

    function generateCalendarMoonPhasesYearsRU($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesYearsRU())->generate($languagesData);

    }


    function generateCalendarWorkingYears($languagesData){

        (new SiteMapGenerateCalendarWorkingYears())->generate($languagesData);

    }

    function generateCalendarWorkingYearsRU($languagesData){

        (new SiteMapGenerateCalendarWorkingYearsRU())->generate($languagesData);

    }

    function generateCalendarWorkingMonths($languagesData){

        (new SiteMapGenerateCalendarWorkingMonths())->generate($languagesData);

    }

    function generateCalendarReligionYears($languagesData){

        (new SiteMapGenerateCalendarReligionYears())->generate($languagesData);

    }

    function generateCalendarReligionYearsRU($languagesData){

        (new SiteMapGenerateCalendarReligionYearsRU())->generate($languagesData);

    }

    function generateCalendarReligionMonths($languagesData){

        (new SiteMapGenerateCalendarReligionMonths())->generate($languagesData);

    }

    function generateCalendarReligionMonthsRU($languagesData){

        (new SiteMapGenerateCalendarReligionMonthsRU())->generate($languagesData);

    }


    function generateCalendarWorkingMonthsRU($languagesData){

        (new SiteMapGenerateCalendarWorkingMonthsRU())->generate($languagesData);

    }

    function generateCalendarEastern($languagesData){

        (new SiteMapGenerateCalendarEastern())->generate($languagesData);

    }

    function generateCalendarEasternRU($languagesData){

        (new SiteMapGenerateCalendarEasternRU())->generate($languagesData);

    }
    function generateCalendarEasternAnimals($languagesData){

        (new SiteMapGenerateCalendarEasternAnimals())->generate($languagesData);

    }
    function generateCalendarEasternAnimalsRU($languagesData){

        (new SiteMapGenerateCalendarEasternAnimalsRU())->generate($languagesData);

    }
    function generateCalendarEasternYears($languagesData){

        (new SiteMapGenerateCalendarEasternYears())->generate($languagesData);

    }
    function generateCalendarEasternYearsRU($languagesData){

        (new SiteMapGenerateCalendarEasternYearsRU())->generate($languagesData);

    }

    function generateCalendarZodiacMonths($languagesData){

        (new SiteMapGenerateCalendarZodiacMonths())->generate($languagesData);

    }
    function generateCalendarZodiacMonthsRU($languagesData){

        (new SiteMapGenerateCalendarZodiacMonthsRU())->generate($languagesData);

    }
    function generateCalendarZodiacSigns($languagesData){

        (new SiteMapGenerateCalendarZodiacSings())->generate($languagesData);

    }
    function generateCalendarZodiacSignsRU($languagesData){

        (new SiteMapGenerateCalendarZodiacSingsRU())->generate($languagesData);

    }
    function generateCalendarZodiacYears($languagesData){

        (new SiteMapGenerateCalendarZodiacYears())->generate($languagesData);

    }
    function generateCalendarZodiacYearsRU($languagesData){

        (new SiteMapGenerateCalendarZodiacYearsRU())->generate($languagesData);

    }

    function generateCalendarHolidaysYears($languagesData){

        (new SiteMapGenerateCalendarHolidaysYears())->generate($languagesData);

    }
    function generateCalendarHolidaysYearsRU($languagesData){

        (new SiteMapGenerateCalendarHolidaysYearsRU())->generate($languagesData);

    }

    function generateCalendarHolidaysMonths($languagesData){

        (new SiteMapGenerateCalendarHolidaysMonths())->generate($languagesData);

    }
    function generateCalendarHolidaysMonthsRU($languagesData){

        (new SiteMapGenerateCalendarHolidaysMonthsRU())->generate($languagesData);

    }
    function generateCalendarHolidays($languagesData){

        (new SiteMapGenerateCalendarHolidays())->generate($languagesData);

    }
    function generateCalendarHolidaysRU($languagesData){

        (new SiteMapGenerateCalendarHolidaysRU())->generate($languagesData);

    }

    function generateCalendarHolidaysDays($languagesData){

        (new SiteMapGenerateCalendarHolidaysDays())->generate($languagesData);

    }
    function generateCalendarHolidaysDaysRU($languagesData){

        (new SiteMapGenerateCalendarHolidaysDaysRU())->generate($languagesData);

    }
    function generateCalendarHolidaysDaysName($languagesData){

        (new SiteMapGenerateCalendarHolidaysDaysName())->generate($languagesData);

    }
    function generateCalendarHolidaysDaysNameRU($languagesData){

        (new SiteMapGenerateCalendarHolidaysDaysNameRU())->generate($languagesData);

    }

    function generateCalendarMoonDays($languagesData){

        (new SiteMapGenerateCalendarMoonDays())->generate($languagesData);

    }

    function generateCalendarMoonDaysRU($languagesData){

        (new SiteMapGenerateCalendarMoonDaysRU())->generate($languagesData);

    }

    function generateCalendarMoonPhasesDays($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesDays())->generate($languagesData);

    }

    function generateCalendarMoonPhasesDaysRU($languagesData){

        (new SiteMapGenerateCalendarMoonPhasesDaysRU())->generate($languagesData);

    }

    function generateCalendarWeeksDays($languagesData){

        (new SiteMapGenerateCalendarWeeksDays())->generate($languagesData);

    }

    function generateCalendarWeeksDaysRU($languagesData){

        (new SiteMapGenerateCalendarWeeksDaysRU())->generate($languagesData);

    }

    function generateCalendarZodiacDays($languagesData){

        (new SiteMapGenerateCalendarZodiacDays())->generate($languagesData);

    }

    function generateCalendarZodiacDaysRU($languagesData){

        (new SiteMapGenerateCalendarZodiacDaysRU())->generate($languagesData);

    }


    function generateMainFiles(){

        (new SiteMapGenerateMainFiles())->generate();

    }


    function cleanPath($path){

        (new SiteMapCleanPath())->clean($path);

    }

    function realPath(){

        return (new SiteMapRealPath())->realPath();

    }

    function generateFile($siteMapContent, $fileName, $filePath){

        (new SiteMapGenerateFile())->generate($siteMapContent, $fileName, $filePath);

    }

}
