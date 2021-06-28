<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\base\Widget;

class BreadcrumbsNamazCitiesCityTimesOfDay
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($time, $timeOfDay)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'time',
            'text' => Yii::t('app', 'Time'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'namaz',
            'text' => Yii::t('app', 'Namaz time'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'namaz/cities/' . $time->location->city->url,
            'text' => $time->location->city->name,
        ];

        $breadcrumbs['last'] = Yii::t('app', $timeOfDay);


        return $breadcrumbs;

    }

}

