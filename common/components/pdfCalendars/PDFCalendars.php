<?php

namespace common\components\pdfCalendars;

use Yii;
use yii\web\NotFoundHttpException;

/**
 *
 *
 *
 */
class PDFCalendars
{

    function __construct()
    {

    }

    function viewFileNames(){

        return (new PDFCalendarsViewFileNames())->names();

    }

    function yearlyExists($year, $language, $countryURL){

        return (new PDFCalendarsYearlyExists())->calendars($year, $language, $countryURL);

    }

    function seasonsExists($year, $language, $countryURL, $season){

        return (new PDFCalendarsSeasonsExists())->calendars($year, $language, $countryURL, $season);

    }

}

