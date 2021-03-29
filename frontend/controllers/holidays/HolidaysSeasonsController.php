<?php

namespace frontend\controllers\holidays;


use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;

use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;

use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;



class HolidaysSeasonsController extends Controller
{


    public function actionHolidaysSeasonPage($seasonURL, $yearURL)
    {

        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $urlCheck->holidaysYear($yearURL, $holidaysRange);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];



        $getParams = new GetParams();
        //$countryURL = $getParams->byCalendarSeasons($countryURL, $yearURL, $holidaysRange);
        //$holidaysData = $holidays->byCountryBySeason($countryURL['id'], $yearURL, $languageID, $seasonURL);
        //$holidaysData = $holidays->arrayReplace($holidaysData);

        ($date = new Date($yearURL .'-01-01'))->date()->year()->month();

        $holidaysData = $holidays->bySeason($date, $languageID, $seasonURL);

        $calendar = new Calendar();
        $calendarChinese = $calendar->chineseByYear($yearURL);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $calendarBySeasons = $calendar->bySeasons($yearURL, $seasonURL);

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByHolidaysSeason($seasonURL);
        //$pageTextsMessages = $pageTexts->messagesByCalendarSeason($dateData, $seasonURL);
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByHolidaysSeason($date);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->holidaysSeasons($date, $seasonURL);

        return $this->render('holidays-season-page.min.php', [

            'seasonURL' => $seasonURL,
            'date' => $date,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'calendarBySeasons' => $calendarBySeasons,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'countryURL' => $countryURL,
            //'pageTextsMessages' => $pageTextsMessages,

        ]);

    }

}
