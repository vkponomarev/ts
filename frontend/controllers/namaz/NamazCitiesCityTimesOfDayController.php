<?php

namespace frontend\controllers\namaz;

use common\components\breadcrumbs\BreadcrumbsNamazCitiesCityTimesOfDay;
use common\components\breadcrumbs\BreadcrumbsTimeCapitals;
use common\components\breadcrumbs\BreadcrumbsTimeCitiesCity;
use common\components\calendar\Calendar;
use common\components\main\Main;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use common\componentsV2\namaz\Namaz;
use common\componentsV2\time\Time;
use GeoIp2\Database\Reader;
use Yii;
use yii\web\Controller;


class NamazCitiesCityTimesOfDayController extends Controller
{

    /**
     * @route /namaz/cities/city
     * @param $cityURL
     * @param $timesOfDayURL
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionNamazCitiesCityTimesOfDayPage($cityURL, $timesOfDayURL)
    {

        $yearURL = 2020;
        $countryURL = '';

        if ($timesOfDayURL == 'morning'){
            $textID = '300'; // ID из таблицы pages
            $timeOfDayURL = 'Morning';
        } else {
            $textID = '301'; // ID из таблицы pages
            $timeOfDayURL = 'Evening';
        }


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

        ($date = new Date(($time->location->city->date->format('Y-m-d'))))->year()->day()->week()->month();

        $namaz = new Namaz([
            'time' => $time,
            'date' => $date,
            'languageID' => $languageID,
        ]);

        $calendar = new Calendar();

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsNamazCitiesCityTimesOfDay())->breadcrumbs($time, $timeOfDayURL);

        return $this->render('namaz-cities-city-times-of-day-page.min.php', [
            'time' => $time,
            'date' => $date,
            'namaz' => $namaz,
            'calendarNameOfMonths' => $calendarNameOfMonths,
        ]);
    }
}
