<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\BreadcrumbsTimeZonesZoneAbbreviationTime;
use common\components\breadcrumbs\BreadcrumbsTimeZonesZoneIana;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;



class TimeZonesZoneIanaController extends Controller
{

    /**
     * @route /time/timezones/zone
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeZonesZoneIanaPage($zoneURL)
    {


        $yearURL = 2020;
        $textID = '286'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/years'; // Основной урл

        $urlCheck = new UrlCheck();
        $zoneURL = $urlCheck->checkTimeZonesIana($zoneURL);

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
                'ianaID' => $zoneURL['id'],
            ],
            'location' => [
                'citiesByPopulation' => 1,
            ],
            'geoIP' => 1,
        ], $languageID);

        if ($time->geoIP->active){
            ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
        } else {
            ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
        }

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTimeZonesZoneIana())->breadcrumbs($time);


        return $this->render('time-zones-zone-iana-page.min.php', [
            'time' => $time,
            'date' => $date,
        ]);

    }

}
