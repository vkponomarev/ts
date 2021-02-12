<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\languages\Languages;
use common\components\textRedactors\TextNumericCopy;
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

        if ($name = Yii::$app->request->post('name')) {

            $siteMap = new SiteMap();

            $languages = new Languages();
            $languagesData = $languages->data();

            if ($name == 'sitemap-calendar-yearly-all') {

                //$gii->cleanPath($gii->realPath() . '/gii/sitemap/artists/');
                $siteMap->generateCalendarYears($languagesData);

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
                $siteMap->generateCalendarHolidays($languagesData);
                $siteMap->generateCalendarHolidaysMonths($languagesData);
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



        }

        return $this->render('index', [

        ]);

    }

}
