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
