<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\BreadcrumbsTimeCapitals;
use common\components\breadcrumbs\BreadcrumbsTimeCitiesCity;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use GeoIp2\Database\Reader;
use Yii;
use yii\web\Controller;


class TimeCitiesCityController extends Controller
{

    /**
     * @route /time/cities/city
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeCitiesCityPage($cityURL)
    {

        $yearURL = 2020;
        $countryURL = '';
        $textID = '289'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        $cityURL = $urlCheck->city($cityURL);

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
        $cityURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $time = new Time([
            'location' => [
                'cityID' => $cityURL['id'],
                'citiesByPopulation' => 1,
            ],
            'geoIP' => 1,
            'difference' => 1,
        ], $languageID);

        ($date = new Date(($time->location->city->date->format('Y-m-d'))))->year()->day()->week();

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTimeCitiesCity())->breadcrumbs($time);

        return $this->render('time-cities-city-page.min.php', [
            'time' => $time,
            'date' => $date,
        ]);
    }
}
