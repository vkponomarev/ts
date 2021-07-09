<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\gii\siteMap\SiteMapGenerateCalculators;
use common\components\gii\siteMap\SiteMapGenerateCalculatorsRU;
use common\components\gii\siteMap\SiteMapGenerateNamazCities;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesMonths;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesMonthsRU;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesRU;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesTimes;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesTimesRU;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesYears;
use common\components\gii\siteMap\SiteMapGenerateNamazCitiesYearsRU;
use common\components\gii\siteMap\SiteMapGenerateTimeAbbrs;
use common\components\gii\siteMap\SiteMapGenerateTimeAbbrsRU;
use common\components\gii\siteMap\SiteMapGenerateTimeAbbrsTime;
use common\components\gii\siteMap\SiteMapGenerateTimeAbbrsTimeRU;
use common\components\gii\siteMap\SiteMapGenerateTimeCities;
use common\components\gii\siteMap\SiteMapGenerateTimeCitiesRU;
use common\components\gii\siteMap\SiteMapGenerateTimeContinents;
use common\components\gii\siteMap\SiteMapGenerateTimeContinentsRU;
use common\components\gii\siteMap\SiteMapGenerateTimeCountries;
use common\components\gii\siteMap\SiteMapGenerateTimeCountriesRU;
use common\components\gii\siteMap\SiteMapGenerateTimeDifferenceCities;
use common\components\gii\siteMap\SiteMapGenerateTimeDifferenceCitiesCities;
use common\components\gii\siteMap\SiteMapGenerateTimeDifferenceCitiesCitiesRU;
use common\components\gii\siteMap\SiteMapGenerateTimeDifferenceCitiesRU;
use common\components\gii\siteMap\SiteMapGenerateTimeIanas;
use common\components\gii\siteMap\SiteMapGenerateTimeIanasRU;
use common\components\languages\Languages;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteMapController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Без этого не будет работать
     */

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {

        set_time_limit(500000);
        ini_set("memory_limit", "10000M");

        if ($name = Yii::$app->request->post('name')) {

            $siteMap = new SiteMap();

            $languages = new Languages();
            $languagesData = $languages->data();

            if ($name == 'sitemap-calendar-yearly-all') {

                $siteMap->generateCalendarYears($languagesData);

            }

            if ($name == 'sitemap-calendar-yearly-ru') {

                $siteMap->generateCalendarYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-seasons-all') {

                $siteMap->generateCalendarSeasons($languagesData);

            }

             if ($name == 'sitemap-calendar-seasons-ru') {

                 $siteMap->generateCalendarSeasonsRU($languagesData);

             }

            if ($name == 'sitemap-calendar-months-all') {

                $siteMap->generateCalendarMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-months-ru') {

                $siteMap->generateCalendarMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-years-with-weeks-all') {

                $siteMap->generateCalendarYearsWithWeeks($languagesData);

            }

            if ($name == 'sitemap-calendar-years-with-weeks-ru') {

                $siteMap->generateCalendarYearsWithWeeksRU($languagesData);

            }

            if ($name == 'sitemap-calendar-weeks-all') {

                $siteMap->generateCalendarWeeks($languagesData);

            }

            if ($name == 'sitemap-calendar-weeks-ru') {

                $siteMap->generateCalendarWeeksRU($languagesData);

            }

            if ($name == 'sitemap-calendar-business-years-all') {

                $siteMap->generateCalendarBusinessYears($languagesData);

            }

            if ($name == 'sitemap-calendar-business-years-ru') {

                $siteMap->generateCalendarBusinessYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-business-quarters-all') {

                $siteMap->generateCalendarBusinessQuarters($languagesData);

            }

            if ($name == 'sitemap-calendar-business-quarters-ru') {

                $siteMap->generateCalendarBusinessQuartersRU($languagesData);

            }

            if ($name == 'sitemap-calendar-business-months-all') {

                $siteMap->generateCalendarBusinessMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-business-months-ru') {

                $siteMap->generateCalendarBusinessMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-years-all') {

                $siteMap->generateCalendarMoonYears($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-years-ru') {

                $siteMap->generateCalendarMoonYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-months-all') {

                $siteMap->generateCalendarMoonMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-months-ru') {

                $siteMap->generateCalendarMoonMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-good-years-all') {

                $siteMap->generateCalendarMoonGoodYears($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-good-years-ru') {

                $siteMap->generateCalendarMoonGoodYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-good-months-all') {

                $siteMap->generateCalendarMoonGoodMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-good-months-ru') {

                $siteMap->generateCalendarMoonGoodMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-gardener-years-all') {

                $siteMap->generateCalendarMoonGardenerYears($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-gardener-years-ru') {

                $siteMap->generateCalendarMoonGardenerYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-gardener-months-all') {

                $siteMap->generateCalendarMoonGardenerMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-gardener-months-ru') {

                $siteMap->generateCalendarMoonGardenerMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-phases-years-all') {

                $siteMap->generateCalendarMoonPhasesYears($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-phases-years-ru') {

                $siteMap->generateCalendarMoonPhasesYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-phases-months-all') {

                $siteMap->generateCalendarMoonPhasesMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-moon-phases-months-ru') {

                $siteMap->generateCalendarMoonPhasesMonthsRU($languagesData);

            }


            if ($name == 'sitemap-calendar-working-days-off-years-all') {

                $siteMap->generateCalendarWorkingYears($languagesData);

            }

            if ($name == 'sitemap-calendar-working-days-off-years-ru') {

                $siteMap->generateCalendarWorkingYearsRU($languagesData);

            }
            if ($name == 'sitemap-calendar-working-days-off-months-all') {

                $siteMap->generateCalendarWorkingMonths($languagesData);

            }
            if ($name == 'sitemap-calendar-working-days-off-months-ru') {

                $siteMap->generateCalendarWorkingMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-religion-years-all') {

                $siteMap->generateCalendarReligionYears($languagesData);

            }

            if ($name == 'sitemap-calendar-religion-years-ru') {

                $siteMap->generateCalendarReligionYearsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-religion-months-all') {

                $siteMap->generateCalendarReligionMonths($languagesData);

            }

            if ($name == 'sitemap-calendar-religion-months-ru') {

                $siteMap->generateCalendarReligionMonthsRU($languagesData);

            }

            if ($name == 'sitemap-calendar-eastern-all') {
                $siteMap->generateCalendarEastern($languagesData);
                $siteMap->generateCalendarEasternAnimals($languagesData);
                $siteMap->generateCalendarEasternYears($languagesData);
            }

            if ($name == 'sitemap-calendar-eastern-ru') {
                $siteMap->generateCalendarEasternRU($languagesData);
                $siteMap->generateCalendarEasternAnimalsRU($languagesData);
                $siteMap->generateCalendarEasternYearsRU($languagesData);
            }


            if ($name == 'sitemap-calendar-zodiac-all') {
                $siteMap->generateCalendarZodiacMonths($languagesData);
                $siteMap->generateCalendarZodiacSigns($languagesData);
                $siteMap->generateCalendarZodiacYears($languagesData);
            }

            if ($name == 'sitemap-calendar-zodiac-ru') {
                $siteMap->generateCalendarZodiacMonthsRU($languagesData);
                $siteMap->generateCalendarZodiacSignsRU($languagesData);
                $siteMap->generateCalendarZodiacYearsRU($languagesData);
            }

            if ($name == 'sitemap-calendar-holidays-all') {
                //$siteMap->generateCalendarHolidays($languagesData);
                //$siteMap->generateCalendarHolidaysMonths($languagesData);
                $siteMap->generateCalendarHolidaysYears($languagesData);
            }

            if ($name == 'sitemap-calendar-holidays-ru') {
                $siteMap->generateCalendarHolidaysRU($languagesData);
                $siteMap->generateCalendarHolidaysMonthsRU($languagesData);
                $siteMap->generateCalendarHolidaysYearsRU($languagesData);
            }

            if ($name == 'sitemap-calendar-holidays-days-all') {
                $siteMap->generateCalendarHolidaysDays($languagesData);
                $siteMap->generateCalendarHolidaysDaysRU($languagesData);
                $siteMap->generateCalendarHolidaysDaysName($languagesData);
                $siteMap->generateCalendarHolidaysDaysNameRU($languagesData);
            }

            if ($name == 'sitemap-calendar-days-all') {
                $siteMap->generateCalendarMoonDays($languagesData);
                $siteMap->generateCalendarMoonDaysRU($languagesData);
                $siteMap->generateCalendarMoonPhasesDays($languagesData);
                $siteMap->generateCalendarMoonPhasesDaysRU($languagesData);
                $siteMap->generateCalendarWeeksDays($languagesData);
                $siteMap->generateCalendarWeeksDaysRU($languagesData);
                $siteMap->generateCalendarZodiacDays($languagesData);
                $siteMap->generateCalendarZodiacDaysRU($languagesData);
            }

            if ($name == 'sitemap-time-cities-all') {
                (new SiteMapGenerateTimeCities())->generate($languagesData);
                (new SiteMapGenerateTimeCitiesRU())->generate($languagesData);
            }

            if ($name == 'sitemap-time-countries-all') {
                (new SiteMapGenerateTimeCountries())->generate($languagesData);
                (new SiteMapGenerateTimeCountriesRU())->generate($languagesData);
            }

            if ($name == 'sitemap-time-continents-all') {
                (new SiteMapGenerateTimeContinents())->generate($languagesData);
                (new SiteMapGenerateTimeContinentsRU())->generate($languagesData);
            }

            if ($name == 'sitemap-time-abbr-all') {
                (new SiteMapGenerateTimeAbbrs())->generate($languagesData);
                (new SiteMapGenerateTimeAbbrsRU())->generate($languagesData);
                (new SiteMapGenerateTimeAbbrsTime())->generate($languagesData);
                (new SiteMapGenerateTimeAbbrsTimeRU())->generate($languagesData);
            }

            if ($name == 'sitemap-time-iana-all') {
                (new SiteMapGenerateTimeIanas())->generate($languagesData);
                (new SiteMapGenerateTimeIanasRU())->generate($languagesData);
            }


/*
            <option value="">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД все языки</option>
            <option value="sitemap-time-difference-city-all">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД только RU</option>
            <option value="sitemap-time-difference-city-city-all">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД + ГОРОДА все языки</option>
            <option value="sitemap-time-difference-city-city-all">Карта сайта Время РАЗНИЦА ВО ВРЕМЕНИ ГОРОД + ГОРОДА только RU</option>
*/
            if ($name == 'sitemap-time-difference-city-all') {
                (new SiteMapGenerateTimeDifferenceCities())->generate($languagesData);
                (new SiteMapGenerateTimeDifferenceCitiesRU())->generate($languagesData);
            }

            if ($name == 'sitemap-time-difference-city-city-all') {
                (new SiteMapGenerateTimeDifferenceCitiesCities())->generate($languagesData);
                (new SiteMapGenerateTimeDifferenceCitiesCitiesRU())->generate($languagesData);

            }

            /*
            <option value="">Карта сайта Время ГОРОДА все языки</option>
            <option value="">Карта сайта Время ГОРОДА все языки</option>
            <option value="">Карта сайта Время ГОРОДА все языки</option>
            <option value="">Карта сайта Время ГОРОДА все языки</option>
             */

            if ($name == 'sitemap-namaz-cities-all') {
                (new SiteMapGenerateNamazCities())->generate($languagesData);
                (new SiteMapGenerateNamazCitiesRU())->generate($languagesData);
            }

            if ($name == 'sitemap-namaz-cities-months-all') {
                (new SiteMapGenerateNamazCitiesMonths())->generate($languagesData);
                (new SiteMapGenerateNamazCitiesMonthsRU())->generate($languagesData);
            }

            if ($name == 'sitemap-namaz-cities-years-all') {
                (new SiteMapGenerateNamazCitiesYears())->generate($languagesData);
                (new SiteMapGenerateNamazCitiesYearsRU())->generate($languagesData);
            }

            if ($name == 'sitemap-namaz-cities-times-all') {
                (new SiteMapGenerateNamazCitiesTimes())->generate($languagesData);
                (new SiteMapGenerateNamazCitiesTimesRU())->generate($languagesData);
            }


            if ($name == 'sitemap-calculators-all') {
                (new SiteMapGenerateCalculators())->generate($languagesData);
                (new SiteMapGenerateCalculatorsRU())->generate($languagesData);

            }


            if ($name == 'sitemap-all') {
                $siteMap->generateMainFilesAll();
            }

            if ($name == 'sitemap-ru') {
                $siteMap->generateMainFilesRU();
            }



        }

        return $this->render('index', [

        ]);

    }

}
