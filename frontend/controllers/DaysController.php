<?php

namespace frontend\controllers;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\day\Day;
use common\components\getParams\GetParams;
use common\components\links\Links;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;

use common\components\urlCheck\UrlCheck;
use common\components\year\Year;
use common\components\years\Years;
use Yii;
use yii\web\Controller;



class DaysController extends Controller
{


    public function actionIndex()
    {

    }

    public function actionDayPage($urlDay)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        /**
         * $urlCheckData['year']
         * $urlCheckData['month']
         * $urlCheckData['day']
         */
        $urlCheckData = $urlCheck->day($urlDay);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($urlDay, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($urlDay, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $year = new Year();
        $yearData = $year->data($urlCheckData['year']);

        $day = new Day();
        $dayData = $day->data($urlDay);

        $calendar = new Calendar();

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('day-page.min.php', [

            'yearData' => $yearData,
            'dayData' => $dayData,
            'monthData' => $urlCheckData['month'],
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,


        ]);

    }

}
