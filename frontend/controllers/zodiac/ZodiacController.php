<?php

namespace frontend\controllers\zodiac;

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


class ZodiacController extends Controller
{

    public function actionZodiacPage()
    {


        $textID = '233'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/eastern'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical('', $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate('', $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];



        ($date = new Date((new \DateTime())->format('Y-m-d')))->year();


        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date()->year()->month()->day();

        $zodiacs = new Zodiacs();
        $zodiacs->zodiacByDay('2021-' . $dateToday->month->current . '-' . $dateToday->day->current);
        $zodiacs->zodiac($zodiacs->zodiacByDay->url);

        $calendars = new Calendars($dateToday->year->current);

        Yii::$app->params['text'] = $main->text($textID, $languageID);
        $calendar = new Calendar();
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */


        return $this->render('zodiac-page.min.php', [

            'zodiacs' => $zodiacs,
            'date' => $date,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendars' => $calendars,
        ]);

    }

}
