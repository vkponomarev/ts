<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/seasons/' . $dateData->season->currentURL . '/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->season->currentName,
        ];

        $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        return $breadcrumbs;

    }

}

