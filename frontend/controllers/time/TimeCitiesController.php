<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\BreadcrumbsTimeCities;
use common\components\breadcrumbs\BreadcrumbsTimeCitiesCity;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use GeoIp2\Database\Reader;
use Yii;
use yii\web\Controller;


class TimeCitiesController extends Controller
{

    /**
     * @route /time/
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeCitiesPage()
    {

        $yearURL = 2020;
        $countryURL = '';
        $textID = '288'; // ID из таблицы pages
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





        $reader = new Reader('/usr/local/share/GeoIP/GeoLite2-City.mmdb');
        $record = $reader->city('128.101.101.101');


        $time = new Time([
            'location' => [
                'cities' => 1,
            ],
            //'citiesByPopulation' => 1,
            //'timeZones' => 1,
            'geoIP' => 1,
            //'popularCities' => 1,
        ], $languageID);

        if ($time->geoIP->active){
            ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
        } else {
            ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
        }

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTimeCities())->breadcrumbs();

        return $this->render('time-cities-page.min.php', [

            'time' => $time,
            'date' => $date,
            'countryURL' => $countryURL,

        ]);

    }

}
