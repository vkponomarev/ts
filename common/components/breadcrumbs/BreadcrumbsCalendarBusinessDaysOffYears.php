<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsCalendarBusinessDaysOffYears
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

        if ($countryURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/days-off/years/' . $dateData->year->current,
                'text' => Yii::t('app', 'Days off'),
            ];

            $breadcrumbs['last'] = $countryData['name'];

        } else {

            $breadcrumbs['last'] = Yii::t('app', 'Days off');


        }




        return $breadcrumbs;

    }

}

