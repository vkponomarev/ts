<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarBusinessQuarters
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @param $quarter
     * @return mixed
     */
    public function breadcrumbs($dateData, $quarter, $countryURL)
    {

        $count = 0;


        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/business/years/' . $dateData->year->current . (($countryURL)? '/' .  $countryURL : ''),
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['last'] = $quarter . ' ' . Yii::t('app', 'quarter');

        return $breadcrumbs;

    }

}

