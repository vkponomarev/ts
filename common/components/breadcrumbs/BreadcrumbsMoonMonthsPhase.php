<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonMonthsPhase
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

        $breadcrumbs['last'] = $dateData->month->nameFullSimple;

        return $breadcrumbs;

    }

}

