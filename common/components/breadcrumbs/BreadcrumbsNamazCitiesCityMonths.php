<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsNamazCitiesCityMonths
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($time, $date)
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

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'namaz/cities/' . $time->location->city->url . '/years/' . $date->year->current,
            'text' => $date->year->current,
        ];


        $breadcrumbs['last'] = $date->month->nameFullSimple;


        return $breadcrumbs;

    }

}

