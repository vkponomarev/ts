<?php

namespace frontend\controllers\eastern;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\Url;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\eastern\Eastern;
use Yii;
use yii\web\Controller;


class EasternController extends Controller
{

    public function actionEasternPage()
    {

        $textID = '229'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'calendar/eastern'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical('', $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate('', $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];

        ($eastern = new Eastern())->range()->calendar()->text()->animals();


        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        $calendars = new Calendars($dateToday->year->current);

        Yii::$app->params['text'] = $main->text($textID, $languageID);


        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */


        return $this->render('eastern-page.min.php', [


            'eastern' => $eastern,
            'calendars' => $calendars,


        ]);

    }

}
