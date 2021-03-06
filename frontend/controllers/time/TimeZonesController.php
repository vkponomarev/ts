<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\breadcrumbs\BreadcrumbsTimeDifferenceCity;
use common\components\breadcrumbs\BreadcrumbsTimeZones;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;



class TimeZonesController extends Controller
{

    /**
     * @route /time/timezones
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeZonesPage()
    {

        $yearURL = 2020;
        $countryURL = '';
        $textID = '284'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        $countryURL = $urlCheck->country($countryURL);

        //(new \common\components\dump\Dump())->printR(Yii::$app->request->url);
        //(new \common\components\dump\Dump())->printR(\yii\helpers\Url::to());
        //(new \common\components\dump\Dump())->printR(\yii\helpers\Url::current([]));die;


        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];


        $time = new Time([
            'timezone' => [
                'abbreviations' => 1,
                'ianas' => 1,
            ],
            'geoIP' => 1
        ], $languageID);


        if ($time->geoIP->active){
            ($date = new \common\componentsV2\date\Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
        } else {
            ($date = new \common\componentsV2\date\Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
        }

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTimeZones())->breadcrumbs();


        return $this->render('time-zones-page.min.php', [

            'time' => $time,
            'date' => $date,
            'countryURL' => $countryURL,
        ]);

    }

}
