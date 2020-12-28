<?php

namespace common\components\getParams;

/**
 * Класс для обработки гет параметров в url строке.
 * И удобная передача их в котроллер.
 * Class GetParams
 * @package common\components\getParams
 */
class GetParams
{

    function __construct()
    {

    }

    /**
     * Передача get параметров относящихся к странице кастомизации календаря
     * @return array
     */
    function customize()
    {

        return (new GetParamsCustomize())->params();

    }


    /**
     * Передача get параметров для страницы календаря на год.
     * Если параметров нет то присваиваем Дефолтный ID страны для этого языка.
     * Если парамет country есть а год не входит в holidaysRange то кидаем 404.
     * @param $countriesID
     * @param $year
     * @param $holidaysRange
     * @return mixed
     * @throws \yii\web\NotFoundHttpException
     */
    function byCalendarYears($countriesID, $year, $holidaysRange)
    {

        return (new GetParamsByCalendarYears())->params($countriesID, $year, $holidaysRange);

    }

    /**
     * Передача get параметров относящихся к стрнаице тестирования PDF календаря
     * @return array
     */
    function byPrintTest()
    {

        return (new GetParamsByPrintTest())->params();

    }

}

