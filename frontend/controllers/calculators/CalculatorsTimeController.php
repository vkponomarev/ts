<?php

namespace frontend\controllers\calculators;

use common\components\breadcrumbs\BreadcrumbsCalculatorsTime;
use common\components\breadcrumbs\BreadcrumbsTimeCountries;
use common\components\breadcrumbs\BreadcrumbsTimeDifferenceCityCity;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calculators\Calculators;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use GeoIp2\Database\Reader;
use Yii;
use yii\web\Controller;


class CalculatorsTimeController extends Controller
{

    /**
     * @route /time/cities/city
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCalculatorsTimePage($methodURL)
    {
        if ($methodURL == 'addition'){
            $textID = '305';
        }
        if ($methodURL == 'subtraction'){
            $textID = '306';
        }
        if ($methodURL == 'multiplication'){
            $textID = '307';
        }
        if ($methodURL == 'division'){
            $textID = '308';
        }
        $yearURL = 2020;
        $countryURL = '';

        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
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
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $time = new Time([
            'location' => [
                'citiesByPopulation' => 1,
                //'cityID' => $cityURL['id'],
            ],
            'geoIP' => 1,
            //'difference' => [
            //    1,
                //'cityID' => $cityURL2['id'],
            //],
        ], $languageID);

        if (isset($time->location->city->date)){
            ($date = new Date(($time->location->city->date->format('Y-m-d'))))->year()->day()->week();

        } else {
            if ($time->geoIP->active){
                ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
            } else {
                ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
            }
        }

        $calculators = new Calculators([
        ]);

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsCalculatorsTime())->breadcrumbs();



        return $this->render('calculators-time-page.min.php', [

            'time' => $time,
            'date' => $date,
            'calculators' => $calculators,
            'methodURL' => $methodURL,
        ]);

    }

}
