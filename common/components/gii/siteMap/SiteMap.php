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
