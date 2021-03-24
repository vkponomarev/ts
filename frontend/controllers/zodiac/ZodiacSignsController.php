<?php

namespace frontend\controllers\zodiac;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\colors\Colors;
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
use common\componentsV2\elements\Elements;
use common\componentsV2\mascots\Mascots;
use common\componentsV2\planets\Planets;
use common\componentsV2\stones\Stones;
use common\componentsV2\zodiacs\Zodiacs;
use Yii;
use yii\web\Controller;


class ZodiacSignsController extends Controller

{

    public function actionZodiacSignPage($signURL)
    {

        $textID = '236'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/eastern'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();


        $urlCheck = new UrlCheck();

        $zodiacs = new Zodiacs();

        $urlCheck->zodiacSign($signURL, $zodiacs);

        $zodiacs->zodiac($signURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical('', $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate('', $mainUrl);
        Yii::$app->params['menu'] = $main->menu();


        $calendar = new Calendar();

        $pageTexts = new PageTexts();
        //$pageTextsID = $pageTexts->defineIdByCalendarYearEastern($eastern);
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        $pageTexts->updateByCalendarZodiacSign($zodiacs);

        ($date = new Date((new \DateTime())->format('Y-m-d')))->year();

        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date()->year()->month()->day();
        $zodiacs->zodiacByDay('2021-' . $dateToday->month->current . '-' . $dateToday->day->current);

        $calendars = new Calendars($dateToday->year->current);


        $planets = new Planets();
        $elements = new Elements();
        $stones = new Stones();
        $mascots = new Mascots();
        $colors = new Colors();

        $calendarByWeek = $calendar->byZodiacSign($date, $zodiacs);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->zodiacSigns($zodiacs);

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->businessExists($year, $language, $countryData['url']);


        return $this->render('zodiac-sign-page.min.php', [

            'zodiacs' => $zodiacs,
            'date' => $date,
            'planets' => $planets,
            'elements' => $elements,
            'stones' => $stones,
            'mascots' => $mascots,
            'colors' => $colors,
            'calendarByWeek' => $calendarByWeek,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'calendars' => $calendars,
        ]);

    }

}
