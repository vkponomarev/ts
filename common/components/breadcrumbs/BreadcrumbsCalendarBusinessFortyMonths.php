<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarBusinessFortyMonths
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
            'url' => 'calendar/business/forty/years/' . $dateData->year->current,
            'text' => Yii::t('app', '40 hour work week'),
        ];

        if ($countryURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/business/forty/months/' . $dateData->year->current . '-' . $dateData->month->current,
                'text' => $dateData->month->nameFullSimple,
            ];

            $breadcrumbs['last'] = $countryData['name'];

        } else {

            $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        }

        return $breadcrumbs;

    }

}

