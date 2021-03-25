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
    public function breadcrumbs($dateData, $quarter, $countryURL, $countryData)
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


        if ($countryURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/business/quarters/' . $dateData->year->current . '/' . $dateData->quarter->current,
                'text' => $dateData->quarter->currentName,
            ];

            $breadcrumbs['last'] = $countryData['name'];

        } else {

            $breadcrumbs['last'] = $dateData->quarter->currentName;

        }

        return $breadcrumbs;

    }

}

