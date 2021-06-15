<?php

namespace frontend\controllers\time;

use common\components\breadcrumbs\BreadcrumbsTimeCities;
use common\components\breadcrumbs\BreadcrumbsTimeContinentsContinent;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\time\Time;
use GeoIp2\Database\Reader;
use Yii;
use yii\web\Controller;


class TimeContinentsContinentController extends Controller
{

    /**
     * @route /time/
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionTimeContinentsContinentPage($continentURL)
    {

        $textID = 292; // ID из таблицы pages
        $urlCheck = new UrlCheck();
        $continentURL = $urlCheck->timeContinent($continentURL);


        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];

        $time = new Time([
            'location' => [
                'continent' => $continentURL['id'],
                'continentCode' => $continentURL['code'],
            ],
            'geoIP' => 1,
        ], $languageID);

        if ($time->geoIP->active){
            ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week();
        } else {
            ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week();
        }

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsTimeContinentsContinent())->breadcrumbs($time->location->continent->name);


        return $this->render('time-continents-continent-page.min.php', [

            'time' => $time,
            'date' => $date,
            'countryURL' => $countryURL,

        ]);

    }

}
