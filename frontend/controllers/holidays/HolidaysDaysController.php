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
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;


class HolidaysDaysController extends Controller
{


    public function actionHolidaysDayPage($dayNameURL, $dayURL, $countryURL)
    {

        $yearURL = 2021;
        $textID = '238'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $check = $urlCheck->holidaysDays($dayNameURL, $dayURL, $countryURL, $holidaysRange);
        $urlCheck->holidaysYear($yearURL, $holidaysRange);
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];


        $dateTmp = new \DateTime();
        if ($yearURL <> $dateTmp->format('Y')) {
            $dateTmp = new \DateTime($yearURL . '-01-01');
        }

        ($date = new Date($check['date']))->date()->year()->month()->season()->day();
        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date();
        $getParams = new GetParams();

        $holidaysData = $holidays->byDay($date, $languageID, $countryURL['id']);
        if (!$holidaysData && $countryURL['id'])
            $holidaysNearest = $holidays->byDayByCountryByYear($date, $languageID, $countryURL['id']);
        else
            $holidaysNearest = 0;

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByHolidaysDays($dayNameURL, $dayURL, $countryURL['id']);
        //$pageTextsMessages = $pageTexts->messagesByCalendarYear($calendarChinese, $dateData, count($holidaysData));
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByHolidaysDays($dayNameURL, $date, $countryData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->holidaysDays($date, $countryURL['url'], $countryData);

        return $this->render('holidays-day-page.min.php', [

            'date' => $date,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidaysNearest' => $holidaysNearest,
            'countryURL' => $countryURL,
            'dayNameURL' => $dayNameURL,
            'dateToday' => $dateToday,
            'dayURL' => $dayURL,
            'holidaysRange' => $holidaysRange,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,


        ]);

    }

}
