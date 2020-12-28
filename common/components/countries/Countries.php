<?php

namespace common\components\countries;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Класс предназначенный для работы с базой данных countries.
 * И манипуляциями со списком стран.
 * Class Countries
 * @package common\components\countries
 */
class Countries
{

    function __construct()
    {

    }

    /**
     * Выбираем все страны и их значения и названия на разных языках и формах.
     * id
     * url
     * ct.name,
     * ct.name_in
     * ct.name_for.
     * @param $languageID integer
     * @return array
     */
    function data($languageID){

        return (new CountriesData())->data($languageID);

    }

    /**
     * выбираем все id стран для PDF генерации календаря
     * @return array
     * @throws \yii\db\Exception
     */
    function byPDFGeneration(){

        return (new CountriesByPDFGeneration())->data();

    }

    /**
     * Выбираем все id стран для генерации карты сайта
     * @return array
     * @throws \yii\db\Exception
     */
    function bySiteMapGeneration(){

        return (new CountriesBySiteMapGeneration())->data();

    }





}

