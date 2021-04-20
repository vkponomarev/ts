<?php

namespace frontend\controllers\time;

use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;



class TimeZonesUtcController extends Controller
{

    /**
     * @route /time/timezones/utc|gmt/zone-time/
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeZonesUtcPage($zoneNameURL)
    {

        $yearURL = 2020;
        $textID = '285'; // ID из таблицы pages

        $urlCheck = new UrlCheck();
        //$zoneURL = $urlCheck->checkTimeZonesUTC($zoneNameURL, $zoneTime);

        if ($zoneNameURL == 'utc')
            $textID = '286';
        if ($zoneNameURL == 'gmt')
            $textID = '287';
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

        ($date = new Date((new \DateTime())->format('Y-m-d')))->year()->day()->week();

        $time = new Time([
            //'citiesByPopulation' => 1,
            //'timeZones' => 1,
            //'timeZoneID' => $zoneURL['id'],
            //'timeZoneUpdateText' => Yii::$app->params['text'],
            //'popularCities' => 1,
        ], $languageID);



        return $this->render('time-zones-utc-page.min.php', [

            'time' => $time,
            'date' => $date,
            'countryURL' => $countryURL,


        ]);

    }

}
