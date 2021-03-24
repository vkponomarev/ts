<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsMoonMonthsGardener
{
    /**
     * @param $dateData \common\componentsV2\date\Date
     * @return mixed
     */
    public function breadcrumbs($dateData, $gardenerNameURL)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] =  [
            'url' => 'calendar/moon/years/' . $dateData->year->current,
            'text' => $dateData->year->current,
        ];

        $breadcrumbs['urls'][++$count] =  [
            'url' => 'calendar/moon/gardener/years/' . $dateData->year->current,
            'text' => Yii::t('app', 'Sowing calendar'),
        ];

        if ($gardenerNameURL){

            $breadcrumbs['urls'][++$count] =  [
                'url' => 'calendar/moon/gardener/months/' . $dateData->year->current . '-' . $dateData->month->current ,
                'text' => $dateData->month->nameFullSimple,
            ];
        } else {
            $breadcrumbs['last'] = $dateData->month->nameFullSimple;
        }
        return $breadcrumbs;

    }

}

