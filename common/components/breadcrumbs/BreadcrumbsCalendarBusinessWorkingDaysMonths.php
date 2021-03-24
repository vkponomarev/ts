<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarBusinessWorkingDaysMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL)
    {

        $count = 0;


        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/working/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/business/quarters/' . $dateData->year->current . '/' . $dateData->quarter->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->quarter->currentName,
        ];


        $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        return $breadcrumbs;

    }

}

