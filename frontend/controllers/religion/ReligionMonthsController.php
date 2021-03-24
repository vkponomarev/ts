<?php

namespace frontend\controllers\religion;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use common\components\years\Years;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;


class ReligionMonthsController extends Controller
{


    public function actionReligionMonthPage($monthURL, $religionURL)
    {


        $textID = '94'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        /**
         * $monthURL['year']
         * $monthURL['month']
         * $monthURL['url']
         */
        $monthURL = $urlCheck->monthBusiness($monthURL, $holidaysRange);
        $urlCheck->religion($religionURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($monthURL['url'], $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($monthURL['url'], $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];

        $holidaysData = $holidays->byReligionMonths($monthURL['year'], $monthURL['month'], $languageID, $religionURL);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        ($date = new Date($monthURL['url'] . '-01'))->date()->year()->month();

        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        $calendars = new Calendars($dateToday->year->current);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMonth($monthURL);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->businessExists($monthURL['year'], $language, $countryData['url']);

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarMonthReligion($religionURL);
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTextsMessages = $pageTexts->messagesByCalendarMonthReligion($date, count($holidaysData));
        $pageTexts->updateByCalendarMonthReligion($pageTextsMessages, $date, $calendarNameOfMonths);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->religionMonths($date, $religionURL);

        return $this->render('religion-month-page.min.php', [

            'date' => $date,
            'religion' => $religionURL,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'calendarByMonth' => $calendarByMonth,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'calendars' => $calendars,

        ]);

    }

}
