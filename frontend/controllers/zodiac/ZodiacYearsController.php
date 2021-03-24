<?php

namespace frontend\controllers\zodiac;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\Url;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\eastern\Eastern;
use common\componentsV2\zodiacs\Zodiacs;
use Yii;
use yii\web\Controller;


class ZodiacYearsController extends Controller
{

    public function actionZodiacYearPage($yearURL)
    {


        $textID = '234'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/eastern'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();


        /*$url = new Url($yearURL);
        $url->yearURL($yearURL);
        $url->year;*/

        $urlCheck = new UrlCheck();

        $urlCheck->year($yearURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical('', $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate('', $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        ($date = new Date($yearURL . '-01-01'))->date()->year();


        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date()->year()->month()->day();
        $zodiacs = new Zodiacs();
        $zodiacs->zodiacByDay('2021-' . $dateToday->month->current . '-' . $dateToday->day->current);
        $zodiacs->zodiac($zodiacs->zodiacByDay->url);

        $calendars = new Calendars($dateToday->year->current);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byZodiacYear($date->year->current, $zodiacs->ranges);
        //$calendarChinese = $calendar->chineseByYear($date->year->current);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        //$pageTextsID = $pageTexts->defineIdByCalendarYearEastern($eastern);
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        $pageTexts->updateByCalendarZodiacYear($date);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->zodiacYears($date);

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->businessExists($year, $language, $countryData['url']);


        return $this->render('zodiac-year-page.min.php', [

            'zodiacs' => $zodiacs,
            'date' => $date,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'calendars' => $calendars,
        ]);

    }

}
