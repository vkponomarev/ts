<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\breadcrumbs\BreadcrumbsTime;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;


class TimeController extends Controller
{

    /**
     * @route /time/
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimePage()
    {

        $yearURL = 2020;
        $countryURL = '';
        $textID = '283'; // ID из таблицы pages
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
            'location' => [
                'citiesByPopulation' => 1,
                'continentsArray' => 1,
            ],
            'timeZones' => 1,
            'geoIP' => 1,
            //'popularCities' => 1,
        ], $languageID);

        /*$timeDifference = new TimeDifference([
            'time' => $time,

        ]);*/
        if ($time->geoIP->active){
            ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
        } else {
            ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
        }

         Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTime())->breadcrumbs();

        return $this->render('time-page.min.php', [

            'time' => $time,
            'date' => $date,
            'countryURL' => $countryURL,

        ]);

    }

}
