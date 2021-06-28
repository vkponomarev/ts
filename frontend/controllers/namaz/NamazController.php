<?php

namespace frontend\controllers\namaz;

use common\components\breadcrumbs\BreadcrumbsNamaz;
use common\components\calendar\Calendar;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\namaz\Namaz;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;


class NamazController extends Controller
{

    /**
     * @route /namaz/
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionNamazPage()
    {

        $yearURL = 2020;
        $countryURL = '';
        $textID = '297'; // ID из таблицы pages
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
                'defaultCityID' => Yii::$app->params['language']['current']['cities_id'],
            ],
            'timeZones' => 1,
            'geoIP' => 1,
            //'popularCities' => 1,
        ], $languageID);


        if ($time->geoIP->active) {
            ($date = new Date(($time->geoIP->city->date->format('Y-m-d'))))->year()->day()->week()->month();
        } else {
            ($date = new Date(((new \DateTime())->format('Y-m-d'))))->year()->day()->week()->month();
        }

        $namaz = new Namaz([
            'time' => $time,
            'date' => $date,
            'languageID' => $languageID,
        ]);

        $calendar = new Calendar();

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsNamaz())->breadcrumbs();

        return $this->render('namaz-page.min.php', [

            'time' => $time,
            'date' => $date,
            'namaz' => $namaz,
            'calendarNameOfMonths' => $calendarNameOfMonths,
        ]);

    }

}
