<?php

namespace common\components\holidays;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Класс для выходных дней и праздников.
 * Class Holidays
 * @package common\components\holidays
 */
class Holidays
{

    function __construct()
    {

    }

    /**
     * Список праздников и выходных дней по стрнае году и языку.
     * @param $countryID integer
     * @param $yearID integer
     * @param $languageID integer
     * @return array
     */
    function byCountryByYear($countryID, $yearID, $languageID){

        return (new HolidaysByCountryByYear())->holidays($countryID, $yearID, $languageID);

    }


    function byCountryByMonth($countryID, $year, $month, $languageID){

        return (new HolidaysByCountryByMonth())->holidays($countryID, $year, $month, $languageID);

    }

    function byCountryBySeason($countryID, $yearID, $languageID, $season){

        return (new HolidaysByCountryBySeason())->holidays($countryID, $yearID, $languageID, $season);

    }

    function byCountryByQuarter($countryID, $yearID, $languageID, $quarter){

        return (new HolidaysByCountryByQuarter())->holidays($countryID, $yearID, $languageID, $quarter);

    }


    /**
     * Список праздников и выходных дней специально для создания PDF файлов календаря на год
     * @param $countryID integer
     * @param $yearID integer
     * @param $languageID integer
     * @return array
     */
    function byCountryByYearPDFGeneration($countryID, $yearID, $languageID){

        return (new HolidaysByCountryByYearPDFGeneration())->holidays($countryID, $yearID, $languageID);

    }

    /**
     * Список праздников и выходных дней специально для создания PDF файлов календаря на сезон года
     * @param $countryID integer
     * @param $yearID integer
     * @param $languageID integer
     * @param $season string
     * @return array
     * @throws \yii\db\Exception
     */
    function byCountryBySeasonPDFGeneration($countryID, $yearID, $languageID, $season){

        return (new HolidaysByCountryBySeasonPDFGeneration())->holidays($countryID, $yearID, $languageID, $season);

    }


    function byCountryByMonthPDFGeneration($countryID, $yearID, $languageID, $season){

        return (new HolidaysByCountryByMonthPDFGeneration())->holidays($countryID, $yearID, $languageID, $season);

    }

    function byReligion($year, $languageID, $religion){

        return (new HolidaysByReligion())->holidays($year, $languageID, $religion);

    }

    function byReligionMonths($year, $month, $languageID, $religion){

        return (new HolidaysByReligionMonths())->holidays($year, $month, $languageID, $religion);

    }

    function world($date, $languageID, $countryID){

        return (new HolidaysWorld())->holidays($date, $languageID, $countryID);

    }

    function worldMonth($date, $languageID, $countryID){

        return (new HolidaysWorldMonth())->holidays($date, $languageID, $countryID);

    }

    function byHolidayID($date, $languageID, $countryID, $holidayID){

        return (new HolidaysByHolidayID())->holidays($date, $languageID, $countryID, $holidayID);

    }

    /**
     * Заменяем ячейку выходной день с несколькими значениями пример (0,1) на одно значение здесь 1 (0,0) здесь 0
     * Такое получается когда у нас есть для одного праздника несколько типов праздника и нам нужно найти тип который официальный выходноой
     * и поставить 1 или не найти и поставтиь 0.
     * @param $holidaysData array массив с праздниками.
     * @return mixed
     */
    function arrayReplace($holidaysData){

        return (new HolidaysArrayReplace())->holidays($holidaysData);

    }

    /**
     * Здесь задаются года начало и конец в каких годах у нас есть праздники.
     * @return array
     */
    function range(){

        return (new HolidaysRange())->holidays();

    }

}

