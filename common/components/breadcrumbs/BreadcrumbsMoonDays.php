<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonDays
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Lunar Calendar'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/months/' . $dateData->year->current . '-' . $dateData->month->current,
            'text' => $dateData->month->nameFullSimple,
        ];

        $breadcrumbs['last'] = $dateData->day->current;

        return $breadcrumbs;

    }

}

