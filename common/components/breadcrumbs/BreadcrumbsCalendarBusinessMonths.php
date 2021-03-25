<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarBusinessMonths
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $countryURL, $countryData)
    {

        $count = 0;


        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/business/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Business days calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/business/quarters/' . $dateData->year->current . '/' . $dateData->quarter->current,
            'text' => $dateData->quarter->currentName,
        ];

        if ($countryURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/business/months/' . $dateData->year->current . '-' . $dateData->month->current,
                'text' => $dateData->month->nameFullSimple,
            ];

            $breadcrumbs['last'] = $countryData['name'];

        } else {

            $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        }

        return $breadcrumbs;

    }

}

