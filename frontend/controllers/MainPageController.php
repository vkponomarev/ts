<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\year\Year;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;


/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class MainPageController extends Controller
{


    public function actionIndex()
    {

        $url = false;
        $textID = '1'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['id'] = Yii::$app->params['language']['current']['countries_id'];

        $date = (new Date((new \DateTime())->format('Y-m-d')))->date()->year()->month()->week()->day();


        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($date->year->current);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidays = $holidays->byDay($date, $languageID, 0);

        $countries = new Countries();
        $countries = $countries->byPopulation($languageID);



        $holidays = new Holidays();
        $holidaysRange = $holidays->range();
        $holidaysData = $holidays->byCountryByYear($countryURL['id'], $date->year->current, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        return $this->render('index.min.php', [

            'date' => $date,
            'holidays' => $holidays,
            'holidaysData' => $holidaysData,
            'countries' => $countries,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);


    }


}
