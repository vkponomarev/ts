<?php

namespace frontend\controllers;


use common\components\albums\Albums;
use common\components\artists\Artists;
use common\components\calendar\Calendar;
use common\components\date\Date;
use common\components\main\Main;
use common\components\songs\Songs;
use common\components\year\Year;
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

        $date = new Date();
        $dateData = $date->data(0);

        $year = new Year();
        $yearData = $year->data(0);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($yearData['full']);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('index.min.php', [

            'yearData' => $yearData,
            'dateData' => $dateData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);


    }


}
