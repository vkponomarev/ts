<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonDaysPhases
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
            'url' => 'calendar/moon/phase/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Moon phases'),
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/phase/months/' . $dateData->year->current . '-' . $dateData->month->current,
            'text' => $dateData->month->nameFullSimple,
        ];

        $breadcrumbs['last'] = $dateData->day->current;

        return $breadcrumbs;

    }

}

