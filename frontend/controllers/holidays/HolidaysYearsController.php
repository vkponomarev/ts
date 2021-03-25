<?php

namespace frontend\controllers\holidays;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;



class HolidaysYearsController extends Controller
{


    public function actionHolidaysYearPage($yearURL, $countryURL)
    {

        $textID = '238'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $urlCheck->holidaysYear($yearURL, $holidaysRange);
        $countryURL = $urlCheck->country($countryURL);



        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];


        $dateTmp = new \DateTime();
        if ($yearURL <> $dateTmp->format('Y')){
            $dateTmp = new \DateTime($yearURL . '-01-01');
        }

        ($date = new Date($dateTmp->format('Y-m-d')))->date()->year()->month();

        $getParams = new GetParams();

        //$countryURL = $getParams->byCalendarYears($countryURL, $year, $holidaysRange);

        $holidaysWorld = $holidays->world($date, $languageID, $countryURL['id'], 40);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByHolidaysWorld($countryURL['id']);
        //$pageTextsMessages = $pageTexts->messagesByCalendarYear($calendarChinese, $dateData, count($holidaysData));
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByHolidaysWorld($date, $countryData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->holidaysYears($date, $countryURL['url'], $countryData);

        return $this->render('holidays-year-page.min.php', [

            'date' => $date,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysWorld,
            'countryURL' => $countryURL,
            'holidaysRange' => $holidaysRange,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }

}
