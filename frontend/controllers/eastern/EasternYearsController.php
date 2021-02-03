<?php

namespace frontend\controllers\eastern;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
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
use Yii;
use yii\web\Controller;


class EasternYearsController extends Controller
{

    public function actionEasternYearPage($yearURL)
    {


        $textID = '230'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/eastern'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();


        /*$url = new Url($yearURL);
        $url->yearURL($yearURL);
        $url->year;*/

        $urlCheck = new UrlCheck();

        ($eastern = new Eastern())->range();

        $urlCheck->yearEastern($yearURL, $eastern);

        $eastern->calendar($yearURL)->text()->animals()->animal($eastern->animals->urls[$eastern->calendar->years[$yearURL]['animal']]);


        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical('', $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate('', $mainUrl);
        Yii::$app->params['menu'] = $main->menu();


        ($date = new Date($yearURL . '-01-01'))->date()->year();

        $calendar = new Calendar();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarYearEastern($eastern);
        Yii::$app->params['text'] = $main->text($pageTextsID, Yii::$app->params['language']['current']['id']);
        $pageTexts->updateByCalendarEastern($date, $eastern);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->businessExists($year, $language, $countryData['url']);


        return $this->render('eastern-year-page.min.php', [

            'eastern' => $eastern,
            'date' => $date,

        ]);

    }

}
